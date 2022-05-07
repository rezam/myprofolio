<?php

namespace PROFOLIO\Widgets;

use Elementor\Widget_Base;

if ( !defined( 'ABSPATH' ) ) exit;

class experience extends Widget_Base {

	public function get_name() {
		return 'experienceprofolio';
	}

	public function get_title() {
		return 'جعبه تجربه';
	}

	public function get_icon() {
		return 'eicon-checkbox';
	}

	public function get_categories() {
		return [ 'profolioelementor' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_content_setting',
			[
				'label' => 'تنظیمات',
			]
		);

		$this->add_control(
			'experience_color',
			[
				'label'		=> 'انتخاب رنگ',
				'type'		=> \Elementor\Controls_Manager::COLOR,
				'scheme'	=> [
					'type'	=> \Elementor\Core\Schemes\Color::get_type(),
					'value'	=> \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .timeline-date' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content',
			[
				'label' => 'محتوا',
			]
		);

        $repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'font_family_title',
			[
				'label'		=> 'فونت عنوان',
				'type'		=> \Elementor\Controls_Manager::FONT,
				'default'	=> "'Open Sans', sans-serif",
				'selectors' => [
					'{{WRAPPER}} .timeline-text-h2' => 'font-family: {{VALUE}}',
				],
			]
		);

		$repeater->add_control(
			'experience_list_title', [
				'label'			=> 'عنوان',
				'type'			=> \Elementor\Controls_Manager::TEXT,
				'default'		=> 'عنوان لیست',
				'label_block'	=> true,
			]
		);

        $repeater->add_control(
			'experience_list_date', [
				'label'			=> 'تاریخ فعالیت',
				'type'			=> \Elementor\Controls_Manager::TEXT,
				'default'		=> '',
				'show_label'	=> false,
			]
		);

		$repeater->add_control(
			'font_family_desc',
			[
				'label'			=> 'فونت توضیحات',
				'type'			=> \Elementor\Controls_Manager::FONT,
				'default'		=> "'Open Sans', sans-serif",
				'selectors'		=> [
					'{{WRAPPER}} .timeline-text p' => 'font-family: {{VALUE}}',
				],
			]
		);

		$repeater->add_control(
			'experience_list_content', [
				'label'			=> 'محتوا',
				'type'			=> \Elementor\Controls_Manager::WYSIWYG,
				'default'		=> 'محتوای لیست',
				'show_label'	=> true,
			]
		);

		$this->add_control(
			'list',
			[
				'label'		=> 'لیست تجربه',
				'type'		=> \Elementor\Controls_Manager::REPEATER,
				'fields'	=> $repeater->get_controls(),
				'default'	=> [
					[
						'experience_list_title'		=> 'عنوان تجربه',
						'experience_list_content'	=> 'توضیحات تجربه',
					],
					[
						'experience_list_title'		=> 'عنوان تجربه دوم',
						'experience_list_content'	=> 'توضیحات تجربه',
					],
				],
				'title_field' => '{{{ experience_list_title }}}',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		if ( $settings['list'] ) {
			echo '<div class="timeline">';
			?>
			<style>
				.timeline::after {background: <?php echo $settings['experience_color']; ?>;}
				.timeline .timeline-item::after {border-color: <?php echo $settings['experience_color']; ?>;}
			</style>
			<?php
            $timelinedir = true;
			foreach (  $settings['list'] as $item ) {
				$vazir = 'vazir';
                $dir = "";
                ($timelinedir == 1) ? $dir = 'right' : $dir = 'left';
                echo '<div class="timeline-item ' . $dir . ' '. ucfirst($dir) .'">';
                    echo '<div class="timeline-text">';
                        echo '<div class="timeline-date" style="color: ' . $settings['experience_color'] . '">' . $item['experience_list_date'] . '</div>';
                        echo '<h2 class="timeline-text-h2 elementor-repeater-item-' . $item['_id'] . '" style="font-family: ' . $item['font_family_title'] . '">' . $item['experience_list_title'] . '</h2>';
                        echo '<p style="font-family: ' . $item['font_family_desc'] . '">' . $item['experience_list_content'] . '</p>';
                    echo '</div>';
                echo '</div>';
                $timelinedir = !$timelinedir;
			}
			echo '</div>';
		}
	}

}