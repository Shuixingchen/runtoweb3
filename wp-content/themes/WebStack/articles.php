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
 <!-- <div class="container"> -->
        <h1>Article List</h1>
        <div class="row" style="margin: 10px">
            <div class="col-md-8">
                <div class="post-preview">
                    <h3 class="post-title">Your title here</h3>
                    <p class="post-subtitle">Your subtitle here</p>
                    <p class="post-meta">Posted by <a href="#">Your author here</a></p>
                </div>
                <p>Your description here. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s..</p>
                <p><a class="primary" href="#">Read More...</a></p>
            </div>
        </div>
        <div class="row" style="margin: 10px">
            <div class="col-md-8">
                <div class="post-preview">
                    <h3 class="post-title">Your title here</h3>
                    <p class="post-subtitle">Your subtitle here</p>
                    <p class="post-meta">Posted by <a href="#">Your author here</a></p>
                </div>
                <p>Your description here. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s..</p>
                <p><a class="primary" href="#">Read More...</a></p>
            </div>
        </div>
    <!-- </div> -->


