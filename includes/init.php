<?php

function dataset_init(){
    $labels = array(
        'name'                          => _x('Datasets', 'post type general name', 'Dataset'),
        'singular_name'                 => _x('Datasets', 'post type singular name', 'Dataset'),
        'menu_name'                     => _x('Datasets', 'admin menu', 'Dataset'),
        'submenu_name'                  => _X('Datasets', 'Dataset', 'Settings', 'admin menu', 'Dataset'),
        'name_admin_bar'                => _x('Datasets', 'add new on admin bar', 'Dataset'),
        'add_new'                       => _x('Add New', 'Dataset', 'Dataset'),
        'add_new_item'                  => __('Add New Dataset', 'Dataset'),
        'new_item'                      => __('New Dataset', 'Dataset'),
        'edit_item'                     => __('Edit Datasets', 'Dataset'),
        'view_item'                     => __('View Datasets', 'Dataset'),
        'all_items'                     => __('All Datasets', 'Dataset'),
        'search_items'                  => __('Search Datasets', 'Dataset'),
        'parent_item_colon'             => __('Parent Datasets:', 'Dataset'),
        'not_found'                     => __('No Dataset found.', 'Dataset'),
        'not_found_in_trash'            => __('No Dataset found in Trash.', 'Dataset'),
        'featured_image'                => __('Featured Image', 'Dataset'),
        'set_featured_image'            => __('Set featured image', 'Dataset'),
        'remove_featured_image'         => __('Remove featured image', 'Dataset'),
        'use_featured_image'            => __('Use as featured image', 'Dataset'),
        'insert_into_item'              => __('Insert into Dataset', 'Dataset'),
        'uploaded_to_this_item'         => __('Uploaded to this item', 'Dataset'),
        'items_list'                    => __('Items list', 'Dataset'),
        'items_list_navigation'         => __('Items list navigation', 'Dataset'),
        'filter_items_list'             => __('Filter items list', 'Dataset'),
    );

    $args = array(
        'show_in_rest'                  => true, // Enable the REST API
        'post_types'                    => array ('Dataset', 'groups', 'organization','harvesters'),
        'posts_per_page'                => 10,
        'labels'                        => $labels,
        'description'                   => __('Description.', ' A plugin which allows users to retrieve data from styles api into wp admin adn display it on front end.'),
        'public'                        => true,
        'publicly_queryable'            => true,
        'show_ui'                       => true,
        'show_in_menu'                  => true,
        'show_in_nav_menus'             => true,
        'can_export'                    => true,
        'exclude_from_search'           => true,
        'menu_icon'                     => 'dashicons-media-text', // Set icon
        'query_var'                     => true,
        'rewrite'                       => array('slug' => 'Dataset'),
        'capability_type'               => 'post',
        'has_archive'                   => true,
        'hierarchical'                  => false,
        'map_meta_cap'                  => true,
        'menu_position'                 => null,
        'taxonomies'                    => array('catgeories','organization','groups', 'format'),
        'supports'                      => array('title','custom-fields','categories','post-attributes','revisions'),





        register_taxonomy(
            'organization',
            'custom-post',
            array(
                'label' => __( 'Organization' ),
                'hierarchical' => false,
                //'labels' => $labels,
                'public' => true,
                'show_in_nav_menus' => false,
                'show_tagcloud' => false,
                'show_admin_column' => true,
                'rewrite' => array(
                    'slug' => 'organization'
                )
            )
        )


    );
    register_taxonomy(
        'groups',
        'custom-post',
        array(
            'label' => __( 'Groups' ),
            'hierarchical' => false,
            //'labels' => $labels,
            'public' => true,
            'show_in_nav_menus' => false,
            'show_tagcloud' => false,
            'show_admin_column' => true,
            'rewrite' => array(
                'slug' => 'groups'
            )
        )
    );

    register_taxonomy(
        'format',
        'custom-post',
        array(
            'label' => __( 'Format' ),
            'hierarchical' => false,
            //'labels' => $labels,
            'public' => true,
            'show_in_nav_menus' => false,
            'show_tagcloud' => false,
            'show_admin_column' => true,
            'rewrite' => array(
                'slug' => 'format'
            )
        )
    );

    register_post_type('Dataset', $args);




}




