<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
<div class="single-projects container">
  <main class="wrap">
    <h1 class=""><?php the_title(); ?>
    </h1>
    <div style="margin-left: 20px;">
      <?php
        $terms = get_the_terms(get_the_ID(), 'project-categories');
        if ($terms) {
            foreach ($terms as $term) {
                $category_link = get_term_link($term->term_id);
                echo '<span class="project-teaser__tag"><a href="' . $category_link . '">' . $term->name . '</a></span>, ';
            
            }
        }
    ?>
    </div>
    <div class="">
      <!-- start content -->
      <?php the_content(); ?>
      <!-- end content -->
    </div>
  </main>

</div>
<?php endwhile; ?>

<?php get_footer();
