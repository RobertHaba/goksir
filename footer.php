
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
            <p>{summary}</p><a class="post-link" href="{url}" title="Kliknij, aby przejść do {text_title}" aria-label="Kliknij, aby przejśc do {text_title}"> Czytaj dalej</a>
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
            <button class="slider-btn" id="promotedSliderStop" title="Kliknij, aby zatrzymać karuzele" aria-label="Zatrzymaj animację slidera">Zatrzymaj</button>
            <button class="slider-btn" id="promotedSliderStart" title="Kliknij, aby wznowić karuzele" aria-label="Wznów animację slidera">Wznów</button>
        </div>
    </div>
    <div class="footer-main">
        <div class="footer-main__column">
            <a class="footer-media-box" title="Kliknij,aby przejśc do strony GOKSiR na Facebooku" aria-label="Kliknij,aby przejśc do strony GOKSiR na Facebooku" href="https://www.facebook.com/goksir.lipusz">
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
                    <li class="footer-menu-list__item"><a class="footer-menu-text" title="Zadzwoń pod numer +586874577" aria-label="Zadzwoń pod numer 58 687 45 77" href="tel:+48586874577" >Telefon: 58 687 45 77</a></li>
                    <li class="footer-menu-list__item"><a class="footer-menu-text" title="Kliknij, aby rozpocząć wysłanie emaila za pomocą wybranej aplikacji w systemie do goksir@goksir.eu" aria-label="Kliknij, aby rozpocząć wysłanie emaila za pomocą wybranej aplikacji w systemie do goksir@goksir.eu" href="mailto:goksir@goksir.eu">Email: goksir@goksir.eu</a></li>
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
        <p class="footer-policy__text">Copyright © 2021 <a class="footer-policy-link" href="#" title="Kliknij, aby przejść do strony głównej">GOKSiR</a> Wszelkie prawa zastrzeżone. Projekt i wykonanie <a class="footer-policy-link" href="http://www.serwisman.com" title="Kliknij, aby przejśc do strony www.serwisman.com">Serwisman.com</a></p>
    </div>
</footer>
</main>
<?php wp_footer(); ?>
</body>
</html>