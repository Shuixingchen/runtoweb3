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

<?php
if(io_get_option('is_search')){include('search-tool.php'); }
else{?>
<div class="no-search"></div>
<?php
}
?>

<?php 
// 查询文章列表

include( 'templates/article-card.php' ); 
?>
</div>
<?php
get_footer();
