<?php

namespace PROFOLIO\Widgets;

use Elementor\Widget_Base;

if ( !defined( 'ABSPATH' ) ) exit;

class testimonial extends Widget_Base {

	public function get_name() {
		return 'testimonialprofolio';
	}

	public function get_title() {
		return 'دیدگاه مشتریان';
	}

	public function get_icon() {
		return 'eicon-facebook-comments';
	}

	public function get_categories() {
		return ['profolioelementor'];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => 'محتوا',
			]
		);

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'testimonial_image',
            [
                'label' => 'انتخاب تصویر',
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
			'testimonial_description', [
				'label' => 'دیدگاه مشتری',
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => 'دیدگاه مشتری',
				'show_label' => true,
			]
		);

		$repeater->add_control(
			'testimonial_title', [
				'label' => 'نام مشتری',
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'testimonial_job', [
				'label' => 'سمت شغلی',
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

        $this->add_control(
			'testimonial_list',
			[
				'label' => 'دیدگاه مشتریان',
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
                'default' => [
					[
						'testimonial_description' => 'دیدگاه مشتری',
						'testimonial_title' => 'عنوان دیدگاه',
						'testimonial_job' => 'سمت شغلی',
					],
					[
						'testimonial_description' => 'دیدگاه مشتری',
						'testimonial_title' => 'عنوان دیدگاه',
						'testimonial_job' => 'سمت شغلی',
					],
				],
				'title_field' => '{{{ testimonial_title }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_style',
			[
				'label' => 'استایل',
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'testimonial_desc_typography',
				'label' => 'تایپوگرافی توضیحات',
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .testimonial-text span',
			]
		);

		$this->add_control(
			'testimonial_desc_color',
			[
				'label' => 'رنگ توضیحات',
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .testimonial-text span' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'testimonial_name_typography',
				'label' => 'تایپوگرافی نام',
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .testimonial-text h3',
			]
		);

		$this->add_control(
			'testimonial_name_color',
			[
				'label' => 'رنگ نام',
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .testimonial-text h3' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'testimonial_job_typography',
				'label' => 'تایپوگرافی شغل',
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .testimonial-text h4',
			]
		);

		$this->add_control(
			'testimonial_job_color',
			[
				'label' => 'رنگ شغل',
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .testimonial-text h4' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

        echo '<div class="testimonial">';
        if ( $settings['testimonial_list'] ) {
			echo '<div class="testimonial-icon">';
                echo '<i class="fa fa-quote-left"></i>';
			echo '</div>';
            echo '<div class="owl-carousel testimonials-carousel">';
			foreach (  $settings['testimonial_list'] as $item ) {
                echo '<div class="testimonial-item">';
                    echo '<div class="testimonial-img">';
                        echo '<img src="' . $item['testimonial_image']['url'] . '">';
                    echo '</div>';
                    echo '<div class="testimonial-text">';
                        echo '<span style="color: ' . $settings['testimonial_desc_color'] . '">' . $item['testimonial_description'] . '</span>';
                        echo '<h3 style="color: ' . $settings['testimonial_name_color'] . '">' . $item['testimonial_title'] . '</h3>';
                        echo '<h4 style="color: ' . $settings['testimonial_job_color'] . '">' . $item['testimonial_job'] . '</h4>';
                    echo '</div>';
                echo '</div>';
            }
            echo '</div>';
		}
        echo '</div>';
	}

}