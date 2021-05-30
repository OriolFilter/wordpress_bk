<?php
/**
 * Plugin Name: Tea Bag plugin
 * Plugin URI: http://www.mywebsite.com/my-first-plugin
 * Description: My tea bag plugin
 * Version: 0.1
 * Author: Oriol Filter
 * Author URI: teabag.con
 */

add_action( 'the_content', 'my_thank_you_text' );

function my_thank_you_text ( $content ) {
    $x = get_posts();

    if (date('H') == 17) {
        return $content .= '<p>Since it\'s teatime in the UK, you might want to check this: <a>http://localhost:8000/wp-admin/options-permalink.php</a>';
    }
    $args = array(
        'numberposts'	=> 20,
        'category'		=> 4
    );
    $my_posts = get_posts( array( 'author' => 1 ) );
    $id='';
    while (!$id) {
        $n=random_int ( 0 , count($my_posts) );
        $id = $my_posts[$n]->ID;
    }
    return $content .="Since it's not tea hour, you might want to check this post! http://localhost:8000/?page_id=$id";

}

