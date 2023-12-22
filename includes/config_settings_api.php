<?php


add_action('admin_init', 'abz_settings_api_plugin_sections');

function abz_settings_api_plugin_sections()
{
    // Register Settings
    register_setting(
        'abz_settings_api_settings',
        'abz_settings_api_options',
        array(
            'type' => 'array',
            'description' => 'Settings API Options',
            'sanitize_callback' => 'abz_settings_api_sanitize',
        )
    );

    // Add Settings Section
    add_settings_section(
        'abz_settings_api_main_section',
        'Main Settings',
        'abz_settings_api_render_main_section',
        'abz-settings-api'
    );

    // Add Settings Field
    add_settings_field(
        'abz_text_field',
        'My Settings Field',
        'abz_settings_api_render_text_field',
        'abz-settings-api',
        'abz_settings_api_main_section',
        array(
            'name' => 'abz_text_field',
        )
    );

    // Add Settings Field
    add_settings_field(
        'abz_checkbox_field',
        'My Checkbox Field',
        'abz_settings_api_render_checkbox_field',
        'abz-settings-api',
        'abz_settings_api_main_section',
        array(
            'name' => 'abz_checkbox_field',
        )
    );
}

function abz_settings_api_render_main_section()
{
    echo '<p>Main Section</p>';
}

function abz_settings_api_sanitize($input)
{
    if (isset($input['abz_text_field'])) {
        $input['abz_text_field'] = sanitize_text_field($input['abz_text_field']);
    }
    
    if (isset($input['abz_checkbox_field'])) {
        $input['abz_checkbox_field'] = absint($input['abz_checkbox_field']);
    } else {
        $input['abz_checkbox_field'] = 0;
    }

    return $input;
}

function abz_settings_api_render_text_field($args)
{
    extract($args);
    $options = abz_settings_api_add_options();
    $option_value = esc_html($options[$name]);

    echo '<input type="text" name="abz_settings_api_options[' . $name . ']" value="' . $option_value . '" />';
}

function abz_settings_api_render_checkbox_field($args)
{
    extract($args);
    $options = abz_settings_api_add_options();
    $is_checked = checked($options[$name], 1, false);

    echo '<input type="checkbox" name="abz_settings_api_options[' . $name . ']" value="1" ' . $is_checked . ' />';
}