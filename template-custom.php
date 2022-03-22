<?php
/* Template Name: Dark */
?>

<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
<div class="" style="color: white; background-color: black;">
  <h1 class=""><?php the_title(); ?>
  </h1>
  <div class="">
    <!-- start content -->
    <?php the_content(); ?>
    <!-- end content -->
  </div>
</div>
<?php endwhile; ?>

<?php get_footer();
