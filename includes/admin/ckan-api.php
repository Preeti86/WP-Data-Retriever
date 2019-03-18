<?php

function ckan_dataset_get_results($ckan_search, $ckan_apikey){

    //$json_feed_url = 'http://api.nytimes.com/svc/search/v2/articlesearch.json?q=' . $ckan_search . '&api-key=' . $ckan_apikey;


    $ckan_url = 'https://demo.ckan.org/api/3/action/datastore_search?resource_id=2172902b-3d52-4aa9-916a-0dd8a641d36b' . $ckan_search . '&api-key=' . $ckan_apikey;
    $ckan_apikey = '2fc96c2e-d141-4bed-af43-cdb7709cce7b';

    $opts = array(
        'http'=>array(
            'method'=>"GET",
            'header'=>"Authorization: ".$ckan_apikey
        )
    );

    $context = stream_context_create($opts);

    // Open the file using the HTTP headers set above
    $ckan_results = file_get_contents($ckan_url, false, $context);

    print_r($ckan_results);

}