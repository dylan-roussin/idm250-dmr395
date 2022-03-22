<?php get_header(); /* Template Name: General Template */?>

<?php while (have_posts()) : the_post(); ?>
<div class="wrap">

  <?php the_post_thumbnail(); ?>

  <div class="">
    <!-- start content -->
    <?php the_content(); ?>
    <!-- end content -->
  </div>
  <?php get_template_part('components/default-template-content'); ?>
</div>
<?php endwhile; ?>

<?php get_footer();