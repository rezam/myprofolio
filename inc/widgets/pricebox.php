<?php

namespace PROFOLIO\Widgets;

use Elementor\Widget_Base;

if ( !defined( 'ABSPATH' ) ) exit;

class pricebox extends Widget_Base {

	public function get_name() {
		return 'priceboxprofolio';
	}

	public function get_title() {
		return 'تعرفه';
	}

	public function get_icon() {
		return 'eicon-price-table';
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
			'pricebox_list_title',
			[
				'label'     => 'نام پلن',
				'type'	    => \Elementor\Controls_Manager::TEXT,
				'default'	=> '',
			]
		);

        $this->add_control(
			'pricebox_list_price',
			[
				'label'     => 'تعرفه پلن',
				'type'	    => \Elementor\Controls_Manager::TEXT,
				'default'	=> '',
			]
		);

        $this->add_control(
			'pricebox_list_unit',
			[
				'label'     => 'واحد پولی',
				'type'	    => \Elementor\Controls_Manager::TEXT,
				'default'	=> '',
			]
		);

        $this->add_control(
			'pricebox_list_duration',
			[
				'label'     => 'مدت پلن',
				'type'	    => \Elementor\Controls_Manager::TEXT,
				'default'	=> '',
			]
		);

        $this->add_control(
			'pricebox_list_details',
            [
				'label' => 'جزییات پلن',
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '',
			]
		);

        $this->add_control(
			'pricebox_list_btn_title',
			[
				'label'     => 'عنوان دکمه',
				'type'	    => \Elementor\Controls_Manager::TEXT,
				'default'	=> '',
			]
		);

        $this->add_control(
			'pricebox_list_btn_link',
			[
				'label'     => 'نشانی دکمه',
				'type'	    => \Elementor\Controls_Manager::TEXT,
				'default'	=> '',
			]
		);

        $this->add_control(
			'pricebox_list_featured',
			[
				'label' => 'تعرفه ویژه',
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => 'برجسته',
				'label_off' => 'معمولی',
				'return_value' => 'no',
				'default' => 'no',
			]
		);

		$this->add_control(
			'pricebox_color',
			[
				'label' => 'رنگ تعرفه برجسته',
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .price-item.featured-item .price-header' => 'color: {{VALUE}}',
					'{{WRAPPER}} .price-item.featured-item h2' => 'color: {{VALUE}}',
				],
			]
		);

		
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
        $featuredItem = "";
        if ( 'no' === $settings['pricebox_list_featured'] ) {
            $featuredItem = "featured-item";
        } else {
            $featuredItem = "";
        }
		?>
		<div class="price-item <?php echo $featuredItem; ?>">
			<?php $priceboxColor = $settings['pricebox_color']; ?>
            <div class="price-header">
                <div class="price-title">
                    <h2><?php echo $settings['pricebox_list_title']; ?></h2>
                </div>
                <div class="price-prices">
                    <h2><?php echo $settings['pricebox_list_price']; ?><small><?php echo $settings['pricebox_list_unit']; ?></small><span>/ <?php echo $settings['pricebox_list_duration']; ?></span></h2>
                </div>
            </div>
            <div class="price-body">
                <div class="price-description">
                    <ul class="text-center p-1">
                        <?php echo $settings['pricebox_list_details']; ?>
                    </ul>
                </div>
            </div>
            <div class="price-footer">
                <div class="price-action">
                    <a class="btn" <?php if ( 'no' === $settings['pricebox_list_featured'] ) {echo 'style="border-color:' . $settings['pricebox_color'] . ';color:' . $settings['pricebox_color'] . ';"';} ?> href="<?php echo $settings['pricebox_list_btn_link']; ?>"><?php echo $settings['pricebox_list_btn_title']; ?></a>
                </div>
            </div>
        </div>
		<?php
	}

}