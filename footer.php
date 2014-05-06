<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
	</div><!-- #main -->

<?php
	/* A sidebar in the footer? Yep. You can can customize
	 * your footer with four columns of widgets.
	 */
	get_sidebar( 'footer' );
?>
	
    <div id="footer" role="contentinfo">
		<div id="colophon">
                <div class="utility" role="navigation">
                    <?php wp_nav_menu( array( 'container_class' => 'menu-utility', 'theme_location' => 'utility' ) ); ?>
                </div>

                <div id="copywrong">
                	<p>&copy; Copyright <?php echo date('Y', time());?>.&nbsp;All rights reserved.<br />
                    <a href="http://www.cals.wisc.edu">College of Agricultural and Life Sciences</a> - <a href="http://www.wisc.edu" target="_blank">University of Wisconsin-Madison</a><br />
                    Website feedback, questions or accessibiity issues: <a href="mailto:ekrznarich@cals.wisc.edu">Contact the Webmaster</a></p>
                </div> <!-- #copywrong -->

		</div><!-- #colophon -->
	</div><!-- #footer -->

</div><!-- #wrapper -->
</div><!-- #pre-wrapper -->
<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
