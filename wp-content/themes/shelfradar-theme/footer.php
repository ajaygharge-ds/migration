</main>

    <footer>
        <div class="bs-footer">
        <div class="cm-container">
                <?php $footer = get_field('footer', 'Options'); ?>
                <div class="footer-wrap">
                    <h3 class="title" data-aos-offset="100" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100"><?php echo $footer['title']; ?></h3>
                    <div class="data-wrap">
                        <ul class="nav-list">
                            <?php if (!empty($footer['nav_list'])) : ?>
                                <?php foreach ($footer['nav_list'] as $footer_nav) : ?>
                                    <?php if (!empty($footer_nav['nav_title'])) : ?>
                                        <li class="nav-items" data-aos-offset="10" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100">
                                            <a href="<?php echo esc_url(!empty($footer_nav['nav_link']['url']) ? $footer_nav['nav_link']['url'] : 'javascript:void(0)'); ?>" target="_blank">
                                                <?php echo esc_html($footer_nav['nav_title']); ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <?php if (!empty($footer['social']['instagram']['title'])) : ?>
                                <li class="nav-items" data-aos-offset="10" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200">
                                    <a href="<?php if($footer['social']['instagram']['link']) :?><?php echo $footer['social']['instagram']['link']['url']; ?><?php else :?>javascript:void(0)<?php endif;?>" target="<?php if($footer['social']['instagram']['link']) :?>_blank <?php else :?>_self<?php endif;?>">
                                        <?php echo esc_html($footer['social']['instagram']['title']); ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (!empty($footer['social']['linkedin']['title'])) : ?>
                                <li class="nav-items" data-aos-offset="10" data-aos="fade-up" data-aos-duration="600" data-aos-delay="300">
                                    <a href="<?php if($footer['social']['linkedin']['link']) :?><?php echo $footer['social']['linkedin']['link']['url']; ?><?php else :?>javascript:void(0)<?php endif;?>" target="<?php if($footer['social']['linkedin']['link']) :?>_blank <?php else :?>_self<?php endif;?>">
                                        <?php echo esc_html($footer['social']['linkedin']['title']); ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<?php wp_footer(); ?>
</body>

</html>