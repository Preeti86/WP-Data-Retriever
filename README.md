# WP-Data-Retriever
WordPress plugin to retrieve data from Open Source data portal platform CKAN. 

Description

User can edit the custom meta box for posts that allowd the user to add related data.
In order to use the information, this plugin uses shortcode[ckan_articles num_articles=2 display_images = 'off']. 
The shortcode has parameters like category, organisation, format 
-Widgets - basically expose the functionality of the shortcode for easy integration on WordPress site layout
-user can find out the plugin settings under the main settings menu, User need to get thier API key and the endpoint from thier ckan site.


Installation
-Download or clone 
-Install dependencies with composer(http://getcomposer.org) composer install
-Activate the plugin through the plugin menu in WordPress

Requirements
-PHP 7 >=7.2.0
-PHP Curl extension(in ubuntu sudo apt-get install php-curl
