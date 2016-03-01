<?php
/**
 * Template Name: Custom Template
 */
?>


<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/page', 'header'); ?>

    <?php putRevSlider('news-hero4'); ?>
    <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
