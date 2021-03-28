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
                <?php the_custom_logo();?>
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
    <main class="layout">
    