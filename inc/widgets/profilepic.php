<?php

namespace PROFOLIO\Widgets;

use Elementor\Widget_Base;

if ( !defined( 'ABSPATH' ) ) exit;

class profilepic extends Widget_Base {

	public function get_name() {
		return 'profilepic';
	}

	public function get_title() {
		return 'تصویر پروفایل';
	}

	public function get_icon() {
		return ' eicon-user-circle-o';
	}

	public function get_categories() {
		return ['profolioelementor'];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label'		=> 'محتوا',
			]
		);
        

		
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
        
		<?php
	}
}