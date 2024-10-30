=== Mobile Specific Content ===
Contributors: MiguelMerin
Donate link: http://www.pludo.net/mobile-specific-content
Tags: mobile, content filter
Requires at least: 3.5
Tested up to: 4.5
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


This plugin filters content for mobile on pages, posts and widgets via shortcode.  

== Description ==

This plugin filters content for mobile on pages, posts and widgets via shortcode. It enables 
**[mobile-specific-content]** shortcode, within it you can specify content for mobile devices filtered by Wordpress built-in function **wp_is_mobile()** (see codex reference https://codex.wordpress.org/Function_Reference/wp_is_mobile). 


== Installation ==

1. Upload plugin .zip file through Wordpress back end section (Plugins/Add new/ Upload Plugin)
2. Activate plugin from Plugins menu.

== Frequently Asked Questions ==

= How does the shortcode work? =

Whenever you editing a post or page a new button will appear in your editor - a symbol of a smartphone - if you click it, it will add a **[mobile-specific-content]** shortcode to your content area. Everything that you write beetween the opening shortcode and the closing one will be shown only in mobile phones, and the rest of the code will be ignored.

i.e.

 This content will be ignored in mobile phones 

 **[mobile-specific-content]** 

 This will be shown only in mobile phones 

 **[/mobile-specific-content]** 

 and shown only in desktop.

Of course, you can add [mobile-specific-content] shortcode by typing it manually, but remember you can only use it once by post or page.

== Screenshots ==

1. Mobile Specific Content button in the editor.

== Changelog ==

= 1.0 =
* First version of this plugin. 

== Important ==

The plugin will only work when it's used inside Wordpress default content area. When it´s used in Visual Composer´s or Page Builder´s content blocks it won´t behave as spected because content has already been filtered by those other plugins.