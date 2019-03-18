<?php
$ckan_results = json_decode(file_get_contents(__DIR__ . '/data.json'));
//var_dump($ckan_results);
/**
 * Template Name: WP-Ckan
 */
$catgeory = $_GET['catgeory'] ?? '';
$title = $_GET['title'] ?? '';

?>
    <div class="wrap">
    <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
    <form class="advanced-search-form">
        <div class="form-group">
            <label for="">Category</label>
            <input type="text" name="catgeory" value="<?php echo esc_attr($catgeory); ?>">
        </div>
        <div class="form-group">
            <label for="">title</label>
            <input type="text" name="titles" value="<?php echo esc_attr($title); ?>">
        </div>
        <div class="form-group">
            <input type="submit" value="Search">
        </div>
    </form>

<?php

if ( $catgeory || $title ): ?>
    <div class="search-result">
        <?php
        $args = [
            'posts_per_page' => - 1,
            'meta_query'     => []
        ];
        if ( $catgeory ) {
            $args['meta_query'][] = [
                'key'     => 'catgeory',
                'value'   => $catgeory,
                'compare' => '>=',
                'type'    => 'TEXT'
            ];
        }
        if ( $title ) {
            $args['meta_query'][] = [
                'key'     => 'title',
                'value'   => $title,
                'compare' => '<=',
                'type'    => 'TEXT'
            ];
        }

        $search_query = new WP_Query( $args );
        if ( $search_query->have_posts() ):
            while ( $search_query->have_posts() ) {
                $search_query->the_post();
                get_template_part( 'template-parts/post/content', 'excerpt' );

            }
            wp_reset_postdata();
            ?>
        <?php else: ?>
            <p>No result found.</p>
        <?php endif; ?>
    </div>

    </main><!-- #main -->
    </div><!-- #primary -->
    </div><!-- .wrap -->
<?php endif; ?>

