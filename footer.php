<footer>
  <?php
    wp_nav_menu(
      [
        'theme_location' => 'footer_menu'
      ]
    );
  ?>
</footer>

<?php 
// registered this menu in functions.php
wp_footer(); ?>

</body>

</html>