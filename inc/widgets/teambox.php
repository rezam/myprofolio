<?php

namespace PROFOLIO\Widgets;

use Elementor\Widget_Base;

if ( !defined( 'ABSPATH' ) ) exit;

class teambox extends Widget_Base {

	public function get_name() {
		return 'profolioteambox';
	}

	public function get_title() {
		return 'تیم';
	}

	public function get_icon() {
		return 'eicon-person';
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
            'teambox_image',
            [
                'label'		=> 'انتخاب تصویر',
                'type'		=> \Elementor\Controls_Manager::MEDIA,
                'default'	=> [
                    'url'	=> \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

		$this->add_control(
			'teambox_name',
			[
				'label'     => 'نام و نام خانوادگی',
				'type'	    => \Elementor\Controls_Manager::TEXT,
				'default'	=> '',
			]
		);

        $this->add_control(
			'teambox_position',
			[
				'label'     => 'حرفه',
				'type'	    => \Elementor\Controls_Manager::TEXT,
				'default'	=> '',
			]
		);

        $this->add_control(
			'teambox_description', [
				'label'			=> 'توضیحات',
				'type'			=> \Elementor\Controls_Manager::WYSIWYG,
				'show_label'	=> false,
			]
		);

		$repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'icon',
			[
				'label' => 'آیکن',
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-instagram',
					'library' => 'solid',
				],
			]
		);

        $repeater->add_control(
			'icon_link', [
				'label' 		=> 'لینک شبکه اجتماعی',
				'type'			=> \Elementor\Controls_Manager::TEXT,
				'default'		=> '#',
				'label_block'	=> true,
			]
		);

        $this->add_control(
			'list',
			[
				'label'		=> 'لیست آیکن‌ها',
				'type'		=> \Elementor\Controls_Manager::REPEATER,
				'fields'	=> $repeater->get_controls(),
				'default'	=> [
					[
                        'icon'		=> 'fab fa-instagram',
						'icon_link' => '#',
					],
				],
				'title_field'	=> '{{{ icon_link }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_style',
			[
				'label' => 'استایل',
				'tab'	=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'teambox_color',
			[
				'label'		=> 'رنگ کلی',
				'type'		=> \Elementor\Controls_Manager::COLOR,
				'scheme'	=> [
					'type'	=> \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .team-item:hover'			=> 'background: {{VALUE}}',
					'{{WRAPPER}} .team-social .btn'			=> 'background: {{VALUE}}',
					'{{WRAPPER}} .team-social .btn:hover'	=> 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'		=> 'teambox_name_typography',
				'label'		=> 'تایپوگرافی نام',
				'scheme'	=> \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector'	=> '{{WRAPPER}} .team-text h2',
			]
		);

		$this->add_control(
			'teambox_name_color',
			[
				'label'		=> 'رنگ نام',
				'type'		=> \Elementor\Controls_Manager::COLOR,
				'scheme'	=> [
					'type'	=> \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .team-text h2' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'		=> 'teambox_job_typography',
				'label'		=> 'تایپوگرافی شغل',
				'scheme'	=> \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector'	=> '{{WRAPPER}} .team-text h4',
			]
		);

		$this->add_control(
			'teambox_job_color',
			[
				'label'		=> 'رنگ شغل',
				'type'		=> \Elementor\Controls_Manager::COLOR,
				'scheme'	=> [
					'type'	=> \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .team-text h4' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'		=> 'teambox_desc_typography',
				'label'		=> 'تایپوگرافی توضیحات',
				'scheme'	=> \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector'	=> '{{WRAPPER}} .team-text p',
			]
		);

		$this->add_control(
			'teambox_desc_color',
			[
				'label'		=> 'رنگ توضیحات',
				'type'		=> \Elementor\Controls_Manager::COLOR,
				'scheme'	=> [
					'type'	=> \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .team-text p' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
        <div>
            <div class="team-item">
                <div class="team-img">
                    <img src="<?php echo $settings['teambox_image']['url']; ?>" alt="Image">
                </div>
                <div class="team-text">
                    <h2 style="color:<?php echo $settings['teambox_name_color']; ?>"><?php echo $settings['teambox_name']; ?></h2>
                    <h4 style="color:<?php echo $settings['teambox_job_color']; ?>"><?php echo $settings['teambox_position']; ?></h4>
                    <span style="color:<?php echo $settings['teambox_desc_color']; ?>"><?php echo $settings['teambox_description']; ?></span>
                    <div class="team-social"><?php
                        if ( $settings['list'] ) {
                            foreach ( $settings['list'] as $item ) { ?>
                                <a class="btn social-tw" href="<?php echo $item['icon_link']; ?>"><?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?></a>
                            <?php }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php
	}

}