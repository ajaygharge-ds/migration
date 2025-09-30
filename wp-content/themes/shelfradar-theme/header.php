<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php blankslate_schema_type(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <?php wp_head(); ?>
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=G-KYTYK5VMZM"></script><script type="text/javascript">window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('set', 'developer_id.dZGVlNj', true);gtag('config', 'G-KYTYK5VMZM');</script><!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KCXB3Z5P');</script>
<!-- End Google Tag Manager -->
<!-- GA4 Measurement ID 1 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=GT-TQT842RS"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  // First GA4 property
  gtag('config', 'GT-TQT842RS'); // Replace with your first Measurement ID

  // Second GA4 property
  gtag('config', 'G-KYTYK5VMZM'); // Replace with your second Measurement ID
</script>
</head>

<body <?php body_class(); ?> data-barba="wrapper">
    <?php wp_body_open(); ?>
    <div id="wrapper" class="hfeed">
        <header>
            <?php $header = get_field('header', 'Options'); ?>
            <div class="bs-header">
                <div class="header-wrap">
                    <div class="humburger">
                        <span class="menu"></span>
                        <span class="menu1"></span>
                    </div>
                     <div class="image-wrap" data-aos-offset="100" data-aos="fade-in" data-aos-duration="600" data-aos-delay="100">
                        <a href="<?php echo $header['link']['url']; ?>"><img src="<?php echo $header['image']['url']; ?>" alt="<?php echo esc_attr($header['image']['alt']);  ?>"></a>
                    </div>
                    <nav>
                        <ul class="navbar">
                            <?php foreach($header['navbar_list'] as $nav_list):?>
                                <li class="nav-list" data-aos-offset="100" data-aos="fade-in" data-aos-duration="600" data-aos-delay="200">
                                    <a href="<?php echo $nav_list['link']['url'];?>" class="nav-item"><?php echo $nav_list['nav_items']; ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
    <?php
        // Get template file name
        $template_slug = get_page_template_slug();

        // Map template slugs to your desired classes
        $template_classes = [
            'home-template.php'    => 'typ-home',
            'blogs-archive.php' => 'typ-blogs',
        ];

        // Default to empty
        $extra_class = '';

        // Assign class if match found
        if ($template_slug && isset($template_classes[$template_slug])) {
            $extra_class = $template_classes[$template_slug];
        }
    ?>
    <!-- <main id="content" class="lyt-main" role="main"> -->
    <main id="content" class="lyt-main <?php echo esc_attr($extra_class); ?>" role="main">