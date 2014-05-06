<?php
/*
Template Name: Bookmarks
 */

get_header(); ?>
<?php get_sidebar('left'); ?>

		<div id="container">
			<div id="content" role="main">

 <?php 
		  wp_list_bookmarks($args); ?> 

			</div><!-- #content -->
		</div><!-- #container -->

<?php //get_sidebar('right'); ?>

<?php get_footer(); ?>
                            