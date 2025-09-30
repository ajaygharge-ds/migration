<?php
/**
 * Template Name: Blogs Archive
 */

if (!defined('ABSPATH')) exit;
get_header();
$paged    = (get_query_var('paged')) ? get_query_var('paged') : 1;
$per_page = 6;

// Query news posts
$args  = [
    'post_type'      => 'post',
    'posts_per_page' => $per_page,
    'paged'          => $paged,
    'post_status'    => 'publish',
];
$query = new WP_Query($args);
?>

<main class="blogs-archive">
    <section>
        <div class="cm-container">
            <div class="bs-section typ-blogs">
                <div class="sec-head" >
                    <h1 class="title" data-aos-offset="100" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">Blogs</h1>
                </div>

                <div id="blog-posts" class="posts-grid">
                    <?php if ($query->have_posts()) : ?>
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                            <div class="blog-card" data-id="<?php the_ID(); ?>" data-aos-offset="100" data-aos="fade-in" data-aos-duration="800" data-aos-delay="200">
                                <a href="<?php the_permalink(); ?>" class="card-link"></a>
                                <div class="image-wrap">
                                    <?php if (has_post_thumbnail()) : 
                                        $thumb_id = get_post_thumbnail_id(); // Get attachment ID
                                        $alt_text = get_post_meta($thumb_id, '_wp_attachment_image_alt', true); // Get alt
                                    ?>
                                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="<?php echo esc_attr($alt_text ? $alt_text : get_the_title()); ?>">
                                    <?php endif; ?>
                                </div>

                                <div class="card-content">
                                    <h3 class="card-title"><?php the_title(); ?></h3>
                                    <p class="desc"><?php echo esc_html(get_the_excerpt()); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="btn">Read More</a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                <?php endif; ?>

                <?php wp_reset_postdata(); ?>
                </div>
                <?php if ($query->max_num_pages > 1) : ?>
                    <div class="btn-wrap">
                        <a href="javascript:void(0);" class="btn btn-solid view-more-blogs">
                            View More
                        </a>
                        <div class="loader" style="display:none;"></div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>