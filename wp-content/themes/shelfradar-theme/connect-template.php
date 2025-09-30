<?php
/**
 * Template Name: Connect Template
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header();

class Shelfradar_Contact_Us_Template
{
    public function render()
    {
        $get_in_touch   = get_field('get_in_touch_section');

        $this->render_get_in_touch($get_in_touch);
    }


    private function render_get_in_touch($section)
    {
        if (!$section) return;
        ?>
        <section>
            <div class="cm-container">
                <div class="bs-section typ-what-contact">
                    <div class="get-in-touch">
                        <div class="sec-head">
                            <h3 class="sec-title" data-aos-offset="100" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100"><?php echo esc_html($section['title']); ?></h3>
                            <p class="sec-desc" data-aos-offset="100" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200"><?php echo esc_html($section['subtitle']); ?></p>
                        </div>
                        <ul class="sec-cont">
                            <li class="contact-list" data-aos-offset="100" data-aos="fade-up" data-aos-duration="600" data-aos-delay="400">
                                <span class="list-icon email"></span>
                                <div class="social-address">
                                    <h3 class="title">Email Id</h3>
                                    <a href="mailto:<?php echo esc_html($section['email'])?>" class="desc"><?php echo esc_html($section['email'])?></a>
                                </div>
                            </li>
                            <li class="contact-list" data-aos-offset="100" data-aos="fade-up" data-aos-duration="600" data-aos-delay="500">
                                <span class="list-icon office"></span>
                                <div class="social-address">
                                    <h3 class="title">Registered Office</h3>
                                    <address class="desc"><?php echo $section['registered_office']; ?></address>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <?php $form = get_field('contact_form_section'); ?>
                    <div class="contact-form" data-aos-offset="100" data-aos="fade-in" data-aos-duration="600" data-aos-delay="200">
                        <h2 class="form-title"><?php echo esc_html($form['title']); ?></h2>
                        <?php if (!empty($form['shortcode'])): ?>
                            <?php echo do_shortcode($form['shortcode']); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }


}

// Render the contact us page
$troo_contact = new Shelfradar_Contact_Us_Template();
$troo_contact->render();

get_footer();
