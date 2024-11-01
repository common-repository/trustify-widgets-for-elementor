<?php
use Elementor\Controls_Manager;
use Elementor\Utils;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

function trfy_content_setting($that){
    $that->start_controls_section(
        'widget_style',
        [
            'label' => __('Widget Options', 'trustify-widgets-for-elementor'),
        ]
    );
    $that->add_control(
        'style_options',
        [
            'label' => __('Style', 'trustify-widgets-for-elementor'),
            'description' => esc_html__( 'Choose from one of the styles. Footer options belong in the footer of the website for search engine optimization.', 'trustify-widgets-for-elementor' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                'style_1'  => 'Style 1',
                'style_2'  => 'Style 2',
                'style_3'  => 'Style 3',
                'footer_1'  => 'Footer 1',

            ),
            'default' => 'style_1',
        ]
    );
    $that->add_control(
        'api_profile_username',
        [
            'label' => __('Profile Slug', 'trustify-widgets-for-elementor'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__( '', 'trustify-widgets-for-elementor' ), // Empty string is intentional for default value
            'placeholder' => esc_html__( 'Type your profile slug', 'trustify-widgets-for-elementor' ),
        ]
    );
    // $that->add_control(
    //     'api_profile_id',
    //     [
    //         'label' => __('Profile ID', 'trustify-widgets-for-elementor'),
    //         'type' => \Elementor\Controls_Manager::TEXT,
    //         'default' => esc_html__( '', 'trustify-widgets-for-elementor' ),
    //         'placeholder' => esc_html__( 'Type your profile id', 'trustify-widgets-for-elementor' ),
    //     ]
    // );
    $that->add_control(
        'api_response_limit',
        [
            'label' => esc_html__( 'Review Limit', 'trustify-widgets-for-elementor' ),
            'description' => esc_html__( 'Maximum of 50 reviews displayed', 'trustify-widgets-for-elementor' ),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'min' => 3,
            'max' => 50,
            'step' => 1,
            'default' => 5,
        ]
    );
    $that->add_control(
        'lang_options',
        [
            'label' => __('Language', 'trustify-widgets-for-elementor'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                'lang_auto'  => 'Auto (by WordPress)',
                'lang_browser' => 'Auto (Browser Language)',
                'en_US'  => 'English',
                'de_DE'  => 'German',
                'fr_FR'  => 'French',
            ),
            'default' => 'lang_browser',
        ]
    );

       
    $that->end_controls_section();
}