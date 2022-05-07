<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package profolio
 */

get_header();
?>
	<div class="post-entry">
	<div class="container-full p-3">
		<div class="row">
			<div class="col-lg-9 col-md-12">
				<div class="main-post">
					<?php if ( have_posts() ) : ?>
						<header class="page-header">
							<?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="archive-description">', '</div>' );
							?>
						</header><!-- .page-header -->
						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();
							get_template_part( 'template-parts/content', get_post_type() );
						endwhile;
						the_posts_navigation();
						else :
							get_template_part( 'template-parts/content', 'none' );
						endif;
					?>
				</div>
			</div>
			<div class="col-lg-3 col-md-12">
				<div class="sidebar">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</div>
</div>




<?php
get_footer();
