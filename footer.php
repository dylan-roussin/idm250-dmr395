<footer>
<div class="footer-content">
<p id="year">&copy; <?php echo date("Y"); ?> </p>
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