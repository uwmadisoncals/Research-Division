<?php

 function print_bookmarks ($bookmarks) {
	 	foreach ( $bookmarks as $bm ) { 
    		print( '<tr><td><a href="' . $bm->link_url . '" target="_blank">' . $bm->link_name . '</a></td><td><p>' . $bm->link_description . '</p></td></tr>' );
		}
 }
 
 ?>