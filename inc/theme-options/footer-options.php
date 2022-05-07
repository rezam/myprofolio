<?php

	/* ========================================================= */
	/*                  START FOOTER THEME OPTIONS               */
	/* ========================================================= */
	
	$wp_customize->add_section( 'profolio_footer_theme_section', [
		'title'     => 'تنظیمات فوتر',
		'panel'     => 'profolio_theme_options_panel',
		'priority' 	=> 10,
	] );
	
	$wp_customize->add_section('bulduzer_footer_theme_section', [
		'title' 	  => 'تنظیمات فوتر',
		'panel' 	  => 'bulduzer_theme_options_panel',
		'priority' 	=> 10,
	] );
	
	/* =============== START FOOTER COL SETTING ============== */
	
	$wp_customize->add_setting( 'profolio_footer_col', [
		'default'   => 'fourcol',
		'transport' => 'refresh',
	] );
	
	$wp_customize->add_control( 'profolio_footer_col', [
    'type'        => 'select',
    'section'     => 'profolio_footer_theme_section',
    'label'       => 'تعداد ستون',
    'description' => 'لطفا تعداد ستون فوتر را انتخاب کنید',
    'choices'     => [
      'onecol'    => 'یک ستون',
      'twocol'    => 'دو ستون',
      'threecol'  => 'سه ستون',
      'fourcol'   => 'چهار ستون',
    ],
  ] );

  /* ================ END FOOTER COL SETTING =============== */


  /* ============== START FOOTER COLOR SETTING ============= */
	
	$wp_customize->add_setting( 'profolio_footer_back_color', [
		'default'   => '#EF233C',
		'transport' => 'refresh',
	] );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
		'profolio_footer_back_color', 
		[
			'label'      => 'رنگ پس زمینه فوتر',
			'section'    => 'profolio_footer_theme_section',
			'settings'   => 'profolio_footer_back_color',
		] ) 
	);

  /* =============== END FOOTER COLOR SETTING ============== */

  /* ============ START SOCIAL LINKS GRAYSCALE ============= */

  $wp_customize->add_setting( 'profolio_footer_socail_grayscale', array(
    'capability'  => 'edit_theme_options',
    'default'     => 'checked',
  ) );
  
  $wp_customize->add_control( 'profolio_footer_socail_grayscale', array(
    'type'        => 'checkbox',
    'section'     => 'profolio_footer_theme_section',
    'label'       => 'همگام‌سازی آیکن شبکه‌های اجتماعی',
    'description' => 'خاکستری کردن آیکن شبکه‌های اجتماعی',
  ) );

  /* ============= START SOCIAL LINKS GRAYSCALE ============== */

	/* =============== START COPYRIGHT SETTINGS ================ */

	$wp_customize->add_setting( 'profolio_footer_copyright_text', [
		'default'   => 'کلیه حقوق برای قالب پروفولیو محفوظ است.',
		'transport' => 'refresh',
	] );
	
	$wp_customize->add_control( 'profolio_footer_copyright_text', [
    'label'     => 'متن کپی رایت فوتر:',
    'section'   => 'profolio_footer_theme_section',
    'settings'	=> 'profolio_footer_copyright_text',
  ] );

	/* ================= END COPYRIGHT SETTINGS ================ */
  

  /* ============= START COPYRIGHT COLOR SETTING ============= */

	$wp_customize->add_setting( 'profolio_footer_copyright_color', [
		'default'   => '#ffffff',
		'transport' => 'refresh',
	] );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
		'profolio_footer_copyright_color', [
			'label'      => 'رنگ هاور آیتم‌های منو',
			'section'    => 'profolio_footer_theme_section',
			'settings'   => 'profolio_footer_copyright_color',
		]
	) );
	
  /* ============= END COPYRIGHT COLOR SETTING =============== */
	
	
	/* ========================================================= */
	/*                  END FOOTER THEME OPTIONS                 */
	/* ========================================================= */