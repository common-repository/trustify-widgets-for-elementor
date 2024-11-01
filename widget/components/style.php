<?php
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;


if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

require_once TRFY_PLUGIN_PATH ."/utils/helper.php";

function trfy_styling_setting($that){
    trfy_headerStyle($that);

    trfy_gridContentStyle($that);
    trfy_listContentStyle($that);

    trfy_cardHeaderStyle($that);
    trfy_cardBodyStyle($that);
    trfy_cardFooterStyle($that);
    trfy_sliderContentStyle($that);    
}

function trfy_headerStyle($that){
    $that->start_controls_section(
        'trustify_list_header',
        [
            'label' => esc_html( 'Header' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
    
    trfy_dimension($that, 'trustify_header_padding', 'Padding', '.trustify .rating-title', 'padding');
    $that->add_group_control(
        Group_Control_Background::get_type(),
        [
            'name' => 'trustify_header_background',
            'types' => [ 'classic', 'gradient', 'video' ],
            'selector' => '{{WRAPPER}} .trustify .rating-title',
        ]
    );

    
    $that->add_control(
        'trustify_heading_title',
        [
            'label' => esc_html( 'Title' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    trfy_dimension($that, 'trustify_title_padding', 'Padding', '.trustify .rating-title #w-title', 'padding');
   
    trfy_slider($that, 'trustify_logo_width', 'Logo Width', '.trustify .rating-title #w-title svg', 'width');
    trfy_slider($that, 'trustify_logo_height', 'Logo Height', '.trustify .rating-title #w-title svg', 'height');

    $that->add_control(
        'trustify_logo_dark_mode',
        [
            'label' => esc_html__( 'White Version Logo', 'trustify-widgets-for-elementor' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Yes', 'trustify-widgets-for-elementor' ),
            'label_off' => esc_html__( 'No', 'trustify-widgets-for-elementor' ),
            'return_value' => 'yes',
            'default' => 'no',
        ]
    );

    trfy_add_text_controls($that, 'trustify_title_typography', 'Title', '.trustify .rating-title #w-title .title-large');
    trfy_add_background_border_control($that, 'trustify_title_background', 'Title', '.trustify .rating-title #w-title');

    


    $that->add_control(
        'trustify_heading_description',
        [
            'label' => esc_html( 'Description' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    trfy_dimension($that, 'trustify_description_padding', 'Padding', '.trustify .rating-title #w-description span', 'padding');
    trfy_slider($that, 'trustify_desc_width', 'Icon Width', '.trustify .rating-title #w-description svg', 'width');
    trfy_slider($that, 'trustify_desc_height', 'Icon Height', '.trustify .rating-title #w-description svg', 'height');
    
    $that->add_control(
        'trustify_star_color',
        [
            'label' => esc_html__( 'Star Icon Color', 'trustify-widgets-for-elementor' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .trustify-r-star svg path' => 'fill: {{VALUE}};',
            ],
        ]
    );

    
    trfy_add_text_controls($that, 'trustify_description_typography', 'Description', '.trustify .rating-title #w-description span');
    trfy_add_text_controls($that, 'trustify_description_background', 'Description Link', '.trustify .rating-title #w-description a');
    trfy_add_background_border_control($that, 'trustify_description_background', 'Description', '.trustify .rating-title #w-description');


    $that->end_controls_section();
}

function trfy_gridContentStyle($that){
    $that->start_controls_section(
        'trustify_grid_content',
        [
            'label' => esc_html( 'Content' ),
            'tab' => Controls_Manager::TAB_STYLE,
            'condition' => [
                'style_options' => 'style_1',
            ],
        ]
    );
    trfy_slider($that, 'trustify_column_gap', 'Grid Gap', '.w-grid_wrapper .grid-row', 'gap');
    trfy_add_background_border_control($that, 'trustify_grid_card_background', 'Card', '.w-grid_wrapper .grid-child');

    $that->end_controls_section();
}

function trfy_listContentStyle($that){
    $that->start_controls_section(
        'trustify_list_content',
        [
            'label' => esc_html( 'Content' ),
            'tab' => Controls_Manager::TAB_STYLE,
            'condition' => [
                'style_options' => 'style_2',
            ],
        ]
    );
    trfy_slider($that, 'trustify_list_spacing', 'Spacing List', '.w-list_wrapper .list-child', 'margin-bottom');
    trfy_add_background_border_control($that, 'trustify_list_card_background', 'Card', '.w-list_wrapper .list-child');

    $that->end_controls_section();
}

function trfy_sliderContentStyle($that){
    $that->start_controls_section(
        'trustify_slider_content',
        [
            'label' => esc_html( 'Slider Controls' ),
            'tab' => Controls_Manager::TAB_STYLE,
            'condition' => [
                'style_options' => 'style_3',
            ],
        ]
    );
 
    $that->add_control(
        'trustify_slider_navigation',
        [
            'label' => esc_html( 'Navigation' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    
    $that->add_responsive_control(
        'trustify_slider_nav_color',
        [
            'label' => esc_html__( 'Nav Color', 'trustify-widgets-for-elementor' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .swiper-button-next, {{WRAPPER}} .swiper-button-prev' => 'color: {{VALUE}} !important;',
            ],
        ]
    );
    trfy_add_background_border_control($that, 'trustify_slider_control_background', 'Nav', '.swiper-button-next, {{WRAPPER}} .swiper-button-prev');

    $that->add_control(
        'control_width',
        [
            'label' => esc_html__( 'Width', 'trustify-widgets-for-elementor' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 5,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .swiper-button-next, {{WRAPPER}} .swiper-button-prev' => 'width: {{SIZE}}{{UNIT}} !important;',
            ],
        ]
    );

    $that->add_control(
        'control_height',
        [
            'label' => esc_html__( 'Height', 'trustify-widgets-for-elementor' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 5,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .swiper-button-next, {{WRAPPER}} .swiper-button-prev' => 'height: {{SIZE}}{{UNIT}} !important;',
            ],
        ]
    );

    
    $that->add_control(
        'trustify_slider_pagination',
        [
            'label' => esc_html( 'Pagination' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $that->add_responsive_control(
        'trustify_slider_pagination_active',
        [
            'label' => esc_html__( 'Active Color', 'trustify-widgets-for-elementor' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} span.swiper-pagination-bullet.swiper-pagination-bullet-active.swiper-pagination-bullet-active-main' => 'background-color: {{VALUE}} !important;',
            ],
        ]
    );
    $that->add_responsive_control(
        'trustify_slider_pagination_nonactive',
        [
            'label' => esc_html__( 'Non Active Color', 'trustify-widgets-for-elementor' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} span.swiper-pagination-bullet' => 'background-color: {{VALUE}} !important;',
            ],
        ]
    );
    $that->end_controls_section();
}


function trfy_cardHeaderStyle($that){
    $that->start_controls_section(
        'trustify_card_header',
        [
            'label' => esc_html( 'Card Header' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );

    trfy_dimension($that, 'trustify_card_header', 'Padding', '.trustify .w-review-head', 'padding');
    trfy_add_text_controls($that, 'trustify_card_title_typography', 'Title', '.trustify .w-review-head .w-review_title');
    

    $that->add_control(
        'trustify_card_author',
        [
            'label' => esc_html( 'Author' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    trfy_add_text_controls($that, 'trustify_card_author_typography', 'Author', '.trustify .w-review-head .w-review-author');

    $that->end_controls_section();
}



function trfy_cardBodyStyle($that){
    $that->start_controls_section(
        'trustify_card_body',
        [
            'label' => esc_html( 'Card Body' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
    
    trfy_dimension($that, 'trustify_card_body', 'Padding', '.trustify .w-review-body', 'padding');
    trfy_add_text_controls($that, 'trustify_card_content_typography', 'Content', '.trustify .w-review-body .w-review-content');
    
    $that->end_controls_section();
}


function trfy_cardFooterStyle($that){
    $that->start_controls_section(
        'trustify_card_footer',
        [
            'label' => esc_html( 'Card Footer' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
    
    trfy_dimension($that, 'trustify_card_footer', 'Padding', '.trustify .w-review-footer', 'padding');
    trfy_add_text_controls($that, 'trustify_card_date_typography', 'Date', '.trustify .w-review-footer .w-review-date');
    
    
    $that->add_control(
        'trustify_card_rating',
        [
            'label' => esc_html( 'Rating' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    trfy_slider($that, 'trustify_card_rating_typography', 'Rating', '.trustify .w-review-footer .w-review-rating i', 'font-size');
    $that->add_control(
        'trustify_card__fill_rating_color',
        [
            'label' => esc_html__( 'Fill Star Color', 'trustify-widgets-for-elementor' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .trustify .w-review-footer .w-review-rating i' => 'color: {{VALUE}}',
            ],
        ]
    );

    $that->add_control(
        'trustify_card_empty_rating_color',
        [
            'label' => esc_html__( 'Empty Star Color', 'trustify-widgets-for-elementor' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .trustify .w-review-footer .w-review-rating i.empty-star' => 'color: {{VALUE}}',
            ],
        ]
    );
    $that->end_controls_section();
}