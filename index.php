<?php 
    get_header();
?>

</section>
    <section class="site-content site-posts">
        <div class="section-header">
            <hr class="section-header__line">
            <h1 class="section-header__title">Aktualności</h1>
            <p class="section-header__paragraph">Tutaj znajdziesz wszystkie wpisy</p>
        </div>
        <div class="posts-container">
                <div class="posts-header">
 <ul id="categoriesList">
    <?php wp_list_categories(array(
   'show_option_all' => 'Wszystkie',
        'title_li' => '')); ?> 
</ul>  
                </div>
                <div class="posts-wrapper">
                <?php 
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $category = $wp_query->get_queried_object()->slug;
                    $args = array( 
                        'post_type' => 'post', 
                        'posts_per_page' => 9, 
                        'paged' => $paged,
                        'ignore_sticky_posts' => 1,
                        'category_name' => $category,
                    );
                    $wp_query = new WP_Query($args);
                    while ( have_posts() ) : the_post(); 
                ?>
                    <article class="post">
                                <div>
                                    <?php the_post_thumbnail(); ?>
                                </div>
                            <h2 class="post__header"><?php the_title() ?></h2>
                            <div class="post__text-wrapper"><p><?php the_excerpt(); ?></p><a class="post-link" href="<?php the_permalink(); ?>" title="Kliknij, aby przejść do <?php the_title(); ?>" aria-label="Przejdź do <?php the_title()?>"> Czytaj dalej</a></div>
                            <div class="post__tag">
                                <hr class="post-line" />
                                <?php $categories = get_the_category();
                                    $separator = ' ';
                                    $output = '';
                                    if ( ! empty( $categories ) ) {
                                        foreach( $categories as $category ) {
                                            $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" aria-label="' . esc_attr( sprintf( __( 'Kliknij, aby zobaczyć wszystkie posty w kategorii %s', 'textdomain' ), $category->name ) ) . '" title="' . esc_attr( sprintf( __( 'Kliknij, aby zobaczyć wszystkie posty w kategorii %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
                                        }
                                        echo trim( $output, $separator );
                                    }
                                ?> 
                        </div>
                            <div class="post__date"><i class="far fa-clock" aria-label="ikonka zegara"></i><time class="post-date-paragraph" datetime="<?php echo get_the_date('Y-m-d');?>T<?php the_time('H:m:s')?>" property='datePublished'><?php echo get_the_date('');?></time></div>
                        
                            
                    </article>
                <?php
                endwhile;
                ?>
                </div>
                <div class="post-footer">
                <?php 
                    the_posts_pagination( array(
                        'prev_text' => 'Poprzednia',
                        'next_text' => 'Następna',

                    ))
                ?>
                </div>
                
        </div>
    </section>
<?php
    get_footer();
?>