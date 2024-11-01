<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

function trfy_custom_determine_user_language() {
    // Check if the HTTP_ACCEPT_LANGUAGE header is set
    if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
        // Get the user's preferred languages from the header
        $preferred_languages = sanitize_text_field($_SERVER['HTTP_ACCEPT_LANGUAGE']);

        // Split the header into an array of language tags
        $languages = explode(',', $preferred_languages);

        // Extract the primary language from the first tag
        $user_locale = strtolower(explode('-', $languages[0])[0]);

        // Extract the country code and uppercase it
        $country_code = strtoupper(explode('-', $languages[0])[1] ?? '');

        // Sanitize the user locale
        $user_locale = sanitize_text_field($user_locale);

        // Validate language and country code format 
        if (!preg_match('/^[A-Z]{2}$/', $user_locale) || !preg_match('/^[A-Z]{2}$/', $country_code)) {
            // handle invalid format by setting default values
            $user_locale = 'en';     // Set default language code to 'en'
            $country_code = 'US';    // Set default country code to 'US'
        }

        // Combine language and country code in the format "de_DE" with underscore
        $result_locale = $user_locale . '_' . $country_code;

        // Replace hyphen with underscore
        $result_locale = str_replace('-', '_', $result_locale);

        return $result_locale;
    }

    // Fallback to the default locale of the site if header is not available
    return get_locale();
}


