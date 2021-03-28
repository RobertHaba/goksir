
<?php 
   if(is_front_page() == false && !is_home()){

   
?>


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
            <picture>
            {thumb_img}
            </picture>
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
<?php }?>
<footer class="footer">
    <div class="promoted-site-carusele">
        <div class="promoted-site-carusele-wrapper" id="sliderPromotedPost">
            <?php 
                $footerSliders = new WP_Query(Array(
                    'posts_per_page' => 10,
                    'post_type' => 'slider',

                ));
                while($footerSliders->have_posts()){
                    $footerSliders->the_post();
                
            ?>
            <a class="promoted-site-carusele-image" href="<?php the_title(); ?>" title="Przejdź do strony <?php the_title(); ?>">
                <?php the_post_thumbnail();?>
            </a>
                <?php }?>
                <?php 
                $footerSliders = new WP_Query(Array(
                    'posts_per_page' => 10,
                    'post_type' => 'slider',

                ));
                while($footerSliders->have_posts()){
                    $footerSliders->the_post();
                
            ?>
            <a class="promoted-site-carusele-image" href="<?php the_title(); ?>" title="Przejdź do strony <?php the_title(); ?>">
                <?php the_post_thumbnail();?>
            </a>
                <?php }?>
        </div>
        <div class="promoted-site-carusele-options">
            <button class="slider-btn" id="promotedSliderStop" aria-label="Zatrzymaj animację slidera">Zatrzymaj</button>
            <button class="slider-btn" id="promotedSliderStart" aria-label="Wznów animację slidera">Wznów</button>
        </div>
    </div>
    <div class="footer-main">
        <div class="footer-main__column">
            <a class="footer-media-box" aria-label="Przejdź do strony Biuletyn Informacji Publicznej (BIP)" href="http://goksir-lipusz.biuletyn.net/">
                <i class="bip-logo"></i>
                <p >Biuletyn informacji publicznej</p>
            </a>
            <a class="footer-media-box" aria-label="Przejdź do strony GOKSiR na Facebooku" href="https://www.facebook.com/goksir.lipusz">
                <div class="facebook-circle"><i class="fab fa-facebook-f"></i></div>
                <p >Facebook</p>
            </a>
        </div>
        <div class="footer-main__column">
            <h2 class="footer-main-title">Menu</h2>
            <?php wp_nav_menu(array(
                    'theme_location' => 'navbar-menu',
                )); ?>
        </div>
        <div class="footer-main__column">
            <h2 class="footer-main-title">Informacje</h2>
            <?php wp_nav_menu(array(
                    'theme_location' => 'footer-menu-information',
                )); ?>
        </div>
        <div class="footer-main__column">
            <h2 class="footer-main-title">GOKSiR</h2>
            <div class="footer-menu">
                <ul class="footer-menu-list">
                    <li class="footer-menu-list__item"><p class="footer-menu-text">NIP: 591-16-76-029</p></li>
                    <li class="footer-menu-list__item"><p class="footer-menu-text">REGON: 220926164</p></li>
                    <li class="footer-menu-list__item"><p class="footer-menu-text">Województwo: Pomorskie</p></li>
                    <li class="footer-menu-list__item"><p class="footer-menu-text">Powiat: Kościerski</p></li>
                    <li class="footer-menu-list__item"><p class="footer-menu-text">Gmina: Lipusz</p></li>
                    <li class="footer-menu-list__item"><a class="footer-menu-text" aria-label="Zadzwoń pod numer 58 687 45 77" href="tel:+48586874577" >Telefon: 58 687 45 77</a></li>
                    <li class="footer-menu-list__item"><a class="footer-menu-text" aria-label="Wyślij email pod adres kontakt@goksir.eu" href="mailto:goksir@goksir.eu">goksir@goksir.eu</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-main__column">
            <h2 class="footer-main-title">Godziny otwarcia</h2>
            <div class="footer-menu">
                <ul class="footer-menu-list">
                    <li class="footer-menu-list__item"><p class="footer-menu-text">Poniedziałek: <?php 
                    echo get_theme_mod('sec_hours-open-1', '');?> </p></li>
                    <li class="footer-menu-list__item"><p class="footer-menu-text">Wtorek: <?php 
                    echo get_theme_mod('sec_hours-open-2', '');?> </p></li>
                    <li class="footer-menu-list__item"><p class="footer-menu-text">Środa: <?php 
                    echo get_theme_mod('sec_hours-open-3', '');?> </p></li>
                    <li class="footer-menu-list__item"><p class="footer-menu-text">Czwartek: <?php 
                    echo get_theme_mod('sec_hours-open-4', '');?> </p></li>
                    <li class="footer-menu-list__item"><p class="footer-menu-text">Piątek: <?php 
                    echo get_theme_mod('sec_hours-open-5', '');?> </p></li>
                    <li class="footer-menu-list__item"><p class="footer-menu-text">Sobota: <?php 
                    echo get_theme_mod('sec_hours-open-6', '');?> </p></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-policy">
        <p class="footer-policy__text">Copyright © 2020 <a class="footer-policy-link" href="#">GOKSiR</a> Wszelkie prawa zastrzeżone. Projekt i wykonanie <a class="footer-policy-link" href="http://www.serwisman.com">Serwisman.com</a></p>
    </div>
</footer>
</main>
<?php wp_footer(); ?>
</body>
</html>