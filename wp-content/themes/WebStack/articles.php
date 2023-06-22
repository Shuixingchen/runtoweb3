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

<div id="content" class="site-main">
  <div class="container">
    <?php // 自定义文章查询
      $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

      $args = array(
        'post_type' => 'post', // 这里可以选择'post'或者其他自定义 post type
        'posts_per_page' => 10, // 单页显示文章数量
        'paged' => $paged // 分页
      );

      $articles_query = new WP_Query( $args );
      if ( $articles_query->have_posts() ) :
    ?>
        <div class="articles-list">
          <?php
            while ( $articles_query->have_posts() ) : $articles_query->the_post();
              get_template_part( 'template-parts/content', get_post_type() );
            endwhile;
          ?>
        </div>

        <div class="pagination">
          <?php
            $big = 999999999; // 定义一个大数字，以确保其他数字不会与之冲突
            echo paginate_links( array(
              'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
              'format' => '?paged=%#%',
              'current' => max( 1, get_query_var('paged') ),
              'total' => $articles_query->max_num_pages
            ) );
          ?>
        </div>

    <?php
      wp_reset_postdata(); // 重置文章数据
      else : // 如果没有文章
        get_template_part( 'template-parts/content', 'none' );
      endif;
    ?>
  </div>
</div>

