<!DOCTYPE html>
<html lang="pl">
<head>
    <?php wp_head(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body <?php body_class(); ?>>
    <section class="navbar" id="navbar">
        <div class="navbar__info">
            <div class="navbar-info-box">
                <p class="navbar-info-text"><?php echo current_time('j.m.Y'); ?>. Imieniny: <span id="nameday"></span></p>
            </div>
            <div class="navbar-info-box">
                <a aria-label="Zadzwoń pod numer 58 687 45 77" href="tel:+48586874577" title="Kliknij, aby zadzwonić"><i class="fas fa-phone"></i>(058) 687-45-77</a>
               
                <a aria-label="Przejdź do strony GOKSiR na Facebooku" href="https://www.facebook.com/goksir.lipusz" title="Przejdź do naszej strony na Facebooku"><i class="fab fa-facebook-f"></i></a>
            </div>    
        </div>
        <div class="navbar__logo navbar-logo" >
            <div class="navbar-logo__image">
                    <?php 
                    // Get Custom Logo URL
                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $custom_logo_data = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                    $custom_logo_url = $custom_logo_data[0];
                ?>

                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" 
                title="Kliknij, aby przejść do strony głównej" 
                rel="home">

                    <img src="<?php echo esc_url( $custom_logo_url ); ?>" 
                        alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"/>

                </a>
            </div>
            <div class="navbar-logo__box">
                <p class="navbar-logo-title"><?php bloginfo('name'); ?></p>
                <p class="navbar-logo-subtitle">Gminny Ośrodek Kultury, Sportu i Rekreacji w Lipuszu</p>
            </div>
        </div>
        <nav class="navbar__items" role="navigation" aria-label="Główna nawigacja">
        <?php wp_nav_menu(array(
                    'theme_location' => 'navbar-menu',
                    'menu_id' => 'primary-menu',
                    'depth' => 2,
                )); ?>  
            <div class="menu-hamurger">
                <button class="menu-hamburger__button" title="Menu mobilne">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </nav>   
    </section>
    
    <a class="social-stick-top-position" title="Kliknij, aby przejść do strony Biuletyn Informacji Publicznej (BIP)" title="Kliknij, aby przejść do strony Biuletyn Informacji Publicznej (BIP)" href="http://goksir-lipusz.biuletyn.net/">
                <i class="bip-logo"></i>
     </a>
    <main class="layout">
    