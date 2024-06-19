<?php
// Check for updates
add_filter('pre_set_site_transient_update_plugins', 'check_for_plugin_update');
function check_for_plugin_update($transient) {
    if (empty($transient->checked)) {
        return $transient;
    }

    $plugin_slug = plugin_basename(__FILE__);
    $remote_version = get_remote_version();

    if (version_compare($remote_version['new_version'], $transient->checked[$plugin_slug], '>')) {
        $transient->response[$plugin_slug] = (object) $remote_version;
    }

    return $transient;
}

function get_remote_version() {
    $response = wp_remote_get('https://wpgooal.com/plugins-updater/palgoals-core.json');

    if (is_wp_error($response) || 200 != wp_remote_retrieve_response_code($response)) {
        return false;
    }

    $remote_version = json_decode(wp_remote_retrieve_body($response), true);
    return array(
        'slug' => plugin_basename(__FILE__),
        'new_version' => $remote_version['version'],
        'url' => 'https://wpgooal.com',
        'package' => $remote_version['download_url']
    );
}

// Plugin update information
add_filter('plugins_api', 'plugin_update_info', 20, 3);
function plugin_update_info($false, $action, $arg) {
    if (!isset($arg->slug) || $arg->slug != plugin_basename(__FILE__)) {
        return $false;
    }

    $response = wp_remote_get('https://wpgooal.com/plugins-updater/palgoals-core.json');

    if (is_wp_error($response) || 200 != wp_remote_retrieve_response_code($response)) {
        return $false;
    }

    $remote_version = json_decode(wp_remote_retrieve_body($response), true);
    $remote_version['slug'] = plugin_basename(__FILE__);
    return (object) $remote_version;
}
