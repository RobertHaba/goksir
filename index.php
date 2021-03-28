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
                            // the query
                            $the_query = new WP_Query( array(
                                'posts_per_page' => 9,
                                'ignore_sticky_posts' => 1
                            )); 
                        ?>
                        <?php while (  $the_query->have_posts() ) :  $the_query->the_post(); 
                        ?>
                    <article class="post">
                                <div>
                                    <?php the_post_thumbnail(); ?>
                                </div>
                            <h2 class="post__header"><?php the_title() ?></h2>
                            <div class="post__text-wrapper"><p><?php the_excerpt(); ?></p><a class="post-link" href="<?php the_permalink(); ?>" aria-label="Przejdź do <?php the_title()?>"> Czytaj dalej</a></div>
                            <div class="post__tag"><hr class="post-line" /><?php the_category();?></div>
                            <div class="post__date"><i class="far fa-clock" aria-label="ikonka zegara"></i><time class="post-date-paragraph" datetime="<?php echo get_the_date('Y-m-d');?>T<?php the_time('H:m:s')?>" property='datePublished'><?php echo get_the_date('');?></time></div>
                        
                            
                    </article>
                <?php
                endwhile;
                rewind_posts();?>
                </div>
                <div class="post-footer">
                <?php 
                    the_posts_pagination( array(
                        'prev_text' => 'Poprzednie',
                        'next_text' => 'Następne',

                    ))
                ?>
                </div>
                
        </div>
    </section>
<?php
    get_footer();
?>