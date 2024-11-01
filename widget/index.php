<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

require_once "components/content.php";
require_once "components/style.php";
require_once "components/render.php";

class TRFY_Elementor_Trustify_Rating_Widget extends Widget_Base{
/**
     * Retrieve Widget Name.
     *
     * @since 1.0.0
     * @access public
     */
    public function get_name()
    {
        return 'trustify-widgets-for-elementor';
    }


    /**
     * Retrieve Widget Title.
     *
     * @since 1.0.0
     * @access public
     */
    public function get_title()
    {
        return esc_html('Trustify Rating', 'trustify-widgets-for-elementor');
    }

    public function get_icon()
    {
        return 'eicon-product-rating';
    }


    /**
     * Retrieve Widget Keywords.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget keywords.
     */
    public function get_keywords()
    {
        return array('rating', 'trustify', 'reviews', 'feedback');
    }

    public function get_style_depends() {
        wp_enqueue_style('trustify_style', plugin_dir_url(__DIR__) . '/assets/css/custom.css', array(), '5.2.3');
        wp_enqueue_style('bootstrap_local', plugin_dir_url(__DIR__) . '/assets/css/bootstrap.min.css', array(), '5.2.3');
        wp_enqueue_style('fontawesome_local', plugin_dir_url(__DIR__) . '/assets/css/fontawesome/css/all.min.css', array(), '5.2.3');
        wp_enqueue_style('swiper_local', plugin_dir_url(__DIR__) . '/assets/css/fontawesome/css/swiper-bundle.min.css', array(), '5.2.3');

        return ['trustify_style', 'swiper_local', 'bootstrap_local', 'fontawesome_local'];
    }

    public function get_script_depends() {
        wp_enqueue_script('swiper_bundle', plugin_dir_url(__DIR__) . '/assets/js/swiper-bundle.min.js',  array('jquery'), '1.0', true);
        wp_enqueue_script('script_local', plugin_dir_url(__DIR__) . '/assets/js/main.js',  array('jquery'), '1.0', true);

        return ['script_local', 'swiper_bundle'];
    }


    public function get_categories()
    {
        return ['general'];
    }


    public function get_custom_help_url()
    {
        return 'https://trustify.ch/';
    }

    

    protected function register_controls()
    {
        trfy_content_setting($this);
        trfy_styling_setting($this);
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        trfy_renderHtml($settings);
    }
}