===SimpleSmileyShow===
Contributors: brokenlibrarian
Donate link: http://brokenlibrarian.org/tinyplugins/
Tags: comments, smilies, jquery
Requires at least: 3.3.1
Tested up to: 4.0
Stable tag: 1.0
License: Apache v2

== Description ==

SimpleSmileyShow is a plugin that takes whatever smilies are currently defined and displays them in a row just before the comment textarea on any page with comments. Clicking on the smilies will insert the code for that smiley into the textarea at the position of the cursor. No configuration is required.

The smilies can be adjusted with CSS; each clickable smiley has the class _wp-smileylink_ and the block containing them has the ID _wp-smileyblock_.

This plugin is designed to work with the WordPress 3 style of comment pages which use _comment_form()_ and have the actions _comment_form_after_fields_, _comment_form_logged_in_after_, and _comment_form_must_log_in_after_ present. (This should be the majority of modern themes.) This plugin _does not work_ with the Jetpack plugin if the new comment system is enabled, since it replaces the normal _comment_form()_ completely.

This plugin uses JQuery and the jquery.insertatcaret plugin. It has been tested tested with the twentyten through twentyfourteen themes.

Development on this plugin has halted. Other developers should feel free to use the Apache-licensed code for their own projects.

http://brokenlibrarian.org/tinyplugins/  
brokenlibrarian@gmail.com  
09/28/14

== Installation ==

1. Upload the SimpleSmileyShow folder to your _/wp-content/plugins/_ folder and activate it.
2. No further configuration is required.
3. Add CSS properties to adjust the smiley list appearance.

== Frequently Asked Questions ==

= none yet =

== Screenshots ==

1. The plugin in use on a standard WordPress theme.

== Changelog ==

= 1.0 =
* Final version with WordPress v4.0 testing

= 0.7.1 =
* update for WordPress 3.8 compatibility testing

= 0.7 =
* update for WordPress 3.5 compatibility testing, documentation cleanup

= 0.6 =
* added mouseover text

= 0.5 =
* readme and source code cleanup, no other changes

= 0.4 =
* initial release

== Upgrade Notice ==

= 1.0 =
* Final version with WordPress v4.0 testing

= 0.7.1 =
* optional update, WordPress 3.8 compatibility testing

= 0.7 =
* optional update, WordPress 3.5 compatibility testing

= 0.6 =
* optional update, added mouseover text

= 0.5 =
* optional update, code cleanup, no changes

= 0.4 =
* initial release

==License==

   Copyright 2014 Christian Wagner

   Licensed under the Apache License, Version 2.0 (the "License");
   you may not use this file except in compliance with the License.
   You may obtain a copy of the License at

       http://www.apache.org/licenses/LICENSE-2.0

   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the License for the specific language governing permissions and
   limitations under the License.