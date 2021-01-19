<?php
/*
 * Plugin Name: Language Switcher
 * Plugin URI: https://lawandaction.com/
 * Description: Plugin to switch language according to OS language automatically
 * Version: 1.0
 * Author: Yiping Guo
 * Author URI: https://lawandaction.com/
 * License: GPLv2 or later
 * Text Domain: law & action
 **/

function fre_switch_language() {
	$language = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
	if ( 'zh' == $language)
		$language = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 5);
	// Combine to make string '/en/ko', for example
	$googtrans_cookie_par = '/en/'. strval($language);
	// Set default language to translate to before page load
	setcookie('googtrans', $googtrans_cookie_par);
?>
		<style type="text/css">
  			.yiping-language-switcher, .goog-te-banner-frame {
    			display: none;
			}
  		</style>
	<div id="google_translate_element" class="yiping-language-switcher">
	<?php
		
	?>
		<script type="text/javascript">
			function initializeGoogleTranslateElement() {
				new google.translate.TranslateElement({ pageLanguage: "en" }, "google_translate_element");
			}
		</script>
		<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=initializeGoogleTranslateElement"></script>
	</div>
	<?php 
}

add_action('wp_head', 'fre_switch_language' );
?>