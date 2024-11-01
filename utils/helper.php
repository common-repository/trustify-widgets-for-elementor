<?php
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;


if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

function trfy_dimension($that, $section_id, $label, $selector, $usage){
    $that->add_responsive_control(
        'posting_'.$section_id,
        [
            'label' => esc_html( $label ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
            'selectors' => [
                '{{WRAPPER}} ' . $selector => $usage . ': {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
}

function trfy_slider($that, $section_id, $label, $selector, $usage){
    $that->add_responsive_control(
        'posting_'.$section_id,
        [
            'label' => esc_html( $label ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 500,
                    'step' => 1,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} ' . $selector  => $usage . ': {{SIZE}}{{UNIT}};',
            ],
        ]
    );
}

function trfy_color($that, $section_id, $label, $selector, $usage){
    $that->add_responsive_control(
        'posting_'.$section_id,
        [
            'label' => esc_html( $label ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} ' . $selector => $usage . ': {{VALUE}};',
            ],
        ]
    );
}

function trfy_add_text_controls( $that, $section_id, $label, $selector ) {
    $that->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name'     => $section_id . '_typography',
            'label'    => esc_html( $label . ' Typography' ),
            'selector' => '{{WRAPPER}} ' . $selector,
        ]
    );

    $that->add_responsive_control(
        $section_id . '_color',
        [
            'label'     => esc_html( $label . ' Color' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} ' . $selector => 'color: {{VALUE}}',
            ],
        ]
    );
}

function trfy_add_background_border_control( $that, $control_id, $label, $selector ) {
    $that->add_responsive_control(
        $control_id . '_backgroundcolor',
        [
            'label' => esc_html( $label . ' Background Color',  'elementor-job-posting' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} '. $selector => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $that->add_group_control(
        Group_Control_Border::get_type(),
        [
            'name' => $control_id . '_border',
            'selector' => '{{WRAPPER}} ' . $selector,
        ]
    );
}
