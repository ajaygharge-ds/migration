<?php
/**
 * Template Name: Home
 */ ?>
 <?php get_header();
        $banner = get_field('banner');
        $about= get_field('home_about');
        $product= get_field('home_product');
        $testimonials = get_field('testimonial', 'options');
        $video = get_field('video_modal');
        $marque = get_field('marquee');
        // var_dump($video);
    ?>

<section>
    <div class="cm-container">
        <div class="bs-banner typ-home">
            <div class="info-wrap">
                <h2 class="title" data-aos-offset="0" data-aos="fade-up" data-aos-duration="500" data-aos-delay="50">
                    <?php foreach($banner['title_wrap'] as $title_rep): ?>
                        <span class="cm-line-break"><?php echo $title_rep['title']; ?></span>
                    <?php endforeach; ?>
                </h2>
                <p class="desc" data-aos-offset="0" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">
                    <?php echo $banner['desc']; ?>
                </p>
                <a href="javascript:void(0);" id="bookDemo" class="btn" data-aos-offset="0" data-aos="fade-up" data-aos-duration="600" data-aos-delay="150">
                    <?php echo $banner['link']['title']; ?>
                </a>
            </div>
            <div class="infography" data-aos-offset="0" data-aos="fade-in" data-aos-duration="600" data-aos-delay="100">
                <img src="<?php echo $banner['image']['url']; ?>" alt="<?php echo esc_attr($banner['image']['alt']); ?>" >
                <div class="float-wrap">
                    <span class="float-real top-left">
                        <img src="./wp-content/themes/shelfradar-theme/static-assets/top-left.png" alt="top-left" fetchpriority="high">
                    </span>
                    <span class="float-upDown top-right">
                        <img src="./wp-content/themes/shelfradar-theme/static-assets/top-right.png" alt="top-right" fetchpriority="high">
                    </span>
                    <span class="float-circle mid-left">
                        <img src="./wp-content/themes/shelfradar-theme/static-assets/mid-left.png" alt="mid-left" fetchpriority="high">
                    </span>
                    <span class="float-upDownRev mid-right">
                        <img src="./wp-content/themes/shelfradar-theme/static-assets/mid-right.png" alt="mid-right" fetchpriority="high">
                    </span>
                    <span class="float-realRev bottom-left">
                        <img src="./wp-content/themes/shelfradar-theme/static-assets/bottom-left.png" alt="bottom-left" fetchpriority="high">
                    </span>
                    <span class="float-real bottom-right">
                        <img src="./wp-content/themes/shelfradar-theme/static-assets/bottom-right.png" alt="bottom-right" fetchpriority="high">
                    </span>
                </div>
            </div>
            <ul class="features">
                <?php foreach($banner['data_card'] as $feature): ?>
                    <li class="features-items" data-aos-offset="0" data-aos="fade-in" data-aos-duration="600" data-aos-delay="200">
                        <span class="counter-wrap">
                            <span class="count-up" data-count="<?php echo esc_html($feature['number']); ?>" >
                                0
                            </span>
                        </span>
                        <span><?php echo $feature['data_item']; ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>
