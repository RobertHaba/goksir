<?php get_header(); ?>
    <header class="header header-main-page">
        <div class="header-slider" id="carousel">
            <div class="header-image">
                <img class="header-slide" alt="<?php echo get_theme_mod('set_slider_one_alt')?>" src="<?php echo get_theme_mod('set_slider_one') ?>" data-state="active">
                <img class="header-slide" alt="<?php echo get_theme_mod('set_slider_two_alt')?>" src="<?php echo get_theme_mod('set_slider_two') ?>">
            </div>
            <div class="header-slider__text">
                <h1>
                    Witamy w GOKSIR Lipusz
                </h1>
                <p>
                    
                    <?php echo get_theme_mod('set_slider_title');?>
                </p>
            </div>
            <div class="header-slider__options">
                <button class="slider-btn" id="carouselPause" aria-label="Zatrzymaj animację karuzeli">Zatrzymaj</button>
                <button class="slider-btn" id="carouselStart" aria-label="Wznów animację karuzeli">Wznów</button>
            </div>
        </div>
        <?php if(get_theme_mod('set_critical_information', '') != ""){?>
        <div class="header-info">
            <span class="header-info-icon-circle">i</i></span><p class="header-info__text"><?php echo get_theme_mod('set_critical_information');?></p>
        </div>
        <?php }?>
    </header>
    <section class="site-content site-news">
        <header class="section-header">
            <hr class="section-header__line">
            <h2 class="section-header__title">Wyróżnione</h2>
            <p class="section-header__paragraph">Bądź na bieżąco z najważniejszymi informacjami</p>
        </header>
        <div class="site-news-wrapper">
            <div class="site-news-column site-news-column--big">
                <?php 
                
                        $post = get_post(get_theme_mod('sec_promoted-post--big'));
                        $title = $post->post_title;
                        $permalink = get_permalink( $post->ID );
                        $thumbnail = get_the_post_thumbnail($post->ID);
                        $post_date = $post->post_date;
                        ?>
                <article class="post-news post-news--big">
                    <a href="<?php echo $permalink ?>" title="<?php echo $title ?>">
                        <div class="post-news__image">
                            <?php echo $thumbnail ?>
                        </div>
                        <header class="post-news-header">
                            <h3>
                            <?php echo $title ?>
                            </h3>
                            <p>
                                <?php echo date('j.m.Y', strtotime($post_date)); ;?>
                            </p>
                        </header>
                    </a>
                </article>
                <div class="site-news-row">
                <?php
                    $args = array(
                        'posts_per_page' => 1,
                        'post__in' => get_option( 'sticky_posts' ),
                        'ignore_sticky_posts' => 1
                );
                $query = new WP_Query( $args );
                $query->the_post()  
                ?>
                <article class="post-news">
                    <a href="<?php the_permalink(); ?>" title="<?php echo $title ?>">
                        <div class="post-news__image">
                            <?php the_post_thumbnail();?>
                        </div>
                        <header class="post-news-header">
                            <h3>
                            <?php echo get_the_title(); ?>
                            </h3>
                            <p>
                                <?php echo get_the_date();?>
                            </p>
                        </header>
                    </a>
                </article>
                <?php
                    $args = array(
                        'posts_per_page' => 1,
                        'post__in' => get_option( 'sticky_posts' ),
                        'ignore_sticky_posts' => 1,
                        'offset' => 1,
                );
                $query = new WP_Query( $args );
                $query->the_post()  
                ?>
                <article class="post-news">
                    <a href="<?php the_permalink(); ?>" title="<?php echo $title ?>">
                        <div class="post-news__image">
                            <?php the_post_thumbnail();?>
                        </div>
                        <header class="post-news-header">
                            <h3>
                            <?php the_title() ?>
                            </h3>
                            <p>
                                <?php echo get_the_date();?>
                            </p>
                        </header>
                    </a>
                </article>
                </div>
            </div>
            <div class="site-news-column">
                <?php
                    $args = array(
                        'posts_per_page' => 1,
                        'post__in' => get_option( 'sticky_posts' ),
                        'ignore_sticky_posts' => 1,
                        'offset' => 2,
                );
                $query = new WP_Query( $args );
                $query->the_post()  
                ?>
                <article class="post-news">
                    <a href="<?php the_permalink(); ?>" title="<?php echo $title ?>">
                        <div class="post-news__image">
                            <?php the_post_thumbnail();?>
                        </div>
                        <header class="post-news-header">
                            <h3>
                            <?php the_title() ?>
                            </h3>
                            <p>
                                <?php echo get_the_date();?>
                            </p>
                        </header>
                    </a>
                </article>
                <?php
                    $args = array(
                        'posts_per_page' => 1,
                        'post__in' => get_option( 'sticky_posts' ),
                        'ignore_sticky_posts' => 1,
                        'offset' => 3,
                );
                $query = new WP_Query( $args );
                $query->the_post()  
                ?>
                <article class="post-news">
                    <a href="<?php the_permalink(); ?>" title="<?php echo $title ?>">
                        <div class="post-news__image">
                            <?php the_post_thumbnail();?>
                        </div>
                        <header class="post-news-header">
                            <h3>
                            <?php the_title() ?>
                            </h3>
                            <p>
                                <?php echo get_the_date();?>
                            </p>
                        </header>
                    </a>
                </article>
            </div>
        </div>
    </section>

