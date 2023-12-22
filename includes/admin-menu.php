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
    echo '<form action="options.php" method="post">';
    settings_fields('abz_settings_api_settings');
    do_settings_sections('abz-settings-api');
    submit_button(
        'Save',
        'primary',
        'submit',
        false,
        array('id' => 'submit')
    );
    echo '</form>';
    echo '</div>';
}

