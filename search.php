<?php
/* Template Name: Search Page */

 get_header(); ?>
<?php
 $args = [
     's' => $_GET['s'],
     'post_type' => $_GET['post_type'],
 ];
 $search_query = new WP_Query($args)
?>
<section class='searched'>
<?php
get_template_part(
    'components/search-text',
    null,
    [
        'heading' => 'Search results for "' . $_GET['s'] . '"',
    ]
);
?>

<div class="searched-results">
    <?php
  if ($search_query->have_posts()) {
      while ($search_query->have_posts()) : $search_query->the_post();
      get_template_part('components/project-thumbnail');
      endwhile;
      // After looping through a separate query, this function restores the $post global to the current post in the main query.
      wp_reset_postdata();
  } else {
      // no results
      echo '<div class="centering">';
      echo '<h4 class="">No results found.</h4>';
      echo '<a class="return-home" href="' . get_site_url("front-page.php") . '">Home page</a>';
      echo '</div>';
  }
?>
</div>
</section>


<?php get_footer();