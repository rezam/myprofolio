<?php

namespace PROFOLIO\Widgets;

use Elementor\Widget_Base;

if ( !defined( 'ABSPATH' ) ) exit;

class postbox extends Widget_Base {

	public function get_name() {
		return 'postbox';
	}

	public function get_title() {
		return 'شبکه پست';
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'profolioelementor' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => 'تنظیمات',
			]
		);

		$categories = get_categories();
		$cats       = array();
		foreach ( $categories as $category ) {
			$cats[ $category->term_id ] = $category->name;
		}
		$default = key($cats);

		$this->add_control(
			'catsid',
			[
				'label'    => 'دسته‌بندی‌ها',
				'type'     => \Elementor\Controls_Manager::SELECT2,
				'options'  => $cats,
				'label_block' => true,
				'multiple' => true,
				'default' => $default
			]
		);

		$this->add_control(
			'author',
			[
				'label'   => 'نویسنده',
				'type'    => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);

		$this->add_control(
			'time',
			[
				'label'   => 'زمان',
				'type'    => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);

		$this->add_control(
			'post_order',
			[
				'label' => 'مرتب‌سازی',
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'default' => 'DESC',
				'options' => [
					'ASC' => [
						'title' => 'صعودی',
						'icon' => 'fa fa-arrow-up'
					],
					'DESC' => [
						'title' => 'نزولی',
						'icon' => 'fa fa-arrow-down'
					],
				],
				'toggle' => true
			]
		);

        $this->add_control(
			'postbox_width',
			[
				'label'   => 'عریض',
				'type'    => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$catidd   = $settings['catsid'];
		$post_order = $settings['post_order'];
		$postbox = new \WP_Query ( array(
			'posts_per_page' => 5,
			'cat'            => $catidd,
            'order'         =>  $post_order
		) ); ?>
        
        <div class="row">
		<?php if ( $postbox->have_posts() ) : ?>
        <?php while( $postbox->have_posts() ): $postbox->the_post(); ?>
			<?php if ( 'yes' === $settings['postbox_width'] ): ?>
				<div class="col-lg-12">
			<?php else: ?>
				<div class="col-lg-6">
			<?php endif; ?>
                <div class="blog-item">
                    <div class="blog-img">
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <div class="blog-text">
                        <a href="<?php esc_url( the_permalink() ); ?>"><h2><?php echo get_the_title(); ?></h2></a>
                        <div class="blog-meta">
                            <?php if( $settings['author'] ) : ?>
                                <p><i class="far fa-user"></i><?php the_author(); ?></p>
                            <?php endif; ?>
                                <p><i class="far fa-list-alt"></i>
                                <?php
                                    $id = get_the_ID();
                                    $cats = get_the_category($id);
                                    echo '<a href="' . get_category_link($cats[0]->cat_ID) . '">';
                                        echo $cats[0]->name;
                                    echo '</a>';
                                ?>
                                </p>
                            <?php if($settings['time']): ?>
                                <p><i class="far fa-calendar-alt"></i><?php echo get_the_date('d F Y'); ?></p>
                            <?php endif; ?>
                        </div>
                        <?php the_excerpt(); ?>
                        <div class="text-right">
                            <a class="btn" href="<?php esc_url( the_permalink() ); ?>">ادامه مطلب <i class="fa fa-angle-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <div class="mw_element_error">
                <?php echo __('Nothing found. Edit the page with Mentor and select a category for this section.','ahura');?>
            </div>
		<?php endif; ?>
        
        </div>
    <?php
	}

}
