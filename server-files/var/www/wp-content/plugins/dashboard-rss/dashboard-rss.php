<?php
/*
Plugin Name: wp.ffhh Dashboard RSS
Plugin URI: http://wp.ffhh
Description: Blogposts der Hauptseite von wp.ffhh direkt im WordPress-Dashboard.
Author: Jan Reimers
Version: 0.1.0
Author URI: http://jan.rs
License: GPLv2
*/

/*
Dieses Plugin basiert auf dem Code von http://samglover.net/build-your-own-wordpress-dashboard-widget-for-any-rss-feed/
*/

function dashboard_widget_function() {
     $rss = fetch_feed( "http://wp.ffhh/feed/" );

     if ( is_wp_error($rss) ) {
          if ( is_admin() || current_user_can('manage_options') ) {
               echo '<p>';
               printf(__('<strong>RSS Error</strong>: %s'), $rss->get_error_message());
               echo '</p>';
          }
     return;
}

if ( !$rss->get_item_quantity() ) {
     echo '<p>Es sind keine Beiträge vorhanden!</p>';
     $rss->__destruct();
     unset($rss);
     return;
}

echo "<ul>\n";

if ( !isset($items) )
     $items = 5;

     foreach ( $rss->get_items(0, $items) as $item ) {
          $publisher = '';
          $site_link = '';
          $link = '';
          $content = '';
          $date = '';
          $link = esc_url( strip_tags( $item->get_link() ) );
          $title = esc_html( $item->get_title() );
          $content = $item->get_content();
          $content = wp_html_excerpt($content, 250) . ' ...';

         echo "<li><a class='rsswidget' href='$link'>$title</a>\n<div class='rssSummary'>$content</div>\n";
}

echo "</ul>\n";
$rss->__destruct();
unset($rss);
}

function add_dashboard_widget() {
     wp_add_dashboard_widget('wpffhh_dashboard_widget', 'Updates von wp.ffhh', 'dashboard_widget_function');
}

add_action('wp_dashboard_setup', 'add_dashboard_widget');
?>
