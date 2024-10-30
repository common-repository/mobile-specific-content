<?php
/*
Plugin Name: Mobile Specific Content
Plugin URI: http://www.pludo.net/mobile-specific-content.zip
Description: This plugin filters content for mobile on pages, posts and widgets via shortcode. 
Author: Miguel Merín.
Version: 1.0
Author URI: http://www.pludo.net
*/





function msc_filter_mobile($content) {
	
		

	if ( wp_is_mobile() ) {

		return msc_preserve_only(strpos($content, '[mobile-specific-content]'),strpos($content, '[/mobile-specific-content]'),$content,'0_1');

	}else{

		
		 return msc_preserve_only(strpos($content, '[mobile-specific-content]'),strpos($content, '[/mobile-specific-content]'),$content,'1_0');

	}




}


function msc_preserve_only($beginning, $end, $string, $del_pres) {


if (preg_match('[mobile-specific-content]',$string)) { // If there is specific content specified by shortcode apply filter
  



		  $beginningPos = $beginning;
		  $endPos = strpos($string, $end);
		
		  $textToDelete = substr($string, $beginningPos, ($endPos + strlen($end)) - $beginningPos);

			  if($del_pres=='0_1'){
				  	
			  	/* Mobile */
				 		
			  	$string = explode('[mobile-specific-content]', $string);


			  	$string = explode('[/mobile-specific-content]', $string[1]);



				return $string[0];

				

				}

			  if($del_pres=='1_0'){

	  		
				/* Desktop */

					$shortmobile = explode('[mobile-specific-content]', $string);

					$mobilecont =explode('[/mobile-specific-content]', $shortmobile[1]);


				  	 $res= str_replace($mobilecont[0],'',$string);
				  	 $res= str_replace($shortmobile[1],'',$string);

				  	 $desktopres= str_replace('[mobile-specific-content]','',$res);

				  	 return $desktopres;

				  }		





}else{



return $string;



}




}


add_filter( 'the_content', 'msc_filter_mobile' );


add_action('admin_head', 'msc_initialize_buttons');

function msc_initialize_buttons() {
    global $typenow;
    // check user permissions
    if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
    return;
    }
    // verify the post type
    if( ! in_array( $typenow, array( 'post', 'page' ) ) )
        return;
    // check if WYSIWYG is enabled
    if ( get_user_option('rich_editing') == 'true') {
        add_filter("mce_external_plugins", "msc_tinymce_plugin");
        add_filter('mce_buttons', 'msc_tinymce_button');
    }
}



function msc_tinymce_plugin($plugin_array) {
    $plugin_array['msc_button'] = plugins_url( 'js/msc-button.js', __FILE__ ); // CHANGE THE BUTTON SCRIPT HERE
    return $plugin_array;
}

function msc_tinymce_button($buttons) {
   array_push($buttons, "msc_button");
   return $buttons;
}


function msc_css_button() {
    wp_enqueue_style('msc_css_button', plugins_url('css/msc-button.css', __FILE__));
}
 
add_action('admin_enqueue_scripts', 'msc_css_button');


