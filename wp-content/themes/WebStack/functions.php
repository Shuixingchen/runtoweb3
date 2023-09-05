<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
date_default_timezone_set('Asia/Shanghai');
require get_template_directory() . '/inc/inc.php';

   
//登录页面的LOGO链接为首页链接
add_filter('login_headerurl',function() {return get_bloginfo('url');});
//登陆界面logo的title为博客副标题
add_filter('login_headertext',function() {return get_bloginfo( 'description' );});

//WordPress 5.0+移除 block-library CSS
add_action( 'wp_enqueue_scripts', 'fanly_remove_block_library_css', 100 );
function fanly_remove_block_library_css() {
	wp_dequeue_style( 'wp-block-library' );
}
function custom_email_subject( $subject, $user_login, $user_email, $key, $user_data ) {
    return 'runtoweb3注册邮件激活';
}
add_filter( 'retrieve_password_title', 'custom_email_subject', 10, 5 );

function custom_email_message( $message, $key, $user_login, $user_email, $user_data ) {
    $message = __( '你好，' ) . "\r\n\r\n";
    $message .= __( '感谢您注册！请单击以下链接激活您的帐户：' ) . "\r\n\r\n";
    $message .= network_site_url( "wp-login.php?action=rp&key=$key&login=" . rawurlencode( $user_login ), 'login' );
    $message .= __( '如果以上链接无法正常工作，请复制到浏览器地址栏中打开。' ) . "\r\n";

    return $message;
}
add_filter( 'retrieve_password_message', 'custom_email_message', 10, 5 );
function wpc_login_redirect_to_homepage( $redirect_to, $request, $user ) {
    // 检查用户对象是否为WP_Error实例
    if ( is_wp_error( $user ) ) {
        return $redirect_to;
    }
    
    // 如果是管理员、编辑、作者 或 供稿人，则正常跳转
    if ( in_array( 'administrator', (array) $user->roles ) || in_array( 'editor', (array) $user->roles ) || in_array( 'author', (array) $user->roles ) || in_array( 'contributor', (array) $user->roles ) ) {
        return $redirect_to;
    }

    // 否则，跳转至首页
    return home_url();
}
add_filter( 'login_redirect', 'wpc_login_redirect_to_homepage', 10, 3 );

// 收藏功能
add_action('wp_ajax_handle_favorite', 'handle_favorite');
add_action('wp_ajax_nopriv_handle_favorite', 'handle_favorite');

function handle_favorite() {
    if (is_user_logged_in()) {
        $post_id = $_POST['post_id'];
        $user_id = get_current_user_id();
        $favorites = get_user_meta($user_id, 'user_post_favorites', true);
        if (!$favorites) {
            $favorites = [];
        }

        if (in_array($post_id, $favorites)) {
            // 移除收藏
            $index = array_search($post_id, $favorites);
            unset($favorites[$index]);
        } else {
            // 添加收藏
            $favorites[] = $post_id;
        }

        update_user_meta($user_id, 'user_post_favorites', $favorites);
        wp_send_json_success('操作成功');
    } else {
        wp_send_json_error('请登陆后操作');
    }
}

// 使用Tailwind
function theme_enqueue_styles() {
    wp_enqueue_style('main-css', get_template_directory_uri() . '/output.css');
}

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
