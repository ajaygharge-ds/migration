<?php
function vendor_styles()
{
    wp_enqueue_style('vendor-styles', get_stylesheet_directory_uri() . '/styles/vendor.css', false);
}
add_action('wp_enqueue_scripts', 'vendor_styles');
function custom_google_fonts_preconnect() {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
}
add_action('wp_head', 'custom_google_fonts_preconnect', 5);

function custom_add_google_fonts() {
    wp_enqueue_style(
        'custom-google-fonts',
        'https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&family=Instrument+Serif:ital@0;1&display=swap',
        [],
        null
    );
}
add_action('wp_enqueue_scripts', 'custom_add_google_fonts');

function custom_scripts()
{
    wp_enqueue_script('vendor_javascript', get_stylesheet_directory_uri() . '/js/vendor.js', array('jquery'), filemtime(get_stylesheet_directory() . '/js/vendor.js'), true);
    wp_script_add_data('vendor_javascript', 'async', true);
    wp_enqueue_script('custom_javascript', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), filemtime(get_stylesheet_directory() . '/js/custom.js'), true);
    wp_script_add_data('custom_javascript', 'async', true);
}
add_action('wp_enqueue_scripts', 'custom_scripts');



// ENQUEUE SCRIPTS
add_action('wp_enqueue_scripts', function () {
    // Blogs Archive Script
    if (is_page_template('archive.php')) {
        wp_enqueue_script('troo-blogs-ajax', get_stylesheet_directory_uri() . '/js/blogs_ajax.js', ['jquery'], null, true);
        wp_localize_script('troo-blogs-ajax', 'trooBlogsAjax', [
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce'   => wp_create_nonce('troo_blogs_nonce'),
            // 'exclude' => [],
            // 'total'   => 1,
        ]);
    }
});


// AJAX HANDLER: Load More Blogs
add_action('wp_ajax_load_more_blogs', 'troo_load_more_blogs');
add_action('wp_ajax_nopriv_load_more_blogs', 'troo_load_more_blogs');

function troo_load_more_blogs() {
    check_ajax_referer('troo_blogs_nonce', '_ajax_nonce');

    $paged = max(1, intval($_POST['paged']));
    $per_page = max(1, intval($_POST['per_page']));

    $args = [
        'post_type' => 'post',
        'posts_per_page' => $per_page,
        'paged' => $paged,
        'post_status' => 'publish',
      ];

    $query = new WP_Query($args);
    ob_start();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $permalink = get_permalink();
            $image_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
            $title = get_the_title();
            ?>
            <div class="blog-card" data-id="<?php the_ID(); ?>" data-aos-offset="100" data-aos="fade-in" data-aos-duration="800" data-aos-delay="200">
                <a href="<?php the_permalink(); ?>" class="card-link"></a>
                <div class="image-wrap">
                    <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('large'); ?>
                    <?php endif; ?>
                </div>
                <div class="card-content">
                    <h3 class="card-title"><?php the_title(); ?></h3>
                    <p class="desc"><?php echo esc_html(get_the_excerpt()); ?></p>
                    <a href="<?php the_permalink(); ?>" class="btn">Read More</a>
                </div>
            </div>
            <?php
        }
        wp_reset_postdata();
    }
    wp_send_json_success(['html' => ob_get_clean(),'total_pages' => $query->max_num_pages,]);
}

function custom_preload_assets() {
    if (is_page_template('home-template.php')) {
        $banner = get_field('banner');
        if (!empty($banner['image']['url'])) {
            echo '<link rel="preload" as="image" href="' . esc_url($banner['image']['url']) . '" fetchpriority="high">' . "\n";
        }
    }
}
add_action('wp_head', 'custom_preload_assets');
function preload_storylane_iframe() {
    if (is_page_template('home-template.php')) {
        $video = get_field('video_modal');
        if (!empty($video['video_link']['url'])) {
            echo '<link rel="preload" as="document" href="' . esc_url($video['video_link']['url']) . '">' . "\n";
        }
    }
}
add_action('wp_head', 'preload_storylane_iframe');

add_filter( 'wpcf7_form_autocomplete', function ( $autocomplete ) {
    $autocomplete = 'off';
    return $autocomplete;
}, 10, 1 );


function preload_infography_images() {
    if ( is_page_template( 'home-template.php' ) ) {
        // banner image
        $banner = get_field( 'banner' );
        if ( ! empty( $banner['image']['url'] ) ) {
            echo '<link rel="preload" as="image" href="' . esc_url( $banner['image']['url'] ) . '" fetchpriority="high">' . "\n";
        }

        $theme_uri = get_stylesheet_directory_uri() . '/static-assets/';
        $float_images = ['top-left.png','top-right.png','mid-left.png','mid-right.png','bottom-left.png','bottom-right.png'];

        foreach ($float_images as $img) {
            echo '<link rel="preload" as="image" href="' . esc_url($theme_uri . $img) . '" fetchpriority="high">' . "\n";
        }
    }
}
add_action('wp_head', 'preload_infography_images');