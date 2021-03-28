<?php
    get_header();
    
    while(have_posts()){
        the_post(); 
?>
    <div class="site-post-container">
        <article class="site-content site-post">
            <div class="post-header">
                <h1 class="post-header__title">
                    <?php the_title()?>
                </h1>
            </div>
            <picture class="post-main-image">
                <?php the_post_thumbnail(); ?>
            </picture>
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
            <p>{summary}</p><a class="post-link" href="{url}" aria-label="Przejdź do {text_title}"> Czytaj dalej</a>
        </div>

    ',
    'thumbnail_width' => 360,
    'thumbnail_height' => 230,
    'limit' => 1,
    'range' => 'last24hours',
    'order_by' => 'views',
    'excerpt_length' => 80,
    'wpp_start' => "<div>",
    'wpp_end' => "</div>"
);
wpp_get_mostpopular($args);
?>
<div class="site-post-social-box">
                <p class="site-post-social-text">Pomoż innym dotrzeć <span class="f-c-purple">udostępniając</span> nasz artykuł</p>
                <button class="button-social-post button-social-post--facebook"><i class="fab fa-facebook-f"></i> Facebook</button>
                <button class="button-social-post" id="btn-copy-link-post"><i class="fas fa-link"></i> Skopiuj link</button>
                <input type="text" value="URL" id="copyURL" class="input-copy-url" readonly="readonly" tabindex="-1">
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