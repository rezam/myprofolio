<?php

/*
*
* Register Custom Widgets
*
*/

namespace PROFOLIO;

class Widget_Loader {
	private static $_instance = null;
	
	public static function instance() {
		if (is_null(self::$_instance)) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	function add_elementorprofolio_widget_categories( $elements_manager ) {

		$elements_manager->add_category(
			'profolioelementor',
			[
				'title' => 'پروفولیو',
				'icon' => 'fa fa-plug',
			]
		);
	
	}

	private function include_widgets_files() {
		require_once( __DIR__ . '/profoliotitle.php' );
		require_once( __DIR__ . '/progressbar.php' );
		require_once( __DIR__ . '/servicebox.php' );
		require_once( __DIR__ . '/experience.php' );
		require_once( __DIR__ . '/profoliobtn.php' );
		require_once( __DIR__ . '/profoliobtnsec.php' );
		require_once( __DIR__ . '/pricebox.php' );
		require_once( __DIR__ . '/testimonial.php' );
		require_once( __DIR__ . '/teambox.php' );
		require_once( __DIR__ . '/postbox.php' );
		require_once( __DIR__ . '/profolioslider.php' );
		require_once( __DIR__ . '/profilepic.php' );
	}

	public function register_widgets() {
		$this->include_widgets_files();

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\profoliotitle() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\progressbar() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\servicebox() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\experience() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\profoliobtn() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\profoliobtnsec() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\pricebox() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\testimonial() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\teambox() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\postbox() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\profolioslider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\profilepic() );
	}

	public function __construct() {
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ], 99 );
		add_action( 'elementor/elements/categories_registered', [ $this, 'add_elementorprofolio_widget_categories' ] );
	}
}

Widget_Loader::instance();


