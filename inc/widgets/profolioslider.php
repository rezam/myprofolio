<?php

namespace PROFOLIO\Widgets;

use Elementor\Widget_Base;

if ( !defined( 'ABSPATH' ) ) exit;

class profolioslider extends Widget_Base {

	public function get_name() {
		return 'profolioslider';
	}

	public function get_title() {
		return 'اسلایدر';
	}

	public function get_icon() {
		return 'eicon-slider-push';
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
			'list_image',
			[
				'label' => 'انتخاب تصویر',
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'list_title', [
				'label' => 'عنوان',
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => 'عنوان اسلایدر',
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_content', [
				'label' => 'توضیحات اسلایدر',
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => 'توضیحات اسلایدر',
				'show_label' => false,
			]
		);

        $repeater->add_control(
			'show_btn',
			[
				'label' => 'نمایش دکمه',
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => 'بله',
				'label_off' => 'خیر',
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$repeater->add_control(
			'list_btn_direction',
			[
				'label'		=> 'جهت قرارگیری دکمه',
				'type'		=> \Elementor\Controls_Manager::SELECT,
				'default'	=> 'center',
				'options'	=> [
					'center'	=> 'وسط',
					'right'		=> 'راست',
					'left'		=> 'چپ',
				],
			]
		);

        $repeater->add_control(
			'list_btn_text', [
				'label' => 'متن دکمه',
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'درباره ما',
				'show_label' => false,
			]
		);

        $repeater->add_control(
			'list_btn_url', [
				'label' => 'نشانی دکمه',
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '#',
				'show_label' => false,
			]
		);

		$this->add_control(
			'list',
			[
				'label'		=> 'لیست اسلایدر',
				'type'		=> \Elementor\Controls_Manager::REPEATER,
				'fields'	=> $repeater->get_controls(),
				'default' 	=> [
					[
                        'list_image'		=> '',
						'list_title'		=> 'عنوان اسلایدر',
						'list_content'		=> 'توضیحات اسلایدر',
                        'show_btn'			=> 'yes',
                        'list_btn_text'		=> 'درباره ما',
                        'list_btn_url'		=> '#',
						'list_btn_direction'=> 'center',
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_style',
			[
				'label' => 'استایل',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => 'تایپوگرافی عنوان',
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .carousel-caption .title',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'label' => 'تایپوگرافی توضیحات',
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .carousel-caption .description',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'label' => 'تایپوگرافی دکمه',
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .carousel-caption a.btn',
			]
		);

		$this->add_control(
			'btn_text_color',
			[
				'label' => 'رنگ متن دکمه',
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#515151',
				'selectors' => [
					'{{WRAPPER}} .carousel-caption a.btn' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'btn_text_hovercolor',
			[
				'label' => 'رنگ هاور متن دکمه',
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#515151',
				'selectors' => [
					'{{WRAPPER}} .carousel-caption a.btn:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'btn_border_color',
			[
				'label' => 'رنگ حاشیه دکمه',
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .carousel-caption a.btn' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'btn_border_hovercolor',
			[
				'label' => 'رنگ هاور حاشیه دکمه',
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .carousel-caption a.btn:hover' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'btn_back_color',
			[
				'label' => 'رنگ پس‌زمینه دکمه',
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .carousel-caption a.btn' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'btn_back_hovercolor',
			[
				'label' => 'رنگ پس‌زمینه هاور دکمه',
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .carousel-caption a.btn:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<!-- Carousel Start -->
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <?php
            if ( $settings['list'] ) {
                $i = 0;
                echo '<div class="carousel-inner">';
                foreach (  $settings[ 'list' ] as $item ) {?>
                <div class="carousel-item <?php if($i === 0){echo 'active';} ?>">
                    <img src="<?php echo $item['list_image']['url']; ?>" alt="Carousel Image">
					<div class="carousel-caption">
						<div class="title"><?php echo $item['list_title'] ?></div><br />
						<div class="description"><?php echo $item['list_content'] ?></div><br />
						<?php if ( 'yes' === $item['show_btn'] ) : ?>
						<div class="btn-container" style="text-align:<?php echo $item[ 'list_btn_direction' ]; ?>">
							<a class="btn" href="<?php echo $item['list_btn_url'] ?>" style="color:<?php $settings['btn_text_color']; ?>;background-color:<?php $settings['btn_back_color']; ?>;border-color:<?php $settings['btn_border_color']; ?>"><?php echo $item['list_btn_text']; ?></a>
						</div>
						<?php endif; ?>
					</div>
                </div> <?php $i = 1;
                } ?>
            <?php
            }
            ?>

			<?php if( sizeof( $settings['list'] ) > 1 ): ?>
				<a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">قبلی</span>
				</a>
				<a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">بعدی</span>
				</a>
			<?php endif; ?>
        </div>
        <!-- Carousel End -->
		<?php
	}

}