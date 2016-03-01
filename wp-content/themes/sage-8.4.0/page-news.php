<?php query_posts('category_name=news&showposts=5');
while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/page', 'header'); ?>
    <?php get_template_part('templates/content', 'page-news'); ?>
<?php endwhile; ?>


<?php query_posts('category_name=news&showposts=5');
while (have_posts()) : the_post();
    // do whatever you want
    ?>
    <b><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
    <?php
endwhile;
?>