<section class="site-content site-content--light-dark site-popular">
<header class="section-header">
            <hr class="section-header__line">
            <h2 class="section-header__title">Popularne</h2>
            <p class="section-header__paragraph">Zobacz najczęściej czytane wpisy w tym tygodniu</p>
        </header>
        <div class="site-popular-wrapper">
    

<?php
$args = array(
    'post_html' => '
    <article class="post">
        <div>
            {thumb_img}
        </div>
        <h3 class="post__header">{text_title}</h3>
        <div class="post__text-wrapper">
            <p>{summary}</p><a class="post-link" href="{url}" aria-label="Przejdź do {text_title}"> Czytaj dalej</a>
        </div>
        <div class="post__tag">
            <hr class="post-line" />
        </div>
        <div class="post__date"><i class="far fa-clock" aria-label="ikonka zegara"></i><time class="post-date-paragraph" datetime="{date}">{date}</time></div>

    </article>
    ',
    'thumbnail_width' => 360,
    'thumbnail_height' => 230,
    'limit' => 3,
    'range' => 'last7days',
    'order_by' => 'views',
    'stats_date' => 1,
    'stats_date_format' => 'd-m-Y',
    'excerpt_length' => 120,
    'wpp_start' => "<div class='posts-wrapper'>",
    'wpp_end' => "</div>"
);
wpp_get_mostpopular($args);
?>
        </div>
</section>
<?php 
                $eventPost = new WP_Query(Array(
                    'posts_per_page' => 5,
                    'post_type' => 'tribe_events',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'tribe_events_cat',
                            'field' => 'slug',
                            'terms' => array(
                                'impreza'
                            ),
                        ),
                    ),

                ));
