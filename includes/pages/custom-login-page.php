<?php
// تغيير شعار صفحة تسجيل الدخول
function custom_login_logo() {
    echo '<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Almarai:wght@400;700&display=swap" />';
    echo '<link rel="stylesheet" type="text/css" href="' . plugin_dir_url( __FILE__ ) . 'assets/css/custom-login.css" />';
}
add_action('login_enqueue_scripts', 'custom_login_logo');

// تغيير الرابط عند النقر على الشعار
function custom_login_logo_url() {
    return home_url();
}
add_filter('login_headerurl', 'custom_login_logo_url');
?>
