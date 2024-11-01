<?php
/*
Plugin Name: SimpleSmileyShow
Plugin URI: http://brokenlibrarian.org/tinyplugins/simplesmileyshow/
Description: Displays currently available smilies on comment form and makes them clickable
Version: 1.0
Author: Christian Wagner
Author URI: http://brokenlibrarian.org/tinyplugins/
License: Apache v2
*/
?>
<?php
/*
   Copyright 2012 Christian Wagner

   Licensed under the Apache License, Version 2.0 (the "License");
   you may not use this file except in compliance with the License.
   You may obtain a copy of the License at

       http://www.apache.org/licenses/LICENSE-2.0

   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the License for the specific language governing permissions and
   limitations under the License.
*/
?>
<?php

/* load jquery and insertcaret plugin */

if ( !is_admin() ) add_action('wp_enqueue_scripts', 'insertatcaret_enqueue', 11);
	function insertatcaret_enqueue() {
		wp_register_script('jquery.insertatcaret', plugin_dir_url(__FILE__).'jquery.insertatcaret.js', array('jquery'), null);
		wp_enqueue_script('jquery.insertatcaret');
}

/* add smilies to the comment form */

function simple_add_smilies_to_comment_form($post_ID) {
	echo('<div id="wp-smileyblock">');
	global $wpsmiliestrans; /* use global array $wpsmiliestrans which contains the defined smilies and their codes */
	$newsmilies = array_unique($wpsmiliestrans); /* get rid of any dupes */
	/* iterate over the list of unique smilies to show all as images, with each anchor getting an id from the numeric index */
	foreach ($newsmilies as $smileyname => $filename) {
		$srcurl = apply_filters('smilies_src', includes_url("images/smilies/$filename"), $filename, site_url());
		echo('<a id="s-'.array_search($smileyname,array_keys($newsmilies)).'"><img src="'.$srcurl.'" class="wp-smileylink" title="'.htmlspecialchars($smileyname).'" /></a> &nbsp;');
		}
	echo('</div>');
	}

add_action('comment_form_after_fields','simple_add_smilies_to_comment_form',1,10); /* run function before comment textarea */
add_action('comment_form_logged_in_after','simple_add_smilies_to_comment_form',1,10);
add_action('comment_form_must_log_in_after','simple_add_smilies_to_comment_form',1,10);

/* make those smilies clickable with jquery script */

function simple_make_smilies_clickable($post_ID) {
	global $wpsmiliestrans; $newsmilies = array_unique($wpsmiliestrans); /* use global array, get rid of any dupes */
	$numericsmilies = array_values(array_flip($newsmilies)); /* create a new numeric array with the smiley codes as values */
	echo('
    <script>
		/* <![CDATA[ */
		var smileyarray = [ ');
	foreach ($numericsmilies as $smileynumber => $smileycode) { /* copy PHP array $numericsmilies to JQuery array named "smileyarray" */
		echo('" '.$smileycode.' ",'); } /* add spaces on either side of smiley code */
	echo('
		]; 

		jQuery(document).ready(function($) {
		$(\'a[id*="s-"]\').click(function() { // any anchor with an id that begins with "s-" is clickable
		$("#comment").insertAtCaret(smileyarray[this.id.substr(2)]); // insert the appropriate code into the textarea
		});
		});
	</script>');
	}

add_action('comment_form_after','simple_make_smilies_clickable',1,10);

?>