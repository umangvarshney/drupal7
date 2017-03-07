<?php
/**
 * Template related hooks
 * @author Umang
 * @copyright Nature theme
 */

function nature_preprocess_html(&$vars) {
	$viewport = array(
			  '#type' => 'html_tag',
			  '#tag' => 'meta',
			  '#attributes' => array(
			  		'name' => 'viewport',
			  		'content' => 'width=device-width, initial-scale=1',
			  		),
	);
	drupal_add_html_head($viewport,'viewport');
}
