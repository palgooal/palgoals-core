<?php
/*
Plugin Name: Palgoals Core
Description: Palgoals Core needed for palgoals theme dashboard
Version: 1.2
Author: Hazem Alyahya
GitHub Plugin URI: https://github.com/palgooal/palgoals-core
GitHub Branch: main
Text Domain: palgoals-core
*/
    if(!function_exists('my_custom_fonts')){
        function my_custom_fonts() {
            if ( current_user_can( 'shop_manager' ) ) {
                echo '<link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">';
                echo '<style>
                body.rtl, body.rtl .press-this a.wp-switch-editor {
                font-family: "Cairo", sans-serif;
                }
                .rtl h1, .rtl h2, .rtl h3, .rtl h4, .rtl h5, .rtl h6 {
                font-family: "Cairo", sans-serif;
                font-weight: 600;
                }
                .woocommerce-layout__header {
                display: none;
                }
                </style>';
                } elseif ( current_user_can( 'administrator' ) ) {        
                echo '<link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">';
                echo '<style>
                body, body .press-this a.wp-switch-editor {
                font-family: "Cairo", sans-serif;
                }
                body.rtl, body.rtl .press-this a.wp-switch-editor {
                font-family: "Cairo", sans-serif;
                }
                .rtl h1, .rtl h2, .rtl h3, .rtl h4, .rtl h5, .rtl h6 {
                font-family: "Cairo", sans-serif;
                font-weight: 600;
                }
                </style>';
            }
        }
        add_action('admin_head', 'my_custom_fonts');
    }


include_once plugin_dir_path(__FILE__) . '/includes/pages/pages-admin.php';
include_once plugin_dir_path(__FILE__) . '/includes/pages/custom-login-page.php';
include_once plugin_dir_path(__FILE__) . 'custom-login-page-updater.php';



