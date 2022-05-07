<?php

namespace PROFOLIO\Widgets;

use Elementor\Widget_Base;

if ( !defined( 'ABSPATH' ) ) exit;

class profoliobtn extends Widget_Base {

	public function get_name() {
		return 'profoliobtn';
	}

	public function get_title() {
		return 'دکمه 1';
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
			'profoliobtn_title',
			[
				'label'     => 'عنوان دکمه',
				'type'	    => \Elementor\Controls_Manager::TEXT,
				'default'	=> 'متن',
			]
		);
        $this->add_control(
			'profoliobtn_url',
			[
				'label'     => 'نشانی دکمه',
				'type'	    => \Elementor\Controls_Manager::TEXT,
				'default'	=> 'متن',
			]
		);

		$this->add_control(
			'profoliobtn_color',
			[
				'label' 	=> 'رنگ عنوان',
				'type'		=> \Elementor\Controls_Manager::COLOR,
				'default'	=> '#EF233C',
				'scheme'	=> [
					'type'	=> \Elementor\Core\Schemes\Color::get_type(),
					'value'	=> \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .profoliobtn.btn' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'profoliobtn_backcolor',
			[
				'label' 	=> 'رنگ پس زمینه',
				'type'		=> \Elementor\Controls_Manager::COLOR,
				'default'	=> '#fff',
				'scheme'	=> [
					'type'	=> \Elementor\Core\Schemes\Color::get_type(),
					'value'	=> \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .profoliobtn.btn' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'profoliobtn_bordercolor',
			[
				'label' 	=> 'رنگ حاشیه',
				'type'		=> \Elementor\Controls_Manager::COLOR,
				'default'	=> '#EF233C',
				'scheme'	=> [
					'type'	=> \Elementor\Core\Schemes\Color::get_type(),
					'value'	=> \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .profoliobtn.btn' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'profoliobtn_hovercolor',
			[
				'label' 	=> 'رنگ عنوان هاور',
				'type'		=> \Elementor\Controls_Manager::COLOR,
				'default'	=> '#fff',
				'scheme'	=> [
					'type'	=> \Elementor\Core\Schemes\Color::get_type(),
					'value'	=> \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .profoliobtn.btn:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'profoliobtn_hoverbackcolor',
			[
				'label' 	=> 'رنگ پس زمینه هاور',
				'type'		=> \Elementor\Controls_Manager::COLOR,
				'default'	=> '#EF233C',
				'scheme'	=> [
					'type'	=> \Elementor\Core\Schemes\Color::get_type(),
					'value'	=> \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .profoliobtn.btn:hover' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'profoliobtn_borderhovercolor',
			[
				'label' 	=> 'رنگ حاشیه هاور',
				'type'		=> \Elementor\Controls_Manager::COLOR,
				'default'	=> '#fff',
				'scheme'	=> [
					'type'	=> \Elementor\Core\Schemes\Color::get_type(),
					'value'	=> \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .profoliobtn.btn:hover' => 'border-color: {{VALUE}}',
				],
			]
		);
		
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<a href="<?php echo $settings['profoliobtn_url']; ?>" class="profoliobtn btn"  style="color: <?php $settings['profoliobtn_color']; ?>; background: <?php $settings['profoliobtn_backcolor']; ?> ">
			<?php echo $settings['profoliobtn_title']; ?>
        </a>
		<?php
	}
}