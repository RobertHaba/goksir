<?php
/*
Template Name: event
 */
get_header(); ?>
<header class="header">
    <picture class="header-image">
        <img src="<?php echo get_template_directory_uri(); ?>/images/sites/zajecia.jpg">
    </picture>
    <h1 class="header__title">Kalendarz zajęć 2020</h1>
</header>
<section class="site-content site-events">
        <div class="section-header">
            <hr class="section-header__line">
            <h2 class="section-header__title">Wydarzenia</h2>
            <p class="section-header__paragraph">Zobacz nasz kalendarz imprez na rok <?php echo currentYear(); ?></p>
        </div>
        <div class="events-wrapper">
            
        <?php 
                $eventPost = new WP_Query(Array(
                    'posts_per_page' => 4,
                    'post_type' => 'tribe_events',

                ));
                while($eventPost->have_posts()){
                    $eventPost->the_post();
                
            ?>
            <article class="events-box">
                <picture>
                    <?php the_post_thumbnail();?>
                </picture>
                <div class="events-box__header-box">
                    <h3 class="events-box-header"><?php the_title()?></h3>
                    <p class="event-box-data"><?php echo get_the_date();?></p>
                </div>
            </article>
                <?php };?>
        </div>
    </section>
</section>
<?php get_footer(); ?>