<?php

namespace PROFOLIO\Widgets;

use Elementor\Widget_Base;

if ( !defined( 'ABSPATH' ) ) exit;

class profoliotitle extends Widget_Base {

	public function get_name() {
		return 'profoliotitle';
	}

	public function get_title() {
		return 'عنوان';
	}

	public function get_icon() {
		return 'eicon-site-title';
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
			'title_heading',
			[
				'label'     => 'متن عنوان',
				'type'	    => \Elementor\Controls_Manager::TEXT,
				'default'	=> 'لطفا صفحه را ذخیره و مشاهده کنید',
			]
		);

		$this->add_control(
			'colorful_title_align',
			[
				'label' => 'چینش',
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
					'{{WRAPPER}} .section-header' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => 'رنگ عنوان',
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .section-header' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => 'تایپوگرافی',
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .section-header-text',
			]
		);
		
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="section-header">
			<p class="section-header-text">
				<?php echo $settings['title_heading']; ?>
			</p>
		</div>
		<?php
	}

}