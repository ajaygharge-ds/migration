<?php
/**
 * Template Name: Updated
 */ ?>
 <?php get_header();
        $banner = get_field('title');
        $about= get_field('link');
        $product= get_field('image');
    ?>

    <div class="test-container">
        <h1><?php echo $banner; ?></h1>
        <a href="<?php echo $about; ?>">About Us</a>
        <img src="<?php echo $product['url']; ?>" alt="Product Image">
    </div>

 <?php get_footer(); ?>