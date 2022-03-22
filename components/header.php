<?php 
  // plugins and WordPress core use this function to insert crucial elements into your page
  wp_head(); 
  ?>
</head>

<body>
  <header id="main-header">
      <a href="<?php echo get_site_url("front-page.php"); ?>"><img src="https://dylanroussin.com/idm250/wp-content/uploads/2022/02/logo.png" alt="logo"></a>
      <?php 
      // registered this menu in functions.php
      wp_nav_menu(
        [
          'theme_location' => 'primary_menu'
        ]); 
        get_template_part('components/search-form'); ?>
    <div class="stripe" id="stripe-top"></div>
    <div class="stripe" id="stripe-bottom"></div>
  </header>





