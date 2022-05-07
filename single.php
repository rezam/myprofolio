<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
				<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', get_post_type() );

						the_post_navigation(
							array(
								'prev_text' => '<span class="nav-subtitle">' . 'قبلی:' . '</span> <span class="nav-title">%title</span>',
								'next_text' => '<span class="nav-subtitle">' . 'بعدی:' . '</span> <span class="nav-title">%title</span>',
							)
						);
				?>
				</div>
			</div>
			<div class="col-lg-3 col-md-12">
				<div class="sidebar">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<?php
				// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
				?>
			</div>
		</div>
	</div>
</div>

<?php

get_footer();
