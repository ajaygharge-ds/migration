<?php
/**
 * Template for Single Blog Post (single-post.php)
 * Shows details page with feature section (if checked), excerpt, content, and latest 3 blogs.
 */

declare(strict_types=1);

if (!defined('ABSPATH')) exit;

get_header();
?>
<main>
    <section>
        <div class="cm-container">
            <div class="bs-section typ-details-data">
                <div class="details-wrap">
                    <div class="bs-blogs-details" data-aos-offset="100" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200">
                        <h1 class="title" >
                            <?php the_title(); ?>
                        </h1>
                        <div class="desc"><?php the_excerpt(); ?></div>
                        <div class="featured-img">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large'); ?>
                            <?php endif; ?>
                        </div>
                        <div>
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="cm-container">
            <div class="bs-section typ-blogs typ-latest-blogs">
                <div class="sec-head">
                    <h3 class="blogs-title">Latest Blog</h3>
                </div>
                <div class="sec-cont">
                    <div class="posts-grid">
                        <?php
                        $latest_args = [
                            'post_type' => 'post',
                            'posts_per_page' => 3,
                            'post__not_in' => [get_the_ID()],
                        ];
                        $latest = new WP_Query($latest_args);
                        $index = 1;
                        if ($latest->have_posts()):
                            while ($latest->have_posts()): $latest->the_post();
                            $index ++ ;
                                $img = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                        ?>
                        <div class="blog-card" data-id="<?php the_ID(); ?>" data-aos-offset="100" data-aos="fade-in" data-aos-duration="600" data-aos-delay="<?php echo $index *100?>">
                            <a href="<?php the_permalink(); ?>" class="card-link"></a>
                            <div class="image-wrap">
                                <?php if ($img): ?><img src="<?php echo esc_url($img); ?>"><?php endif; ?>
                            </div>
                            <div class="card-content">
                                <p class="desc"><?php echo esc_html(get_the_date());?>
                                <h4 class="card-title"><?php the_title(); ?></h4>
                            </div>
                        </div>
                        <?php endwhile; wp_reset_postdata(); endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
<?php get_footer(); ?>