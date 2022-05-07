<?php

	/* ========================================================= */
	/*                  START NAVBAR THEME OPTIONS               */
	/* ========================================================= */
	
	$wp_customize->add_section( 'profolio_navbar_theme_section', [
		'title' 	=> 'تنظیمات منو',
		'panel' 	=> 'profolio_theme_options_panel',
		'priority' 	=> 10,
	] );
	
	/* =============== START NAVBAR COLOR SETTING ============== */
	
	$wp_customize->add_setting( 'profolio_navbar_color', [
		'default'   => '#ef233c',
		'transport' => 'refresh',
	] );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
		'profolio_navbar_color', 
		[
			'label'      => 'رنگ پس زمینه منو',
			'section'    => 'profolio_navbar_theme_section',
			'settings'   => 'profolio_navbar_color',
		]
	) );
	
	/* =============== END NAVBAR COLOR SETTING ================ */


	/* ========== START NAVBAR OPACITY COLOR SETTING =========== */

	$wp_customize->add_setting( 'profolio_navbar_color_opacity', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> false
	) );
	
	$wp_customize->add_control( 'profolio_navbar_color_opacity', array(
		'type'		=> 'checkbox',
		'section'	=> 'profolio_navbar_theme_section',
		'label'		=> 'شفافیت هدر',
	) );

	/* =========== END NAVBAR OPACITY COLOR SETTING ============ */


	/* ============ START NAVBAR TEXT COLOR SETTING ============ */
	
	$wp_customize->add_setting( 'profolio_navbar_text_color', [
		'default'   => '#fff',
		'transport' => 'refresh',
	] );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
		'profolio_navbar_text_color', 
		[
			'label'      => 'رنگ آیتم‌های منو',
			'section'    => 'profolio_navbar_theme_section',
			'settings'   => 'profolio_navbar_text_color',
		]
	) );
	
	/* ============= END NAVBAR TEXT COLOR SETTING ============== */

	/* =================== START HEADER POSITION ================ */

	$wp_customize->add_setting( 'profolio_position_navbar', array(
		'capability' => 'edit_theme_options',
		'default' => 'sticky',
	  ) );
	  
	$wp_customize->add_control( 'profolio_position_navbar', [
		'type'		=> 'select',
		'section'	=> 'profolio_navbar_theme_section',
		'label'		=> 'وضعیت هدر',
		'choices'	=> [
			'fixed'		=> 'چسبان',
			'absolute'	=> 'مطلق',
			'sticky'	=> 'ثابت',
		],
	] );

	/* ================== END HEADER POSITION ================== */


	/* ================= START NAVBAR MENU SIDE ================ */

	$wp_customize->add_setting( 'profolio_navbar_side', [
		'capability'	=> 'edit_theme_options',
		'default'		=> 'ml-auto',
	] );
	
	$wp_customize->add_control( 'profolio_navbar_side', [
	'type'		=> 'select',
	'section'	=> 'profolio_navbar_theme_section',
	'label'		=> 'جهت قرارگیری منو',
	'choices'	=> [
		'ml-auto'	=> 'راست',
		'mx-auto'	=> 'وسط',
		'mr-auto'	=> 'چپ',
	],
	] );

	/* ================== END NAVBAR MENU SIDE ================= */

	/* ============ START NAVBAR HOVER COLOR SETTING =========== */

	$wp_customize->add_setting( 'profolio_navbar_hover_color', [
		'default'   => '#000',
		'transport' => 'refresh',
	] );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
		'profolio_navbar_hover_color', [
			'label'      => 'رنگ هاور آیتم‌های منو',
			'section'    => 'profolio_navbar_theme_section',
			'settings'   => 'profolio_navbar_hover_color',
		]
	) );
	
	/* ============ END NAVBAR HOVER COLOR SETTING ============= */

	/* ==================== START LOGO IMAGE =================== */

	$wp_customize->add_setting( 'profolio_logo_image', [
        'transport'		=> 'refresh',
		'default'		=> '',
    ] );

    $wp_customize->add_control( new WP_Customize_Image_Control(	$wp_customize,
		'profolio_logo_image', [
			'label'             => 'تصویر لوگو',
			'descrption'		=> 'در صورتیکه تصویری انتخاب نشود، از عنوان تنظیم شده در تنظیمات وردپرس استفاده خواهد شد.',
			'section'           => 'profolio_navbar_theme_section',
			'settings'          => 'profolio_logo_image',
		]
	) );  

	/* ==================== START LOGO IMAGE =================== */

	/* ================= START LOGO SIZE CHOOSE ================ */

	$wp_customize->add_setting( 'profolio_logo_size',
	[
		'capability'	=> 'edit_theme_options',
		'default'		=> '40px',
	] );
	
	$wp_customize->add_control( 'profolio_logo_size', [
		'type'		=> 'select',
		'section'	=> 'profolio_navbar_theme_section',
		'label'		=> 'اندازه لوگو',
		'choices'	=> [
			'40px'	=> 'معمولی',
			'80px'	=> 'بزرگ',
			'120px'	=> 'خیلی بزرگ',
		],
	] );

	/* ================== END LOGO SIZE CHOOSE ================= */

	/* ============== START NAVBAR MENU FONT SIZE ============== */

	$wp_customize->add_setting( 'profolio_navbar_menu_fontsize', [
		'default'   => '15px',
		'transport' => 'refresh',
	] );
	
	$wp_customize->add_control( 'profolio_navbar_menu_fontsize', [
        'label'		=> 'اندازه فونت آیتم‌های نوار منو:',
        'section'	=> 'profolio_navbar_theme_section',
		'settings'	=> 'profolio_navbar_menu_fontsize',
    ] );

	/* =============== END NAVBAR MENU FONT SIZE =============== */
	
	/* ========================================================= */
	/*                  END NAVBAR THEME OPTIONS                 */
	/* ========================================================= */