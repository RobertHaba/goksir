<?php 
    function goksir_customizer($wp_customize){
        $wp_customize->add_section(
            'sec_about', array(
                'title' => 'O nas',
                'description' => 'Opis placówki',
                
            )
            );
    $wp_customize->add_setting(
        'set_about',array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
        );
    $wp_customize->add_control(
        'set_about',array(
            'label' => 'Opis',
            'description' => 'Tutaj wpisz opis placówki',
            'section' => 'sec_about',
            'type' => 'textarea'
        )
        );
        // Add Settings
        $wp_customize->add_setting('set_image_one', array(
            'transport'         => 'refresh',
            'height'         => 325,
        ));
        $wp_customize->add_setting('set_image_two', array(
            'transport'         => 'refresh',
            'height'         => 325,
        ));
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'set_image_one', array(
            'label'             => __('Slider Image #1', 'name-theme'),
            'section'           => 'sec_about',
            'settings'          => 'set_image_one',    
        )));
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'set_image_two', array(
            'label'             => __('Slider Image #2', 'name-theme'),
            'section'           => 'sec_about',
            'settings'          => 'set_image_two',
        )));   
        // Slider text
        $wp_customize->add_section(
            'sec_slider_title',array(
                'title' => 'Tekst na tle (Główna karuzela)',
                'description' => 'Dodaj tekst, aby wyświetlić tekst na karuzeli w stronie głównej.'
            )
        );
        $wp_customize->add_setting('set_slider_title', array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('set_slider_title',array(
            'label' => 'Opis',
            'description' => 'Tutaj wpisz ważny komunikat do wyświetlenia',
            'section' => 'sec_slider_title',
            'type' => 'textarea'
        ));
        // Post important information right bar
        
        $wp_customize->add_section(
            'sec_post_information',array(
                'title' => 'Ważna informacja na stornach postu (Prawy pasek)',
                'description' => 'Dodaj tekst, aby wyświetlić ważny komunikat na stronie postu w bocznym pasku.'
            )
        );
        $wp_customize->add_setting('set_post_information-title', array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('set_post_information-title',array(
            'label' => 'Opis',
            'description' => 'Tutaj wpisz tytuł komunikatu',
            'section' => 'sec_post_information',
            'type' => 'textarea'
        ));
        $wp_customize->add_setting('set_post_information-text', array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('set_post_information-text',array(
            'label' => 'Opis',
            'description' => 'Tutaj wpisz krótki opis komunikatu',
            'section' => 'sec_post_information',
            'type' => 'textarea'
        ));
        //
        $wp_customize->add_section(
            'sec_critical_information',array(
                'title' => 'Ważna informacja na stronie głównej',
                'description' => 'Dodaj tekst, aby wyświetlić ważny komunikat na górze strony.'
            )
        );
        $wp_customize->add_setting('set_critical_information', array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('set_critical_information',array(
            'label' => 'Opis',
            'description' => 'Tutaj wpisz ważny komunikat do wyświetlenia',
            'section' => 'sec_critical_information',
            'type' => 'textarea'
        ));
    
        // Header Slider
        
        $wp_customize->add_section(
            'sec_header_slider', array(
                'title' => 'Główny slider',
                'description' => 'Tutja dodaj zdjęcia do Slidera',
                
            )
            );
            
        // Add Settings
        $wp_customize->add_setting('set_slider_one', array(
            'transport'         => 'refresh',
            'height'         => 325,
        ));
        $wp_customize->add_setting('set_slider_two', array(
            'transport'         => 'refresh',
            'height'         => 325,
        ));
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'set_slider_one', array(
            'label'             => __('Slider Image #1', 'name-theme'),
            'section'           => 'sec_header_slider',
            'settings'          => 'set_slider_one',    
        )));
        $wp_customize->add_setting('set_slider_one_alt', array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('set_slider_one_alt',array(
            'label' => 'Opis zdjęcia nr1',
            'description' => 'Opis grafiki (Tekst alternatywny) - służy do wyświetlenia w przypadku problemu z załadowaniem zdjęcia lub odsłuchania',
            'section' => 'sec_header_slider',
            'type' => 'textarea'
        )); 
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'set_slider_two', array(
            'label'             => __('Slider Image #2', 'name-theme'),
            'section'           => 'sec_header_slider',
            'settings'          => 'set_slider_two',
        ))); 
        $wp_customize->add_setting('set_slider_two_alt', array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('set_slider_two_alt',array(
            'label' => 'Opis zdjęcia nr2',
            'description' => 'Opis grafiki (Tekst alternatywny) - służy do wyświetlenia w przypadku problemu z załadowaniem zdjęcia lub odsłuchania',
            'section' => 'sec_header_slider',
            'type' => 'textarea'
        )); 

         // Add Hours
        $wp_customize->add_section(
            'sec_hours-open',array(
                'title' => 'Godziny otwarcia',
                'description' => 'Dodaj godziny otwarcia.'
            )
        );
        $wp_customize->add_setting('sec_hours-open-1', array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('sec_hours-open-1',array(
            'label' => 'Poniedziałek',
            'description' => 'Otwarte od - do np. 9-16',
            'section' => 'sec_hours-open',
            'type' => 'text'
        ));
        $wp_customize->add_setting('sec_hours-open-2', array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('sec_hours-open-2',array(
            'label' => 'Wtorek',
            'description' => 'Otwarte od - do np. 9-16',
            'section' => 'sec_hours-open',
            'type' => 'text'
        ));
        $wp_customize->add_setting('sec_hours-open-3', array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('sec_hours-open-3',array(
            'label' => 'Środa',
            'description' => 'Otwarte od - do np. 9-16',
            'section' => 'sec_hours-open',
            'type' => 'text'
        ));
        $wp_customize->add_setting('sec_hours-open-4', array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('sec_hours-open-4',array(
            'label' => 'Czwartek',
            'description' => 'Otwarte od - do np. 9-16',
            'section' => 'sec_hours-open',
            'type' => 'text'
        ));
        $wp_customize->add_setting('sec_hours-open-5', array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('sec_hours-open-5',array(
            'label' => 'Piątek',
            'description' => 'Otwarte od - do np. 9-16',
            'section' => 'sec_hours-open',
            'type' => 'text'
        ));
        $wp_customize->add_setting('sec_hours-open-6', array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('sec_hours-open-6',array(
            'label' => 'Sobota',
            'description' => 'Otwarte od - do np. 9-16',
            'section' => 'sec_hours-open',
            'type' => 'text'
        ));
        // Add promoted post on home page
        $wp_customize->add_section(
            'sec_promoted-post',array(
                'title' => 'Wyróżniony główny post - Strona główna',
                'description' => 'Ustaw promowane posty na głównej stronie.'
            )
        );
        $wp_customize->add_setting('sec_promoted-post--big', array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('sec_promoted-post--big',array(
            'label' => 'Kafelka nr 1 - Duża',
            'description' => 'Wpisz id głównego wpisu (Kafelka nr 1 - duża)',
            'section' => 'sec_promoted-post',
            'type' => 'text'
        ));
        
        /*
        Włączenie pozosyałych kafelek w oknie "DOSTOSUJ"
        $wp_customize->add_setting('sec_promoted-post--small-1', array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('sec_promoted-post--small-1',array(
            'label' => 'Kafelka nr 1 - mała',
            'description' => 'Wpisz id małego wpisu (Kafelka nr 1 - mała)',
            'section' => 'sec_promoted-post',
            'type' => 'text'
        ));
        $wp_customize->add_setting('sec_promoted-post--small-2', array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('sec_promoted-post--small-2',array(
            'label' => 'Kafelka nr 2 - mała',
            'description' => 'Wpisz id małego wpisu (Kafelka nr 2 - mała)',
            'section' => 'sec_promoted-post',
            'type' => 'text'
        ));
        $wp_customize->add_setting('sec_promoted-post--small-3', array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('sec_promoted-post--small-3',array(
            'label' => 'Kafelka nr 3 - mała',
            'description' => 'Wpisz id małego wpisu (Kafelka nr 3 - mała)',
            'section' => 'sec_promoted-post',
            'type' => 'text'
        ));
        $wp_customize->add_setting('sec_promoted-post--small-4', array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('sec_promoted-post--small-4',array(
            'label' => 'Kafelka nr 4 - mała',
            'description' => 'Wpisz id małego wpisu (Kafelka nr 4 - mała)',
            'section' => 'sec_promoted-post',
            'type' => 'text'
        ));
        */
};
add_action('customize_register', 'goksir_customizer');
    

?>