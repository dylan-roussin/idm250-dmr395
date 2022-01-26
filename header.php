  <?php 
  // plugins and WordPress core use this function to insert crucial elements into your page
  wp_head(); 
  ?>

</head>

<body>

<?php 
// registered this menu in functions.php
wp_nav_menu(
  [
    'theme_location' => 'primary_menu'
  ]
);

  
