<?php

/*
* Create a shortcode that lists all cpt's ordered by taxonomy term
*/

add_shortcode('list_taxonomy_archive', 'wckc_list_taxonomy_archive');
function wckc_list_taxonomy_archive($atts){
$a = shortcode_atts( array(
'cpt' => 'post',
'tax' => 'category',
), $atts );

$output = '';

$ckan_results = get_terms( array('taxonomy' => $a['tax'], 'hide_empty' => false) );

if( $ckan_results ){
$output .= '<div class="list_tax_archive">';
    foreach ($ckan_results as $ckan_result) {
    if ( is_array($ckan_result) && isset($ckan_result['invalid_taxonomy']) )
    return;

    $args = array (
    'post_type'         => $a['cpt'],
    $a['tax']           => $ckan_result->slug,
    'posts_per_page'    => '-1',
    );

    // The Query
    $posts = get_posts($args);

    if( empty($posts)){
    return;
    }
    $output .= "<h4> {$ckan_result->name} </h4>";
    $output .= '<ul class="term_archive">';
        foreach($ckan_results as $ckan_result){
        $output .= '<li><a href="'.get_permalink( $post ).'">'.get_the_title( $post ).'</a></li>';
        }
        $output .= '</ul>';

    }
    $output .= '</div>';
}
return $output;
}