<?php
/**
 * Template Name: صفحه اصلی - دموی اول
	Template Post Type: post, page, product
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
    <!-- Content Start -->
    <?php the_content(); ?>
    <!-- Content End -->
<?php
get_footer();
