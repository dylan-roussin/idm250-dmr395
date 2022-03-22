<?php
// https://developer.wordpress.org/reference/classes/wp_query/
$arg = [
    'post_type' => 'projects',
    'post_status' => 'publish',
    'posts_per_page' => 3,
    'order' => 'DESC'
];
$project_query = new WP_Query($arg);

?>

<section class="featured">
  <h2 id='featured-title'>My Work</h2>
  <div class="project-group">
    <?php
    while ($project_query->have_posts()) : $project_query->the_post(); ?>
    <?php
    // Has to be done in the loop so we have access to the featured image ID
    $featured_image = project_by_id(get_post_thumbnail_id());

    if (!$featured_image) {
        $featured_image['alt'] = 'Missing Image';
        $featured_image['src'] = '//via.placeholder.com/600x450';
    };
    ?>
    <div class="project-item">
      <img class="proj-preview-img"
        src="<?php echo $featured_image['src']; ?>"
        alt="<?php echo $featured_image['alt']; ?>">
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </h2>
      <p class='blurb'><?php the_excerpt(); ?>
      </p>
    </div>
    <?php
    endwhile;
     // After looping through a separate query, this function restores the $post global to the current post in the main query.
wp_reset_postdata();
  ?>
  </div>
</section>