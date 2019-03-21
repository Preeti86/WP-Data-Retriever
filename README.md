# WP-Data-Retriever
WordPress plugin to retrieve data from Open Source data portal platform. 

Description

1) User can edit the custom meta box for posts that allowd the user to add related data.

2) In order to use the information, this plugin uses shortcode[ckan_articles num_articles=2 display_images = 'off']

3) Widgets - basically expose the functionality of the shortcode for easy integration on WordPress site layout

5) User can find out the plugin settings under the main settings menu, User need to get thier API key and the endpoint from thier ckan site.


Installation
1) Download or clone https://github.com/Preeti86/WP-Data-Retriever.git
2) Install dependencies with composer(http://getcomposer.org) composer install
3) Activate the plugin through the plugin menu in WordPress

Requirements
1) PHP 7 >=7.2.0
2) PHP Curl extension(in ubuntu sudo apt-get install php-curl
