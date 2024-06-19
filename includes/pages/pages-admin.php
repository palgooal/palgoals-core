<?php

function custom_page_list_admin_menu() {
    add_menu_page('قائمة الصفحات المخصصة', 'الصفحات المخصصة', 'manage_options', 'custom_page_list', 'custom_page_list_admin_page');
}
add_action('admin_menu', 'custom_page_list_admin_menu');

function custom_page_list_admin_page() {
    $pages = get_pages();
    echo '<div class="wrap">';
    echo '<h1>الصفحات المخصصة</h1>';
    echo '<table class="widefat">';
    echo '<thead><tr><th>العنوان</th><th>تعديل</th><th>شاهفاء</th></tr></thead>';
    echo '<tbody>';
    foreach ($pages as $page) {
        $edit_url = get_site_url() . '/wp-admin/post.php?post=' . $page->ID . '&action=elementor';
        $view_url = get_permalink($page->ID);
        $hide_url = get_site_url() . '/wp-admin/post.php?post=' . $page->ID . '&action=trash';
        echo '<tr>
        <td>' . $page->post_title . '</td><td><a href="' . $edit_url . '">تعديل</a>
        </td>
        <td><a href="' . $view_url . '" target="_blank">شاهد</a></td>
        
        </tr>';
    }
    echo '</tbody></table>';
    echo '</div>';
}