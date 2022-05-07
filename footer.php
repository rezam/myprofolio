<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package profolio
 */

?>

        <!-- Footer Start -->
        <div class="footer" style="background:<?php if (get_theme_mod( 'profolio_footer_back_color' )) : echo get_theme_mod( 'profolio_footer_back_color'); else: echo '#EF233C'; endif; ?> !important;">
            <div class="container">
                <div class="row">
                    <?php $footercol = get_theme_mod( 'profolio_footer_col' ); ?> 
                    <div class="<?php if ( $footercol === 'onecol' ) { echo 'col-lg-12'; } elseif( $footercol === 'twocol' ) { echo 'col-lg-6 col-12'; } elseif( $footercol === 'threecol' ) { echo 'col-md-6 col-lg-4'; } else { echo 'col-md-6 col-lg-3'; } ?>">
                        <div class="footer-link">
                            <?php if(is_active_sidebar('footer-1')) dynamic_sidebar('footer-1'); ?>
                        </div>
                    </div>
                    <?php if ( ( get_theme_mod( 'profolio_footer_col' ) === 'fourcol' ) || ( get_theme_mod( 'profolio_footer_col' ) === 'threecol' ) || ( get_theme_mod( 'profolio_footer_col' ) === 'twocol' ) ) : ?>
                    <div class="<?php if( $footercol === 'twocol' ) { echo 'col-lg-6 col-12'; } elseif( $footercol === 'threecol' ) { echo 'col-md-6 col-lg-4'; } else { echo 'col-md-6 col-lg-3'; } ?>">
                        <div class="footer-link">
                            <?php if(is_active_sidebar('footer-2')) dynamic_sidebar('footer-2'); ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if ( ( get_theme_mod( 'profolio_footer_col' ) === 'fourcol' ) || ( get_theme_mod( 'profolio_footer_col' ) === 'threecol' ) ) : ?>
                    <div class="<?php if( $footercol === 'threecol' ) { echo 'col-md-6 col-lg-4'; } else { echo 'col-md-6 col-lg-3'; } ?>">
                        <div class="footer-link">
                            <?php if(is_active_sidebar('footer-3')) dynamic_sidebar('footer-3'); ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if ( ( get_theme_mod( 'profolio_footer_col' ) === 'fourcol' ) ) : ?>
                    <div class="col-md-6 col-lg-3">
                        <div class="footer-link">
                            <?php if(is_active_sidebar('footer-4')) dynamic_sidebar('footer-4'); ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="copyright" style="color:<?php if ( get_theme_mod( 'profolio_footer_copyright_color' ) ) : echo get_theme_mod( 'profolio_footer_copyright_color' ); else: echo '#FFFFFF'; endif; ?>">
                            <?php if ( get_theme_mod( 'profolio_footer_copyright_text' ) ) : echo get_theme_mod( 'profolio_footer_copyright_text' ); else: echo 'کلیه حقوق برای قالب پروفولیو محفوظ است.'; endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        
        <!-- Back to top button -->
        <a href="#" class="btn back-to-top"><i class="fa fa-chevron-up"></i></a>

    </body>
</html>

<?php wp_footer(); ?>

</body>
</html>
