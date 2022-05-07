<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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
					<section class="error-404 not-found">
						<header class="page-header">
							<h1 class="page-title"><?php echo 'چنین صفحه‌ای وجود ندارد.'; ?></h1>
						</header><!-- .page-header -->

						<div class="page-content">
							<p><?php echo 'اینطور به نظر میرسد که به صفحه ناموجود رسیده‌اید. لطفا به صفحه خانه بروید.'; ?></p>
						</div><!-- .page-content -->
					</section><!-- .error-404 -->
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
