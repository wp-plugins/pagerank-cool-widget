<?php
/*
Plugin Name: PageRank Cool Widget
Plugin URI: http://pagerank-en.500v.net/
Description: The widget beautifully shows the Google PageRank for your site.
Version: 1.1
*/


class PageRankCoolWidget extends WP_Widget { 
  function PageRankCoolWidget() { 
  parent::WP_Widget(false, $name = 'PageRank Cool Widget'); 
  } 

  function widget($args, $instance) { 
    extract($args, EXTR_SKIP);
    $Variant = attribute_escape($instance['Variant']) ;
		if ($Variant == "" ) $Variant = "1"  ;
    $w=60;
    $h=140;
		if ($Variant == "2" ) {
      $w=80;
      $h=80;
		}
?>
    <div style="text-align:center;padding:10px 0 10px 0">
    <a href="http://pagerank-en.500v.net" target="_blank" title="PageRank Widget"><img src="http://pagerank-en.500v.net/informer.ashx?t=<?php echo $Variant ?>&s=<?php echo $_SERVER['HTTP_HOST'] ?>" border="0" width="<?php echo $w ?>" height="<?php echo $h ?>" /></a>
    </div>
<?php


  } 

  function update($new_instance, $old_instance) { 
  $instance = $old_instance;
		$instance['Variant'] =  strip_tags($new_instance['Variant']);
		
			return $instance;
} 

  function form($instance) { 
  
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
		$title = strip_tags($instance['title']);
		$Variant = format_to_edit($instance['Variant']);

		if ($Variant == "" ) $Variant = "1"  ;
			
		$Variants = array(
							1 => "Thermometer",
							2 => "Tachometer"
							);
			?>
	
		<p>Variant:<br/>
		<select class="widefat" name="<?php echo $this->get_field_name('Variant'); ?>" id="<?php echo $this->get_field_id('Variant'); ?>"><br />"; 
										<?php
										foreach($Variants as $Key => $Variantname)
										{
											echo '<option value="'.$Key.'"';
											if(attribute_escape($Variant) == $Key) {
												echo ' selected="selected"';
											}
											echo ">".$Variantname."</option>";
										}
										?>
										</select>								
  </p>

										
<br/><br/><p style="color:gray;font-size:8pt">Do you know how to <a style="color:gray" href="http://make-money.600v.net" target="_blank">make money from your website</a>?</p>										
  <?php
  }


} 
add_action('widgets_init', create_function('', 'return register_widget("PageRankCoolWidget");')); 

?>
