<?php

function abz_settings_api_add_options() {
    $options = get_option('abz_settings_api_options');

    if (!$options) {
        $options = array(
            'abz_text_field' => 'ahyawa',
            'abz_checkbox_field' => 1
        );

        update_option('abz_settings_api_options', $options);
    }

    return $options;
}