<?php
/*
Template Name: kontakt
 */
get_header(); ?>
<section class="site-content site-contact">
    <div class="map-container">
        <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13234.552607895126!2d17.78257249643885!3d54.09926778524544!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x681cc4c3b56e3af3!2sGminny%20O%C5%9Brodek%20Kultury%2C%20Sportu%20i%20Rekreacji!5e0!3m2!1spl!2spl!4v1592514340785!5m2!1spl!2spl" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>    
    </div>
    <div class="contact-container">
            <div class="contact-information-container">
                <div class="contact-information-box">
                    <i class="fas fa-map-marker-alt"></i>
                    <ul class="contact-information-list">
                        <li class="contact-information-list__item"><h2>Lokalizacja</h2></li>
                        <li class="contact-information-list__item"><p>83-424 Lipusz</p></li>
                        <li class="contact-information-list__item"><p>ul. Młyńska 12</p></li>
                    </ul>
                </div>
                <div class="contact-information-box">
                    <i class="fas fa-user"></i>
                    <ul class="contact-information-list">
                        <li class="contact-information-list__item"><h2>Dyrektor</h2></li>
                        <li class="contact-information-list__item"><p>Hubert Grzenia</p></li>
                    </ul>
                </div>
                <div class="contact-information-box">
                    <i class="fas fa-phone"></i>
                    <ul class="contact-information-list">
                        <li class="contact-information-list__item"><h2>Kontakt</h2></li>
                        <li class="contact-information-list__item"><a aria-label="Zadzwoń pod numer 58 687 45 77" href="tel:+48586874577" >58 687 45 77</a></li>
                        <li class="contact-information-list__item"><a aria-label="Wyślij email pod adres kontakt@goksir.eu" href="mailto:goksir@goksir.eu">goksir@goksir.eu</a></li>
                    </ul>
                </div>
            </div>
            <div class="contact-form-container">
                <h2>Skontaktuj się z nami</h2>
            <?php echo do_shortcode( '[contact-form-7 id="123" title="Formularz 1"]' ); ?>
            </div>
    </div>

</section>
<?php get_footer(); ?>