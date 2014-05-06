<?php
/**
 * The Sidebar containing widgets to be displayed on the left side of the Home page.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>

	
<?php
	// A second sidebar for widgets, just because.
	if ( is_active_sidebar( 'home-left' ) ) : ?>

		<div id="secondary" class="widget-area" role="complementary">
			<ul class="xoxo">
				<?php dynamic_sidebar( 'home-left' ); ?>
			</ul>
		</div>

<?php endif; ?>
