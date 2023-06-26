<?php
   /* 
   Template Name: Articles
   */
  get_header(); 

   $categories= get_categories(array(
     'taxonomy'     => 'favorites',
     'meta_key'     => '_term_order',
     'orderby'      => 'meta_value_num',
     'order'        => 'desc',
     'hide_empty'   => 0,
     )
   ); 
   include( 'templates/header-nav.php' );
?>

<div class="main-content">
  <?php include( 'templates/header-banner.php' ); ?>
  <div class="container">
   adfadfadfadfadfadfa
  </div>
</div>

