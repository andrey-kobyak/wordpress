<?php
/*
Template Name: Full-width page layout
Template Post Type: post, page, custom_post
*/
get_header() ?>
<section class="single-page">
    <div class="container">
        <div class="row">
            <?php the_content() ?>
        </div>

        <?php
        //Get the images ids from the post_metadata
        $images = get_field('gallery');
        //Check if return array has anything in it
        if( count($images) ):?>
            <div class="gallery">
        <?php
            //Cool, we got some data so now let's loop over it
            foreach($images as $image):
                //echo'<pre>';print_r($image);echo'</pre>';die();
                $id = $image['id']; // The attachment id of the media
                $title = $image['title']; //The title
                $caption= $image['caption']; //The caption
                $full_image_url= $image['sizes']['large']; //Full size image url
                $thumbnail_image_url= $image['sizes']['thumbnail']; //Get the thumbnail size image url 150px by 150px
                $url= $image['url']; //Goto any link when clicked
                //$alt = $image['alt']; //Get the alt which is a extra field (See below how to add extra fields)
                ?>
                    <?php if( !empty($url) ){ ?><a href="<?php echo $url; ?>" data-fancybox="gallery"><?php } ?>
                        <img src="<?php echo $full_image_url; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>">
                        <?php if( !empty($url) ){ ?></a><?php } ?>
            <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php get_footer() ?>
