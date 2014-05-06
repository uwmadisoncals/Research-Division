<?php 
	if ( function_exists ('register_sidebar')) { 
    	/*register_sidebar ('custom'); */
		register_sidebar(array(
 			'name' => __( 'Home Left Widget Area' ),
  			'id' => 'home-left',
 			'description' => __( 'Widgets in this area will be shown on the left side of the Home page.' ),
  			'before_title' => '<h1 class="widget-title">',
  			'after_title' => '</h1>'
		));
}
add_filter('widget_text', 'do_shortcode');

/**********
custom shortcodes
***********/

/*top link button - LK 1/15/2013*/
function toplink_shortcode(){
	return '<a class="top-link" href="#top">Back to Top</a>';
}
add_shortcode('top_link', 'toplink_shortcode');

/*custom h3 with top link button - LK 1/15/2013*/
function h3_toplink_shortcode($atts, $content=null){
	extract( shortcode_atts( array(
		'link_id' => 'link_id'
		), $atts ));
	//do_shortcode is a built-in WP function that allows users to place shortcodes within shortcodes
	//do_shortcode executes any shortcode within the content before executing the encolosing shortcode
	return '<h3 id="' . $link_id . '">' . do_shortcode($content) .'<a class="top-link" href="#top">Back to Top</a></h3>';
}
add_shortcode('h3_toplink', 'h3_toplink_shortcode');


/*internal nav menu - LK 1/17/2013*/
function page_nav_shortcode($atts, $content=null){
	return '<div class="internal-nav">' . $content . '</div>';
}
add_shortcode('page_nav', 'page_nav_shortcode');


/*one column beige box - LK 1/17/2013*/
function onecol_box_shortcode($atts, $content=null){
		extract( shortcode_atts( array(
		'link_id' => 'link_id'
		), $atts ));
	//do_shortcode is a built-in WP function that allows users to place shortcodes within shortcodes
	//do_shortcode executes any shortcode within the content before executing the encolosing shortcode
	return '<div class="main-content-highlight" id="' . $link_id . '">' . do_shortcode($content) . '</div>';
}
add_shortcode('onecol_box', 'onecol_box_shortcode');

/*two column beige box - LK 1/17/2013*/
function twocol_box_shortcode($atts, $content=null){
		extract( shortcode_atts( array(
		'link_id' => 'link_id'
		), $atts ));
		//do_shortcode is a built-in WP function that allows users to place shortcodes within shortcodes
		//do_shortcode executes any shortcode within the content before executing the encolosing shortcode
	return '<div class="main-content-split" id="' . $link_id . '">' . do_shortcode($content) . '</div>';
}
add_shortcode('twocol_box', 'twocol_box_shortcode');


/*3 column list of link categories. each category linked via anchor tag. used on forms and docs page. - LK 3/6/2013*/
function list_link_cats_shortcode ($atts){
	
	extract( shortcode_atts( array(
		'link_cat' => 'link_cat'
		), $atts ));
	
	if ($link_cat != 'link_cat'){
		$cats = get_terms( 'link_category', array('orderby' => 'name', 'order' => 'ASC', 'hierarchical' => 0, 'include' => $link_cat ) );
		
		$output = '<div class="internal-nav"><ul>';
		foreach ( $cats as $cat ) { 
			$output .= '<li><a href="#' . $cat->term_id . '">' . $cat->name . '</a></li>';
		}
	$output .= '</ul></div>';
	return $output;

	} else {
		$cats = get_terms( 'link_category', array('orderby' => 'name', 'order' => 'ASC', 'hierarchical' => 0, 'include' => '' ) );
		$output = '<ul class="three-col">';
		foreach ( $cats as $cat ) { 
			$output .= '<li><a href="#' . $cat->term_id . '">' . $cat->name . '</a></li>';
		}
	$output .= '</ul>';
	return $output;
	
	}
}
	
add_shortcode('list_link_cats', 'list_link_cats_shortcode');



/*table showing all links manager links, sorted by category. used on forms and docs page. - LK 3/6/2013*/

function list_links_shortcode ($atts){
	
	extract( shortcode_atts( array(
		'link_cat' => 'link_cat'
		), $atts ));
		
	$output = '<table class="links_table">';

	if ($link_cat != 'link_cat'){
		$cats = get_terms( 'link_category', array('orderby' => 'name', 'order' => 'ASC', 'hierarchical' => 0, 'include' => $link_cat ) );

	} else {
		$cats = get_terms( 'link_category', array('orderby' => 'name', 'order' => 'ASC', 'hierarchical' => 0, 'include' => '' ) );
	}

		foreach ( $cats as $cat ) { 
			$output .= '<tr><th colspan="2" id="' . $cat->term_id . '">' . $cat->name . '</th><th><a class="top-link-redbg" href="#top">Back to Top</a></th></tr><tr class="gray-row"><td></td><td></td><td></td></tr>';
			$currentcatid = $cat->term_id;
			$params = array('category' => $currentcatid);
			$bookmarks = get_bookmarks($params);
			$bookmarkslist = print_bookmarks ($bookmarks);
			$output .= $bookmarkslist;

		}
	$output .= '</table>';
	
	return $output;
}

function print_bookmarks ($bookmarks) {
	 	foreach ( $bookmarks as $bm ) { 
    		$bookmarkline .= '<tr><td><a href="' . $bm->link_url . '" target="_blank">' . $bm->link_name . '</a></td><td colspan="2"><p>' . $bm->link_description . '</p></td></tr>';
		}
		
		return $bookmarkline;
 }


add_shortcode('list_links', 'list_links_shortcode');


/************
end custom shortcodes
*************/

?>
