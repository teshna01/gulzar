<?php
class new_posts extends WP_Widget {

	 function __construct() {
		$widget_ops = array('classname' => 'sidebar-widget', 'description' =>  "تور بېتىڭىزدىكى يېڭى يازمىلارنى كۆرسىتىدۇ." );
		parent::__construct('new_posts', '«مەنزىل» | ئەڭ يېڭى يازمىلار', $widget_ops);
	}

 	 
		 function form($instance) {
			$title = esc_attr($instance['title']);
        $Num = esc_attr($instance['Num']);
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>">تېمىسى：<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('Num'); ?>">يازما سانى：(سۈكۈت قىممەت:10)</label><input class="widefat" id="<?php echo $this->get_field_id('Num'); ?>" name="<?php echo $this->get_field_name('Num'); ?>"  type="text"  value="<?php echo $Num; ?>" /></p>
            <?php
    }
	

	 function update($new_instance, $old_instance) {
        return $new_instance;
    }

	 function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		$Num = apply_filters( '$Num', $instance['Num'] );
		if ( !empty($instance['title']) ) {  //TEMISI BOSH QALDURULSA  'رەڭدار خەتكۈشلەر'  BOLUP KORINIDU
			$title = $instance['title'];
		} else {
				$title = 'ئەڭ يېڭى يازمىلار';
			}
		if ( !empty($instance['Num'])) { 
			$Num = $instance['Num'];
		} else {
				$Num = '10';
			}
		$title = apply_filters('widget_title', $title, $instance, $this->id_base);
		$Num = apply_filters('$Num', $Num, $instance, $this->id_base);
		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;?>
<ul>
<?php
	$args = array( 'numberposts' => $Num );
	$recent_posts = wp_get_recent_posts( $args );
	$i=0;
	foreach( $recent_posts as $recent ){
		 if($i%2==0){ echo '<li class="item odd">';
		 }else { echo '<li class="item even">';}
			$i++;
		echo '<a href="' . get_permalink($recent["ID"]) . '" title="'.esc_attr($recent["post_title"]).' نى كۆرۈش"'.'  target = "'.'blank">' .   $recent["post_title"].'</a> </li> ';
	}
?>
</ul>
		<?php  echo $after_widget;
	}
}
add_action('widgets_init', create_function('', 'return register_widget("new_posts");'));?>