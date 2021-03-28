<?php
/*
Template Name: galeria
 */
get_header(); ?>
<header class="header">
    <picture class="header-image">
        <img src="<?php echo get_template_directory_uri(); ?>/images/home/lipusz.png" alt="Lipusz z lotu ptaka">
    </picture>
    <h1 class="header__title">Galeria</h1>
</header>
<section class="site-content site-gallery">
            <?php 
                $galleryPost = new WP_Query(Array(
                    'posts_per_page' => 10,
                    'post_type' => 'gallery',

                ));
                while($galleryPost->have_posts()){
                    $galleryPost->the_post();
                
            ?>
    <article class="gallery-card">
        <a href="<?php the_permalink()?>">
            <picture class="gallery-card-image-box">
                <img class="events-image" src="<?php echo catch_that_image() ?>" alt="<?php echo catch_that_image_alt()?>">
            </picture>
            <div class="gallery-card-content"> 
                <h2 class="gallery-card-title">
                <?php the_title(); ?>
                </h2>
                <p class="gallery-card-paragraph">
                <?php the_excerpt(); ?>
                </p>
                <hr class="card-line" />
                <div class="card__date"><i class="far fa-clock" aria-label="ikonka zegara"></i><p class="post-date-paragraph"><?php echo get_the_date();?></p></div>
                
            </div> 
        </a>       
    </article>
                <?php }?>
</section>
<?php get_footer(); ?>