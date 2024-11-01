<?php
use Elementor\Icons_Manager;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

require_once TRFY_PLUGIN_PATH ."/utils/index.php";

function trfy_renderHtml($settings){
    extract($settings);
    


    $profile_url = trfy_apiUrl() . 'reporting/profile/'.$api_profile_username.'/bar';
    $response = wp_remote_get($profile_url);
    
    // Check if the request was successful
    if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
    // Retrieve the body of the response
    $profile_data = wp_remote_retrieve_body($response);

    // Proceed with processing $profile_data...
    } else {
    // Log the error
    if (is_wp_error($response)) {
        $error_message = $response->get_error_message();
    } else {
        $error_message = 'API Request Error: Unable to fetch content from Trustify';
    }
        error_log($error_message);
        return;
    }

    // JSON Decoding
    $profile_data = json_decode($profile_data, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        error_log('JSON Decoding Error: ' . json_last_error_msg());
        return;
    }

    $api_profile_id = $profile_data['id'];

    $feedback_url = trfy_apiUrl() . 'reporting/profile/' . $api_profile_id . '/feed?limit=' . $api_response_limit;
    $response_feedback = wp_remote_get($feedback_url);
    if (is_wp_error($response_feedback) || wp_remote_retrieve_response_code($response_feedback) !== 200) {
        $error_message = is_wp_error($response_feedback) ? $response_feedback->get_error_message() : 'API Request Error: Unable to fetch content from Trustify';
        error_log($error_message);
        return;
    }

    // Retrieve the body of the response
    $feedback_data = wp_remote_retrieve_body($response_feedback);

    // JSON Decoding
    $feedback_data = json_decode($feedback_data, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        error_log('JSON Decoding Error: ' . json_last_error_msg());
        return;
    }


    echo "<div class='trustify'>";
    if ($style_options === 'style_1') {
        require_once TRFY_PLUGIN_PATH ."/widget/components/style1/index.php";
        trfy_gridHtml($settings, $profile_data, $feedback_data);
    } else if ($style_options === 'style_2') {
        require_once TRFY_PLUGIN_PATH ."/widget/components/style2/index.php";
        trfy_listHtml($settings, $profile_data, $feedback_data);
    } else if ($style_options === 'style_3') {
        require_once TRFY_PLUGIN_PATH ."/widget/components/style3/index.php";
        trfy_sliderHtml($settings, $profile_data, $feedback_data);
    } else {
        require_once TRFY_PLUGIN_PATH ."/widget/components/footer1/index.php";
        trfy_footerHtml($settings, $profile_data, $feedback_data);
    }

    echo "</div>";
}