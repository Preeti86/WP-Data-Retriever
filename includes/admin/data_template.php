<?php
$ckan_results = json_decode(file_get_contents(__DIR__ . '/data.json'));
//var_dump($ckan_results);

/**
 * Datasets template.
 *
 * This template can be overriden by copying this file to your-theme/woocommerce-plugin-templates/redeem-gift-card.php
 *
 * @author 		Jeroen Sormani
 * @package 	WooCommerce Plugin Templates/Templates
 * @version     1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Don't allow direct access
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="container py-5">
    <!--<h1 class="display-2 text-center mb-5">List of Datasets</h1>-->
    <div class="row">
        <?php foreach ($ckan_results as $ckan_result):?>


            <?php
                //$url = round($ckan_result->url)

            ?>
        <div class="col-12 col-md-6">
            <div class="card p-4 mb-5" id="test" onclick="location.href='http://www.opendata500.com/us/list/';" style="cursor: pointer;">
                <h2 class="h3 mb-6">
                    <?php echo ucfirst($ckan_result->Category); ?>
                </h2>
                <p class="lead">
                    <?php echo ucfirst($ckan_result->Organization)?>
                </p>
                <hr class="my-4">
                <!--<ul class="list-unstyled">
                     <li>URL: <?php echo ucfirst($ckan_result->URL) ?></li>
                </ul>-->
    </div>
</div>
        <?php endforeach; ?>
    </div>
</div>