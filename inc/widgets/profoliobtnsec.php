<?php

namespace PROFOLIO\Widgets;

use Elementor\Widget_Base;

if ( !defined( 'ABSPATH' ) ) exit;

class profoliobtnsec extends Widget_Base {

	public function get_name() {
		return 'profoliobtnsec';
	}

	public function get_title() {
		return 'دکمه 2';
	}

	public function get_icon() {
		return 'eicon-button';
	}

	public function get_categories() {
		return ['profolioelementor'];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label'		=> 'تنظیمات',
			]
		);

		$this->add_control(
			'btn_title',
			[
				'label'			=> 'عنوان',
				'type'			=> \Elementor\Controls_Manager::TEXT,
				'default'		=> 'فیسبوک',
				'placeholder'	=> 'فیسبوک',
			]
		);

		$this->add_control(
			'btn_color',
			[
				'label' => 'رنگبندی دکمه',
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#3b5999',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .profoliobtnsec .icon:hover'					=> 'background: {{VALUE}}',
					'{{WRAPPER}} .profoliobtnsec .icon:hover .tooltip'			=> 'background: {{VALUE}}',
					'{{WRAPPER}} .profoliobtnsec .icon:hover .tooltip::before'	=> 'background: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'btn_icon',
			[
				'label'			=> 'انتخاب آیکن',
				'type'			=> \Elementor\Controls_Manager::ICONS,
				'default'		=> [
					'value'		=> 'fab fa-facebook-f',
					'library'	=> 'solid',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'label' => 'تایپوگرافی',
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .profoliobtnsec .icon .tooltip',
			]
		);
		
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="profoliobtnsec">
			<div class="icon">
				<div class="tooltip"><?php echo $settings['btn_title']; ?></div>
				<span><?php \Elementor\Icons_Manager::render_icon( $settings['btn_icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
			</div>
		</div>
		<?php
	}
}