<section>
    <div class="bs-section typ-home-about">
        <div class="cm-container">
            <div class="about-wrap">
                <div class="sec-head">
                    <h2 class="title" data-aos-offset="100" data-aos="fade-up" data-aos-duration="600" data-aos-delay="00">
                        <?php echo $about['title']; ?>
                    </h2>
                </div>
                <div class="sec-cont">
                    <div class="image-wrap" data-aos-offset="100" data-aos="fade-in" data-aos-duration="600" data-aos-delay="200">
                        <img src="<?php echo $about['image']['url']; ?>" alt="<?php echo esc_attr($about['image']['alt']); ?>">
                    </div>
                    <div class="listing-wrap">
                        <p class="desc" data-aos-offset="100" data-aos="fade-in" data-aos-duration="600" data-aos-delay="200"><?php echo $about['desc']; ?></p>
                        <ul class="listing">
                            <?php foreach($about['listing'] as $about_listing): ?>
                            <li class="list-items" data-aos-offset="100" data-aos="fade-up" data-aos-duration="600" data-aos-delay="300">
                                <h4 class="list-title"><?php echo $about_listing['title']; ?></h4>
                                <p class="list-desc"><?php echo $about_listing['desc']; ?></p>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="bs-section typ-home-product">
        <div class="cm-container">
            <div class="sec-head">
                <h2 class="title" data-aos-offset="100" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100"><?php echo $product['title']; ?></h2>
                <p class="desc" data-aos-offset="100" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200"><?php echo $product['desc']; ?></p>
            </div>
            <div class="sec-cont">
                <?php foreach($product['cards'] as $product_card): ?>
                <div class="mod-img-desc" data-aos-offset="100" data-aos="fade-in" data-aos-duration="600" data-aos-delay="100">
                    <!-- <div class="flip-card"> -->
                        <div class="mod-img-desc-inner">
                            <div class="mod-img-desc-front">
                                <div class="image-wrap">
                                    <img src="<?php echo $product_card['image']['url']; ?>" alt="<?php echo esc_attr($product_card['image']['alt']); ?>" loading="lazy" decoding="async" >
                                </div>
                                <h3 class="front-title"><?php echo $product_card['title']?></h3>
                            </div>
                            <div class="mod-img-desc-back">
                                <h3 class="flip-title"><?php echo $product_card['flip_title']; ?></h3>
                                <div class="flip-desc"><?php echo $product_card['desc']; ?></div>
                            </div>
                        </div>
                    <!-- </div> -->
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="bs-section typ-testimonial">
        <div class="cm-container">
            <div class="sec-head">
                <h2 class="title" data-aos-offset="100" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100"><?php echo $testimonials['title']; ?></h2>
            </div>
        </div>
        <div class="sec-cont">
            <div class="swiper">
                <ul class="swiper-wrapper">
                    <?php foreach($testimonials['card'] as $cards): ?>
                    <li class="swiper-slide" data-aos-offset="100" data-aos="fade-in" data-aos-duration="600" data-aos-delay="200">
                        <div class="image-wrap" >
                            <img src="<?php echo $cards['image']['url']; ?>" alt="<?php echo esc_attr($cards['image']['alt']); ?>" loading="lazy" decoding="async">
                        </div>
                        <div class="card-data">
                            <div class="card-desc"><?php echo $cards['desc']?></div>
                            <h3 class="card-title"><?php echo $cards['title']; ?></h3>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="cm-container">
        <div class="bs-section typ-video-modal">
            <div class="sec-head">
                <?php foreach($video['video_title'] as $videos): ?>
                    <h2 class="title" data-aos-offset="100" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100">
                        <?php echo $videos['title']; ?>
                    </h2>
                <?php endforeach; ?>
            </div>
            <div class="sec-cont">
                <div class="video-play" data-aos-offset="100" data-aos="fade-in" data-aos-duration="600" data-aos-delay="200">
                    <img src="./wp-content/themes/shelfradar-theme/static-assets/play.png" alt="play-image" loading="lazy" decoding="async">
                </div>
                <div class="frame-wrap">
                    <iframe src="<?php echo esc_url($video['video_link']['url']); ?>"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                        loading="lazy"></iframe>
                </div>
                <span class="close-icon">&times;</span>
                <div class="desc" data-aos-offset="100" data-aos="fade-up" data-aos-duration="600" data-aos-delay="300"><?php echo $video['desc']; ?></div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="bs-marquee">
        <div class="sec-head typ-center">
            <h3 class="sec-title" data-aos-offset="100" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
                <span class="cm-line-break">
                    <?php echo $marque['title']; ?>
                </span>
            </h3>
        </div>
        <div class="sec-cont">
            <div class="marquee-swiper">
                <div class="marquee-content" data-aos-offset="100" data-aos="fade-in" data-aos-duration="800" data-aos-delay="200">
                    <?php foreach($marque['marquee_list'] as $marque_image): ?>
                        <?php if ($marque_image): ?>
                            <div class="img-wrap">
                                <img src="<?php echo $marque_image['image']['url']; ?>" alt="<?php echo esc_attr($marque_image['image']['alt']); ?>" >
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div class="marquee-content" data-aos-offset="100" data-aos="fade-in" data-aos-duration="800" data-aos-delay="200" aria-hidden="true">
                    <?php foreach($marque['marquee_list'] as $marque_image): ?>
                        <?php if ($marque_image): ?>
                            <div class="img-wrap">
                                <img src="<?php echo $marque_image['image']['url']; ?>" alt="<?php echo esc_attr($marque_image['image']['alt']); ?>" >
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="calendlyModal" class="calendly-modal">
  <div class="modal-content">
    <span class="close-icon">&times;</span>
    <iframe
      src="<?php echo $banner['link']['url']?>"
      width="100%" height="700" frameborder="0"
      style="border:0;">
    </iframe>
  </div>
</div>
<div id="videoModal" class="video-modal">
  <div class="modal-content">
    <span class="close-icon close-model">&times;</span>
    <iframe
      src="<?php echo $video['video_link']['url'] ?>" width="100%" height="600" frameborder="0"
      style="border:0;">
    </iframe>
  </div>
</div>



 <?php get_footer(); ?>