<?php

add_action('admin_menu', 'abz_settings_api_admin_menu');

function abz_settings_api_admin_menu()
{
    add_menu_page(
        'Settings API',
        'Settings API',
        'manage_options',
        'abz-settings-api',
        'abz_settings_api_admin_page',
    );
}

function abz_settings_api_admin_page() {
    echo '<div class="wrap">';
    echo '<h1>Settings API</h1>';
    echo "<form method='post' action='options.php' name='abz_settings_api_form'>";
    settings_fields('abz_settings_api_settings');
    do_settings_sections('abz-settings-api');
    submit_button();
    echo '</form>';
    echo '</div>';
}

