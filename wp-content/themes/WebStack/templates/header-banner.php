<?php
/*
 * @Theme Name:WebStack
 * @Theme URI:https://www.iotheme.cn/
 * @Author: iowen
 * @Author URI: https://www.iowen.cn/
 * @Date: 2019-02-22 21:26:02
 * @LastEditors: iowen
 * @LastEditTime: 2022-07-25 18:11:27
 * @FilePath: \WebStack\templates\header-banner.php
 * @Description: 
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }  ?>
<nav class="navbar user-info-navbar" role="navigation">
    <div class="navbar-content">
      <ul class="user-info-menu list-inline list-unstyled">
        <li class="hidden-xs">
            <a href="#" data-toggle="sidebar">
                <i class="fa fa-bars"></i>
            </a>
        </li>
        <li>
          <div id="he-plugin-simple"></div>
          <a href="https://chaintool.tech/" target="_blank"> Web3工具</a>
        </li>

      </ul>
      <ul class="user-info-menu list-inline list-unstyled">
        <li class="hidden-sm hidden-xs">
        <?php
          if ( is_user_logged_in() ) {
              $current_user = wp_get_current_user();
              $user_profile_url = get_edit_profile_url();  // 获取用户信息页面链接
              echo '<a href="'.esc_url($user_profile_url ).'"> welcome! '.esc_html( $current_user->display_name ).'  </a>';
          } else {
              echo '<a href="' . esc_url( wp_login_url() ) . '" target="_blank"><i class="fa fa-user"></i></a>';
          }
        ?>
        </li>
      </ul>
    </div>
</nav>