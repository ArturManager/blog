<?php 
/**
 * This file manages the theme settings uploading and import operations.
 * Uses WP_Filesystem
*/
function graphene_import_file() {
    global $graphene_settings;
    
    /* Check authorisation */
    $authorised = true;
    // Check nonce
    if (!wp_verify_nonce($_POST['graphene-import'], 'graphene-import')) {$authorised = false;}
    // Check permissions
    if (!current_user_can('edit_theme_options')){ $authorised = false; }
    
    // If the user is authorised, import the theme's options to the database
    if ($authorised) {?>
        <div class="wrap">
        <div id="icon-tools" class="icon32"><br></div>
        <h2><?php echo __( 'Import Graphene Theme Options', 'graphene' );?></h2>  
        <?php
        // make sure there is an import file uploaded
        if ( isset($_FILES['import']) ) {
			
			$form_fields = array('import');
			$method = '';
			
			$url = wp_nonce_url('themes.php?page=graphene_options', 'graphene-import');
			
			// Get file writing credentials
			if (false === ($creds = request_filesystem_credentials($url, $method, false, false, $form_fields) ) ) {
				return true;
			}
			
			if ( ! WP_Filesystem($creds) ) {
				// our credentials were no good, ask the user for them again
				request_filesystem_credentials($url, $method, true, false, $form_fields);
				return true;
			}
			
			// Write the file if credentials are good
			$upload_dir = wp_upload_dir();
			$filename = trailingslashit($upload_dir['path']).'graphene_options.txt';
				 
			// by this point, the $wp_filesystem global should be working, so let's use it to create a file
			global $wp_filesystem;
			if ( ! $wp_filesystem->move($_FILES['import']['tmp_name'], $filename, true) ) {
				echo 'Error saving file!';
				return;
			}
			
			$file = $_FILES['import'];
			
			if ($file['type'] == 'text/plain') {
				$data = $wp_filesystem->get_contents($filename);
				// try to read the file
				if ($data !== FALSE){
					$settings = json_decode($data, true);
					// try to read the settings array
					if (isset($settings['slider_disable'])){
						$settings = array_merge($graphene_settings, $settings);
						update_option('graphene_settings', $settings);
						echo '<p>'. __('Options import completed', 'graphene').'<br />';
						echo '<a href="themes.php?page=graphene_options">'.__('Go to the Graphene options page', 'graphene').'<a></p>';
					} 
					else { // else: try to read the settings array
						echo '<p><strong>'.__('Sorry, there has been an error.', 'graphene').'</strong><br />';
						echo __('The uploaded file does not contain valid Graphene options.', 'graphene').'</p>';
					}                    
				} 
				else { // else: try to read the file
					echo '<p><strong>'.__('Sorry, there has been an error.', 'graphene').'</strong><br />';
					echo __('The uploaded file could not be read.', 'graphene').'</p>';
				} 
			}
			else { // else: make sure the file uploaded was a plain text file
				echo '<p><strong>'.__('Sorry, there has been an error.', 'graphene').'</strong><br />';
				echo __('The uploaded file is not supported.', 'graphene').'</p>';
			}
			
			// Delete the file after we're done
			$wp_filesystem->delete($filename);
			
        }
        else { // else: make sure there is an import file uploaded           
            echo '<p>'.__( 'File is empty. Please upload something more substantial. This error could also be caused by uploads being disabled in your php.ini or by post_max_size being defined as smaller than upload_max_filesize in php.ini.' ).'</p>';        
        }
        echo '</div> <!-- end wrap -->';
    }
    else {
        wp_die(__('ERROR: You are not authorised to perform that operation', 'graphene'));            
    }           
} // Closes the graphene_import_file() function definition 
?>