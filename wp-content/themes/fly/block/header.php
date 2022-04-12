<?php
$lang = pll_current_language();
$menu = get_main_menu();
?>
<header>
    <section class="header__top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-1 col-sm-12 text-center">
                    <?php echo get_custom_logo();?>
                </div>
                <div class="col-lg-7 col-sm-12">
                    <nav class="menu">
                        <ul>
                            <?php foreach ($menu[$lang] as $item): ?>
                                <li><a href="<?php echo $item->url ?>"><?php echo $item->title ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-4 col-sm-12 request">
                    <div class="baloon"><?php echo get_option('phone-text') ?></div>
                    <a href="tel:<?php echo get_option('phone') ?>"><i class="fas fa-phone"></i></a>
                </div>
            </div>
        </div>
    </section>
    <section class="header__bottom">
        <div class="container">
            <div class="row">
                <?php if (is_front_page()): ?>
                    <div class="slogan">
                        <?php if (get_field('main_title')): ?>
                            <div class="slogan-title">
                                <?php the_field('main_title'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if (get_field('main_title_text')): ?>
                        <div class="slogan-text">
                            <?php the_field('main_title_text'); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <?php get_template_part('block/brecrumbs') ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
</header>
<main>