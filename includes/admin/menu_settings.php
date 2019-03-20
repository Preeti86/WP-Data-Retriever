<?php


function ckan_settings_menu(){
    add_options_page(
        'Data-retriever',
        'Ckan settings',
        'manage_options',
        'ckan-post',
        'ckan_options_page'

    );
}
function ckan_options_page()
{

    if (!current_user_can('manage_options')) {
        wp_die('You do not have enough permission to view this page');
    }

    global $plugin_url;
    global $options;

    if (isset($_POST['ckan_form_submitted'])) {
        $hidden_field = esc_html($_POST['ckan_form_submitted']);

        if ($hidden_field == 'Y') {
            $ckan_endpoint    = esc_html($_POST['ckan_url']);
            $ckan_apikey = esc_html($_POST['ckan_apikey']);


            $ckan_results = ckan_dataset_get_results($ckan_endpoint, $ckan_apikey);


            $options['ckan_url'] = $ckan_endpoint;
            $options['ckan_apikey'] = $ckan_apikey;
            $options['last_updated'] = time();

            $options['ckan_results'] = $ckan_results;

            update_option('ckan_articles', $options);

        }

    }

    $options = get_option('ckan_articles');

    if ($options != '') {
        $ckan_endpoint = $options['ckan_url'];
        $ckan_apikey = $options['ckan_apikey'];
        $ckan_results = $options ['ckan_results'];

    }
    require('op-wrapper.php');
}


function ckan_articles_shortcode($atts, $content = null){

    global $post;

    extract(shortcode_atts(array(
        'num_articles' => '5',
        'display_image' => 'on'
    ), $atts ) );

    if ($display_image == 'on') $display_image = 1;
    if ($display_image == 'off') $display_image = 0;

    $options = get_option('ckan_articles');
    $ckan_results = $options['ckan_results'];

    ob_start();

    require('data_template.php');

    $content = ob_get_clean();

    return $content;

}


function ckan_articles_refresh_results()
{
    $options = get_option('ckan_articles');
    $last_updated = $options['last_updated'];

    $current_time = time();
    $update_difference = $current_time - $last_updated;


    if ($update_difference > 86400) {
        $ckan_search = $options['ckan_url'];
        $ckan_apikey = $options['ckan_apikey'];


        $options['ckan_results'] = ckan_articles_refresh_results($ckan_search, $ckan_apikey);
        $options['last_updated'] = time();

        update_option('ckan_articles', $options);

    }


    die();
    ?>
    <script>


        $('#search').keydown(function () {
            $.getJSON("data.json", function (datal) {
                var search = $('#search').val();
                var regex = new RegExp(search, 'i');
                var output;
                $.each(data, function (key, val) {
                    output += "<tr>";
                    output += "<td id='" + key + "'>" + val.id + "<td>";
                    output += "<td id='" + key + "'>" + val.Category + "<td>";
                    output += "<td id='" + key + "'>" + val.Organization + "<td>";
                    output += "<td id='" + key + "'>" + val.Location + "<td>";
                    output += "<td id='" + key + "'>" + val.Description + "<td>";
                    output += "<td id='" + key + "'>" + val.URL + "<td>";
                    output += "</tr>";

                })
                {

                }
            });

        });
    </script>

    <?php

}
