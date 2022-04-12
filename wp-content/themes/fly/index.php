<?php get_header() ?>
<section class="content" id="1">
    <div class="container">
        <div class="row">
            <div class="page-title col-md-12 text-center">
                <h1><?php the_title() ?></h1>
            </div>
            <div class="page-content col-md-12 text-center">
                <?php the_content()?>
            </div>
        </div>
    </div>
</section>
<?php get_template_part('block/post'); ?>

<?php //get_template_part('block/service'); ?>

<?php //get_template_part('block/mission'); ?>

<?php //get_template_part('block/gray'); ?>

<?php
 ?>
<?php get_footer() ?>
