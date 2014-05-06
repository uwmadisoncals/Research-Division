<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

<?php get_sidebar ('home-left'); ?>

		<div id="container-home">
			<h1 id="main-title">Research Division News &amp; Announcements</h1>
			<div id="content" role="main">
				
			
			<?php
			/* Run the loop to output the posts.nt to overload this in a child theme then include a file
			 * called loop-
			 * If you waindex.php and that will be used instead.
			 */
			 get_template_part( 'loop', 'index' );
			?>
			</div><!-- #content -->
		</div><!-- #container -->
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>
