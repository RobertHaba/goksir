<?php
get_header(); ?>
<header class="header">
    <picture class="header-image">
        <img class="gallery-header-image" src="<?php echo catch_that_image(); ?>">
    </picture>
    <section class="site-content site-single-gallery">
        <div class="gallery-image-slider-body">
                <div class="gallery-arrow-box">
                    <button class="arrow arrow--left" id="galleryPreviousSlide"><i class="fas fa-angle-left"></i></button>
                    <button class="arrow arrow--right" id="galleryNextSlide"><i class="fas fa-angle-right"></i></button>
                </div>
            <div class="gallery-image-preview-container">
                <div class="gallery-image-preview-slider" data-nextClick='0' data-previousClick="0">
                <?php  $args = array(
                    'post_parent'    => $post->ID,
                    'post_type'      => 'attachment',
                    'numberposts'    => -1, // show all
                    'post_status'    => 'any',
                    'post_mime_type' => 'image',
                );

                $images = get_posts($args);
                if($images) { ?>

                <?php for($i = 0; $i< count($images); $i++) { ?>
                    <a href="#" class="gallery-slide-box">
                        <img class="gallery-slide-image" src="<?php echo wp_get_attachment_url($images[$i]->ID); ?>">
                    </a>
                <?php } ?>
                <?php } ?>
                </div>
            </div>
        </div>
        <div class="gallery-content">
            <div class="gallery-content-column">
                    <?php ?>
                    <picture class="gallery-content-image-box">
                        <img class="gallery-content-image" src="<?php echo wp_get_attachment_url($images[0]->ID); ?>">
                    </picture>
            </div>
            <div class="gallery-content-column">
                <h1 class="gallery-title"><?php the_title();?></h1>
                <?php the_excerpt();?>
            </div>
        </div>            
        
    </section>
</header>
<?php get_footer(); ?>