<?php
    get_header();
    
    while(have_posts()){
        the_post(); 
?>
    <div class="site-post-container">
        <article class="site-content site-post">
            <header class="post-header">
                <h1 class="post-header__title">
                    <?php the_title()?>
                </h1>
                <p class="post-header__create-information">Opublikowano <time datetime="<?php echo get_the_date('Y-m-d');?>T<?php the_time('H:m:s')?>" property='datePublished'><?php echo get_the_date();?></time> o godzinie <?php the_time()?></p>
            </header>
            <div class="post-main-image">
                <?php the_post_thumbnail(); ?>
            </div>
            <div class="post-content">
                <?php the_content()?>
            </div>
        </article>
        <section class="site-post-options">
        <?php
$args = array(
    'post_html' => '
        <div>
            {thumb_img}
        </div>
        <h2 class="post__header">{text_title}</h2>
        <div class="post__text-wrapper">
            <p>{summary}</p><a class="post-link" href="{url}" title="Kliknij, aby przejść do {text_title}" aria-label="Kliknij, aby przejśc do {text_title}"> Czytaj dalej</a>
        </div>

    ',
    'thumbnail_width' => 360,
    'thumbnail_height' => 230,
    'limit' => 1,
    'range' => 'last24hours',
    'order_by' => 'views',
    'excerpt_length' => 80,
    'wpp_start' => "<div class='post post--small'>",
    'wpp_end' => "</div>"
);
wpp_get_mostpopular($args);
?>
<div class="site-post-social-box">
                <p class="site-post-social-text">Pomoż innym dotrzeć <span class="f-c-purple">udostępniając</span> nasz artykuł</p>
                <!-- AddToAny BEGIN -->
                <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                <a class="a2a_button_facebook"></a>
                <a class="a2a_button_copy_link"></a>
                </div>
                <script async src="https://static.addtoany.com/menu/page.js"></script>
                <!-- AddToAny END -->
            </div>
            <?php if(!empty(get_theme_mod('set_post_information-title'))){?>
            <div class="site-post-information">
                <h3 class="site-post-information__title"><?php echo get_theme_mod('set_post_information-title');?></h3>
                <p class="site-post-information__content"><?php echo get_theme_mod('set_post_information-text');?></p>
            </div>
            <?php };?>   
        </section>
    </div>

<?php }
    get_footer();
?>