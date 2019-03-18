<?php

function ckan_activate_plugin()
{
    // 4.7 < 4.5 = false
    if (version_compare(get_bloginfo('version'), '4.7', '<')) {
        wp_die(__('You must update WordPress to use this plugin', 'Ckan-data-retriever'));
    }
}
