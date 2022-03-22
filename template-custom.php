<?php
/* Template Name: Dark */
?>

<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
<div class="" style="color: white; background-color: black;">
  <div class="">
    <!-- start content -->
    <?php the_content(); ?>
    <!-- end content -->
  </div>
  <?php
get_template_part('components/main-title',
null,
[
    'title_text' => 'Dylan Roussin',
    'sub_text' => 'UI/UX Designer.',
    'bio_text' => "Hi, I'm Dylan and am currently a student at Drexel University studying User Experience and Interaction Design."
]
);
?>
<?php
get_template_part('components/featured-items');
?>
</div>
<?php endwhile; ?>

<?php get_footer();
