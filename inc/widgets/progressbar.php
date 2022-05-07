<?php

namespace PROFOLIO\Widgets;

use Elementor\Widget_Base;

if ( !defined( 'ABSPATH' ) ) exit;

class progressbar extends Widget_Base {

	public function get_name() {
		return 'progressbar';
	}

	public function get_title() {
		return 'نوار پیشرفت';
	}

	public function get_icon() {
		return 'eicon-chevron-double-left';
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
			'font_family',
			[
				'label' => 'انتخاب فونت',
				'type' => \Elementor\Controls_Manager::FONT,
				'default' => "'Open Sans', sans-serif",
				'selectors' => [
					'{{WRAPPER}} .skill-name p' => 'font-family: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => 'انتخاب رنگ',
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .progress-bar' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'title_heading',
			[
				'label'     => 'عنوان مهارت',
				'type'	    => \Elementor\Controls_Manager::TEXT,
				'default'	=> '',
			]
		);
        $this->add_control(
			'title_percent',
			[
				'label'     => 'درصد مهارت',
				'type'	    => \Elementor\Controls_Manager::TEXT,
				'default'	=> '',
			]
		);
		
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
        <span class="about">
            <div class="skill-name">
                <p style="font-family: '<?php echo $settings['font_family'] ?>'">
                    <?php echo $settings['title_heading']; ?>
                </p>
                <p style="font-family: '<?php echo $settings['font_family'] ?>'">
                    <?php echo $settings['title_percent']; ?>
                </p>
            </div>
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $settings['title_percent']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $settings['title_percent']; ?>;background-color: <?php echo $settings['title_color'] ?>"></div>
            </div>
        </span>
		<?php
	}

}