?>
<?php if ( $eventPost->have_posts() ) : ?>
    <section class="site-content site-events">
        <header class="section-header">
            <hr class="section-header__line">
            <h2 class="section-header__title">Wydarzenia</h2>
            <p class="section-header__paragraph">Zobacz nasz kalendarz imprez na rok <?php echo currentYear(); ?></p>
        </header>
        
        <div class="events-wrapper">
        <?php while($eventPost->have_posts()) : $eventPost->the_post(); ?>
            
            <article class="events-box">
                <a href="<?php the_permalink(); ?>">
                <div>
                    <?php the_post_thumbnail();?>
                </div>
                <header class="events-box__header-box">
                    <h3 class="events-box-header"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h3>
                    <time datetime="<?php echo tribe_get_start_date($your_event_ID, false, 'Y-m-d H:i '); ?>" property='datePublished'><?php echo tribe_get_start_date($your_event_ID, false, 'F j, Y  H:i '); ?></time> 
                    <p class="event-box-data"></p>
                </header>
                </a>
            </article>
        <?php endwhile; ?>
        </div>
        <div class="section-footer">
            <a class="section-footer__link" href="/wydarzenia/kategoria/impreza/">Zobacz więcej <span class="f-c-purple">wydarzeń</span></a>
        </div>
    </section>
        <?php else : ?>
        <?php endif; ?>
    <section class="site-content site-content--light-dark site-home-gallery">
        <header class="section-header">
            <hr class="section-header__line">
            <h2 class="section-header__title">Galeria</h2>
            <p class="section-header__paragraph">Odwiedź naszą galerię zdjęć</p>
        </header>
        <div class="gallery-wrapper">
            <?php 
                $galleryImage = new WP_Query(Array(
                    'posts_per_page' => 6,
                    'post_type' => 'gallery',

                ));
                while($galleryImage->have_posts()){
                    $galleryImage->the_post();
                
            ?>
            <div class="gallery-image">
                <a href="<?php the_permalink();?>"><img alt="" src="<?php echo catch_that_image() ?>"></a>
            </div>
                <?php } ?>
        </div>
        <footer class="section-footer">
            <a class="section-footer__link" href="/galeria">Zobacz więcej <span class="f-c-purple">zdjęć</span></a>
        </footer>
    </section>
    <section class="site-content site-sport">
        <header class="section-header">
            <hr class="section-header__line">
            <h2 class="section-header__title">Sport i zajęcia</h2>
            <p class="section-header__paragraph">Śledź nas na bieżąco i bierz udział w naszych zajęciach.</p>
        </header>
        <div class="sport-wrapper">
            <div class="sport-column sport-column--pink">
                <div class="sport-column__header ">
                    <h3 class="sport-column-header-text">
                    Zajęcia
                    </h3>
                </div>
                <div class="sport-column-items">
                    <?php 
                    $activitiesPost = new WP_Query(Array(
                        'posts_per_page' => 4,
                        'post_type' => 'tribe_events',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'tribe_events_cat',
                                'field' => 'slug',
                                'terms' => array(
                                    'zajecia'
                                ),
                            ),
                        ),

                    ));
                    ?>
                    <?php if($activitiesPost->have_posts()) : ?>
                      <?php  while($activitiesPost->have_posts()) : $activitiesPost->the_post(); ?>

                    <a href="<?php the_permalink();?>" class="sport-column-item"> 
                            <div class="sport-column-item__text">
                                <h4 class="sport-column-item__name"><?php the_title();?></h4>
                                <time class="sport-column-item__date" datetime="<?php echo tribe_get_start_date($your_event_ID, false, 'Y-m-d H:i'); ?>" property='datePublished'><?php echo tribe_get_start_date($your_event_ID, false, 'F j, Y  H:i '); 
                                    
                                    echo '- ' ;
                                    echo tribe_get_end_date($your_event_ID, false, 'H:i ');?>
                                </time>
                            </div>
                     
                    </a>
                    <?php endwhile;?>
                    <?php else :;
                    ?>
                    <p>Brak zajęć</p>
                    <?php endif;?>
                </div>
                <div class="sport-column-footer">
                    <a class="sport-column-button" href="/wydarzenia/kategoria/zajecia/">Więcej</a>
                </div>
            </div>
            <div class="sport-column sport-column--big">
                <div class="sport-column__header ">
                    <h3 class="sport-column-header-text">
                    Sport
                    </h3>
                </div>
                
                <?php 
                    $sportPost = new WP_Query(array(
                        'category_name' => 'sport'
                    ));
                    if($sportPost != NULL){
                        $sportPost->the_post();
                    ?>
                 <article class="sport-column-container">
                    <div class="sport-column-image-box">
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <div class="sport-column-content">
                        <h4 class="sport-column-content__title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h4>
                        <div class="sport-column-content__box">
                            <?php the_content();?>
                        </div>
                        <a class="sport-column-content__link" href="<?php the_permalink(); ?>" aria-label="Przejdź do <?php the_title()?>"> Czytaj dalej</a>   
                        <div class="sport-column-content__line"><hr class="post-line" />
                            <div class="post-categories">
                                <?php $categories = get_the_category();
                                    $separator = ' ';
                                    $output = '';
                                    if ( ! empty( $categories ) ) {
                                        foreach( $categories as $category ) {
                                            $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" aria-label="' . esc_attr( sprintf( __( 'Zobacz wszystkie posty w %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
                                        }
                                        echo trim( $output, $separator );
                                    }
                                ?> 
                            </div>
                        </div>
                        <div class="sport-column-content__date"><i class="far fa-clock" aria-label="ikonka zegara"></i><time class="sport-date-paragraph" datetime="<?php echo get_the_date('Y-m-d');?>T<?php the_time('H:m:s')?>" property='datePublished'><?php echo get_the_date('');?></time></div>    
                    </div>
                 </article>
                    <?php };?>
            </div>
        </div>
    </section>
    
    <section class="site-content site-content--light-dark site-posts">
        <header class="section-header">
            <hr class="section-header__line">
            <h2 class="section-header__title">Posty</h2>
            <p class="section-header__paragraph">Najnowsze informacje, wydarzenia i aktualności z działalności GOKSiR</p>
        </header>
        
        <div class="posts-container">
                <div class="posts-wrapper" id="posts">
                        <?php 
                            // the query
                            $the_query = new WP_Query( array(
                                'posts_per_page' => 6,
                                'ignore_sticky_posts' => 1
                            )); 
                        ?>
                        <?php while (  $the_query->have_posts() ) :  $the_query->the_post(); 
                        ?>
                    <article class="post">
                            <div>
                                <div>
                                    <?php the_post_thumbnail(); ?>
                                </div>
                            </div>
                            <h3 class="post__header"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h3>
                            <div class="post__text-wrapper"><p><?php the_excerpt(); ?></p><a class="post-link" href="<?php the_permalink(); ?>" aria-label="Przejdź do <?php the_title()?>"> Czytaj dalej</a></div>
                            <div class="post__tag">
                            <hr class="post-line" />
                            <div class="post-categories">
                                <?php $categories = get_the_category();
                                    $separator = ' ';
                                    $output = '';
                                    if ( ! empty( $categories ) ) {
                                        foreach( $categories as $category ) {
                                            $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" aria-label="' . esc_attr( sprintf( __( 'Zobacz wszystkie posty w %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
                                        }
                                        echo trim( $output, $separator );
                                    }
                                ?> 
                            </div>
                        </div>
                        <div class="post__date"><i class="far fa-clock" aria-label="ikonka zegara"></i><time class="post-date-paragraph" datetime="<?php echo get_the_date('Y-m-d');?>T<?php the_time('H:m:s')?>" property='datePublished'><?php echo get_the_date('');?></time></div>
                    
                            
                    </article>
                    
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                </div>
        </div>
        <footer class="section-footer">
            <a class="section-footer__link" href="/blog">Zobacz więcej <span class="f-c-purple">postów</span></a>
        </footer>
    </section>
    <section class="site-content site-description">
        <div class="site-description-column site-description-column--big">
                <div class="site-description-column__image-lower">
                        <img alt="" src="<?php echo get_theme_mod('set_image_one', '') ?>">
                </div>
                <div class="site-description-column__image-upper">
                        <img alt="" src="<?php echo get_theme_mod('set_image_two', '') ?>">
                </div>
        </div>
        <div class="site-description-column">
            <div class="site-description-content">
                <h2 class="site-description-title">O Gminnym Ośrodku Kultury Sportu i Rekreacji w Lipuszu</h2>
                <p class="site-description-text">
                    <?php 
                    echo get_theme_mod('set_about', '');?>
                </p>
            </div>
        </div>
    </section>

<?php 
get_footer();
?>
