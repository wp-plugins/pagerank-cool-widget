<?php
/*
Plugin Name: PageRank Cool Widget
Plugin URI: http://pagerank-en.500v.net/
Description: The widget beautifully shows the Google PageRank for your site.
Version: 1.0
*/


class PageRankCoolWidget extends WP_Widget { 
  function PageRankCoolWidget() { 
  parent::WP_Widget(false, $name = 'PageRank Cool Widget'); 
  } 

  function widget($args, $instance) { 
    echo '<div style="text-align:center;padding:10px 0 10px 0">'; 
    echo '<a href="http://pagerank-en.500v.net" target="_blank" title="PageRank Widget"><img src="http://pagerank-en.500v.net/informer.ashx?t=1&s='. $_SERVER['HTTP_HOST'] .'" border="0" width="60" height="140" /></a>';
    echo '</div>'; 
  } 

  function update($new_instance, $old_instance) { 
    return $new_instance; 
  } 

  function form($instance) { 
  }


} 
add_action('widgets_init', create_function('', 'return register_widget("PageRankCoolWidget");')); 

?>
