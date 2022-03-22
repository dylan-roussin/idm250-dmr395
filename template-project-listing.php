<?php
/* Template Name: Portfolio List */
 get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
<div class="list-container">
  <h1 class="ram"><?php echo get_the_title(); ?>
  </h1>


  <div class="listed">
    <?php
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

      $arg = [
          'post_type' => 'projects',
          'post_status' => 'publish',
          'posts_per_page' => 9,
          'order' => 'DESC',
          'paged' => $paged

      ];
      $project_query = new WP_Query($arg);

      ?>
    <?php
        while ($project_query->have_posts()) : $project_query->the_post();
            get_template_part('components/project-thumbnail');
        endwhile;
        // Custom Pagination for Custom loops
        $big = 999999999; // need an unlikely integer
        echo paginate_links([
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $project_query->max_num_pages
        ]);
        echo '</nav>';
        // After looping through a separate query, this function restores the $post global to the current post in the main query.
        wp_reset_postdata();
      ?>
  </div>
</div>
<?php endwhile; ?>

<?php get_footer();
