<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package profolio
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container-full">
		<div class="row">
			<div class="col-12">
				<header class="entry-header">
					<?php
					if ( is_singular() ) :
						the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;

					if ( 'post' === get_post_type() ) :
						?>
						<div class="entry-meta">
							<?php
								profolio_posted_on();
								profolio_posted_by();
							?>
						</div><!-- .entry-meta -->
					<?php endif; ?>
				</header><!-- .entry-header -->
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<?php profolio_post_thumbnail(); ?>

				<div class="entry-content">
					<?php
					the_content(
						sprintf(
							wp_kses(
								'ادامه مطلب<span class="screen-reader-text"> "%s"</span>',
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post( get_the_title() )
						)
					);

					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . 'صفحات:',
							'after'  => '</div>',
						)
					);
					?>
				</div><!-- .entry-content -->
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<footer class="entry-footer">
					<?php profolio_entry_footer(); ?>
				</footer><!-- .entry-footer -->
			</div>
		</div>
	</div>
</article>
