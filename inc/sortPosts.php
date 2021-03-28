<?php 
add_action('wp_ajax_nopriv_filter', 'filter_ajax');
add_action('wp_ajax_filter', 'filter_ajax');

function filter_ajax(){
                        $category = $_POST['category'];
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 6,
                        );
                        if(isset($category)){
                            $args['category__in'] = array($category);
                        }
                        $loop = new WP_Query($args);
                        while ( $loop->have_posts() ) : $loop->the_post(); 
                        {
                        ?>
                    <article class="post">
                            <figure>
                                <picture>
                                    <?php the_post_thumbnail(); ?>
                                </picture>
                            </figure>
                            <h3 class="post__header"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h3>
                            <div class="post__text-wrapper"><p><?php the_excerpt(); ?></p><a class="post-link" href="<?php the_permalink(); ?>"> Czytaj dalej</a></div>
                            <div class="post__tag"><hr class="post-line" /><?php the_category();?></div>
                            <div class="post__date"><i class="far fa-clock"></i><p class="post-date-paragraph"><?php echo get_the_date();?></p></div>
                        
                            
                    </article>
                        <?php };?>
                    <?php endwhile; wp_reset_query(); 
        die();
    }
?>