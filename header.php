  <?php 
  // plugins and WordPress core use this function to insert crucial elements into your page
  wp_head(); 
  ?>

</head>
<body>
  <header>
      <img src="https://dylanroussin.com/idm250/wp-content/uploads/2022/02/logo.png" alt="logo">


<?php 
// registered this menu in functions.php
wp_nav_menu(
  [
    'theme_location' => 'primary_menu'
  ]); ?>

  </header>
<div id="stripe"></div>
<div id="stripe-bottom"></div>



