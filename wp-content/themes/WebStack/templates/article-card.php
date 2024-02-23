<?php
/*
 * @Theme Name:WebStack
 * @Theme URI:https://www.iotheme.cn/
 * @Author: iowen
 * @Author URI: https://www.iowen.cn/
 * @Date: 2019-02-22 21:26:02
 * @LastEditors: iowen
 * @LastEditTime: 2021-08-22 23:05:46
 * @FilePath: \WebStack\templates\friendlink.php
 * @Description: 
 */
if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<?php
$args = array(
    'post_type'           => 'post',        //自定义文章类型，这里为sites
    'ignore_sticky_posts' => 1,              //忽略置顶文章
    'posts_per_page'      => 20,        //显示的文章数量
    'orderby'             => array( 'ID' => 'DESC' )
  );
  $myposts = new WP_Query( $args );
  if(!$myposts->have_posts()): ?>
    <div class="col-lg-12">
      <div class="nothing"><?php _e('没有内容','i_theme') ?></div>
    </div>
    <?php elseif ($myposts->have_posts()) :
        while ($myposts->have_posts()): $myposts->the_post();?>
        <div class="post-preview">
            <h3 class="post-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
            <p class="post-subtitle"><?php the_excerpt(); ?></p>
            <p class="post-meta">Posted by <a href="#"><?php the_author(); ?></a> on <?php the_date(); comments_number(); ?></p>
            <p><a class="primary" href="<?php the_permalink(); ?>">Read more...</a></p>
        </div>
     <?php endwhile; endif; wp_reset_postdata(); ?>
