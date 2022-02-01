<footer>
<div class="footer-content">
<p id="author">Made by Dylan Roussin</p>
  <?php
    wp_nav_menu(
      [
        'theme_location' => 'footer_menu'
      ]
    );
  ?>
</footer>
<div>
<?php 
// registered this menu in functions.php
wp_footer(); ?>

</body>

</html>