<?php
/*
Plugin Name: List Category Posts - Template
Plugin URI: http://picandocodigo.net/programacion/wordpress/list-category-posts-wordpress-plugin-english/
Description: Template file for List Category Post Plugin for Wordpress which is used by plugin by argument template=value.php
Version: 0.9
Author: Radek Uldrych & Fernando Briano 
Author URI: http://picandocodigo.net http://radoviny.net
*/

/* Copyright 2009  Radek Uldrych  (email : verex@centrum.cz), Fernando Briano (http://picandocodigo.net)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or 
any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/**
 * The format for templates changed since version 0.17.
 * Since this code is included inside CatListDisplayer, $this refers to
 * the instance of CatListDisplayer that called this file.
 */

/* This is the string which will gather all the information.*/
$lcp_display_output = '';

// Show category link:
$lcp_display_output .= $this->get_category_link('strong');

//Add an opening table tag here:
$lcp_display_output .= '<table class="lcp_table">';

//Add a header row:
$lcp_display_output .= "<tr><th>Topic</th><th>Guidance</th></tr>";

/**
 * Posts loop.
 * The code here will be executed for every post in the category.
 * As you can see, the different options are being called from functions on the
 * $this variable which is a CatListDisplayer.
 *
 * The CatListDisplayer has a function for each field we want to show.
 * So you'll see get_excerpt, get_thumbnail, etc.
 * You can now pass an html tag as a parameter. This tag will sorround the info
 * you want to display. You can also assign a specific CSS class to each field.
 */
foreach ($this->catlist->get_categories_posts() as $single):
    //Start a Table Row for each item:
    $lcp_display_output .= "<tr>";
	
	//Start a table cell for each title:
    $lcp_display_output .= "<td>";

    //Show the title and link to the post:
    $lcp_display_output .= $this->get_post_title($single);
	
	//Close table cell for each title
    $lcp_display_output .= "</td>";
	
	//Start a table cell for content
    $lcp_display_output .= "<td>";
    /**
     * Post content - Example of how to use tag and class parameters:
     * This will produce:<p class="lcp_content">The content</p>
     */
    $lcp_display_output .= $this->get_content($single);

    /**
     * Post content - Example of how to use tag and class parameters:
     * This will produce:<div class="lcp_excerpt">The content</div>
     */
    $lcp_display_output .= $this->get_excerpt($single, 'div', 'lcp_excerpt');
	
	//Close table cell for content
    $lcp_display_output .= "</td>";

    //Close li tag
    $lcp_display_output .= '</tr>';
endforeach;

$lcp_display_output .= '</table>';
$this->lcp_output = $lcp_display_output;