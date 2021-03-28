<?php
get_header(); ?>
<header class="header">
    <picture class="header-image">
        <img src="<?php echo catch_that_image(); ?>">
    </picture>
    <div>
        <?php  $args = array(
                'post_parent'    => $post->ID,
                'post_type'      => 'attachment',
                'numberposts'    => -1, // show all
                'post_status'    => 'any',
                'post_mime_type' => 'image',
                'orderby'        => 'menu_order',
                'order'           => 'ASC'
        );

    $images = get_posts($args);
    if($images) { ?>
    <?php foreach($images as $image) { ?>
        <img src="<?php echo wp_get_attachment_url($image->ID); ?>">
    <?php } ?>
<?php } ?>
    </div>
</header>
<?php get_footer(); ?>