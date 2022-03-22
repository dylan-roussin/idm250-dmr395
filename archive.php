<?php 
get_header(); ?>

<section class="archived">

<h1 class=""><?php the_archive_title(); ?>
</h1>
<div class="archived-results">
    <?php
    while (have_posts()) : the_post();
      get_template_part('components/project-thumbnail');
    endwhile;
    the_posts_pagination(
        [
            'mid_size' => 2,
            'prev_text' => 'Previous',
            'next_text' => 'Next'
        ]
    );
  ?>
</div>
</section>

<?php get_footer();
