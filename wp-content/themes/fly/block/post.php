<section class="content" id="2">
    <div class="container">
        <div class="page-title">
            <div class="h1">Realizacje</div>
        </div>
        <div class="posts">
            <?php
            $args = array(
                'category__in' => 12,
                'showposts' => 2,
                'orderby' => 'id',
                'order' => 'ASC',
                'caller_get_posts' => 1);
            $my_query = new wp_query($args);
            if ($my_query->have_posts()) {
                while ($my_query->have_posts()) {
                    $my_query->the_post();
                    ?>

                    <div class="post col-md-6">
                        <a href="<?php echo get_permalink($post->ID); ?>">
                            <img src="<?php if (get_the_post_thumbnail_url($post->ID, array(487, 275))) echo get_the_post_thumbnail_url($post->ID, array(487, 275)); ?>"/>
                            <?php echo $post->post_title; ?>
                        </a>
                    </div>

                <?php }
            }
            wp_reset_query(); ?>
        </div>
        <div class="posts">
            <?php
            $args = array('post_type' => 'custom', 'posts_per_page' => 2);
            $my_query = new wp_query($args);
            if ($my_query->have_posts()) {
                while ($my_query->have_posts()) {
                    $my_query->the_post();
                    ?>

                    <div class="post col-md-6">
                        <a href="<?php echo get_permalink($post->ID); ?>">
                            <img src="<?php if (get_the_post_thumbnail_url($post->ID, array(487, 275))) echo get_the_post_thumbnail_url($post->ID, array(487, 275)); ?>"/>
                            <?php echo $post->post_title; ?>
                        </a>
                    </div>

                <?php }
            }
            wp_reset_query(); ?>
        </div>
    </div>
</section>
