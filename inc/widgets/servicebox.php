<?php

namespace PROFOLIO\Widgets;

use Elementor\Widget_Base;

if ( !defined( 'ABSPATH' ) ) exit;

class servicebox extends Widget_Base {

	public function get_name() {
		return 'profolioservice';
	}

	public function get_title() {
		return 'جعبه خدمات';
	}

	public function get_icon() {
		return 'eicon-custom';
	}

	public function get_categories() {
		return ['profolioelementor'];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => 'تنظیمات',
			]
		);

		$this->add_control(
			'service_title_heading',
			[
				'label'     => 'متن عنوان',
				'type'	    => \Elementor\Controls_Manager::TEXT,
				'default'	=> 'عنوان خدمات',
			]
		);

		$this->add_control(
			'service_colorful_title_align',
			[
				'label' => 'چینش عنوان',
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => 'چپ',
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => 'وسط',
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => 'راست',
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'right',
				'selectors' => [
					'{{WRAPPER}} .service_header' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'service_title_color',
			[
				'label' => 'رنگ عنوان',
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#515151',
				'selectors' => [
					'{{WRAPPER}} .service_header' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'service_title_hovercolor',
			[
				'label' => 'رنگ هاور عنوان',
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#FFFFFF',
				'selectors' => [
					'{{WRAPPER}} .service-item:hover .service_header' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'service_content_typography',
				'label' => 'تایپوگرافی عنوان',
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .service_header',
			]
            );


        $this->add_control(
			'service_title_description',
			[
				'label'     => 'متن توضیحات',
				'type'	    => \Elementor\Controls_Manager::TEXT,
				'default'	=> 'متن توضیحات خدمات اینجاست.',
			]
		);

		$this->add_control(
			'service_colorful_description_align',
			[
				'label' => 'چینش توضیحات',
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => 'چپ',
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => 'وسط',
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => 'راست',
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'right',
				'selectors' => [
					'{{WRAPPER}} .service_description' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'service_description_color',
			[
				'label' => 'رنگ توضیحات',
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#666666',
				'selectors' => [
					'{{WRAPPER}} .service_description' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'service_description_hovercolor',
			[
				'label' => 'رنگ هاور توضیحات',
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#FFFFFF',
				'selectors' => [
					'{{WRAPPER}} .service-item:hover .service_description' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'service_description_typography',
				'label' => 'تایپوگرافی توضیحات',
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .service_description',
			]
		);

        $this->add_control(
			'service_icon',
			[
				'label' => 'آیکن',
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
			]
		);

        $this->add_control(
			'service_color',
			[
				'label' => 'رنگ جعبه',
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#EF233C',
				'selectors' => [
					'{{WRAPPER}} .service-icon' => 'color: {{VALUE}}',
					'{{WRAPPER}} .service-item:hover .service-icon' => 'border: 1px solud {{VALUE}}',
					'{{WRAPPER}} .service-item:hover' => 'background: {{VALUE}}',
				],
			]
		);
		
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<div class="service-item">
            
            <div class="service-icon" style="border:1px solid <?php echo $settings['service_color']; ?>">
                <?php \Elementor\Icons_Manager::render_icon( $settings['service_icon'], [ 'aria-hidden' => 'true', 'color' => $settings['service_color'] ] ); ?>
            </div>
            <div class="service-text">
                <h3 class="service_header"><?php echo $settings['service_title_heading']; ?></h3>
                <p class="service_description"><?php echo $settings['service_title_description']; ?></p>
            </div>
        </div>
    <?php
	}

}