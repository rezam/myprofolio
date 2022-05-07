<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package profolio
 */

get_header();
?>

<div class="post-entry main-page">
	<div class="container-full p-3">
		<div class="row">
			<?php
				if ( have_posts() ) :
					if ( is_home() && ! is_front_page() ) :
						?>
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>
						<?php
					endif;
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/ ?>
							<div class="box col-4 col-md-4 col-sm-12">
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<header class="entry-header">
										<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

										<?php if ( 'post' === get_post_type() ) : ?>
										<div class="entry-meta">
											<?php
											profolio_posted_on();
											profolio_posted_by();
											?>
										</div><!-- .entry-meta -->
										<?php endif; ?>
									</header><!-- .entry-header -->

									<?php profolio_post_thumbnail(); ?>

									<div class="entry-summary">
										<?php the_excerpt(); ?>
									</div><!-- .entry-summary -->

									<footer class="entry-footer">
										<?php profolio_entry_footer(); ?>
									</footer><!-- .entry-footer -->
								</article><!-- #post-<?php the_ID(); ?> -->
							</div>
						<?php
					endwhile;
					the_posts_navigation();
				else:
					get_template_part( 'template-parts/content', 'none' );
				endif;
			?>
		</div>
	</div>
</div>
<?php
get_footer();
