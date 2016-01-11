<?php
class pages extends WP_Widget {

	 function __construct() {
		$widget_ops = array('classname' => 'yegi_yazma', 'description' =>  "تور بېتىڭىزدىكى بەتلەر." );
		parent::__construct('pages', '«مەنزىل» | بەتلەر', $widget_ops);
	}

 	 
		 function form($instance) {
			$title = esc_attr($instance['title']);
        $Num = esc_attr($instance['Num']);
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>">تېمىسى：<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
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
				$title = 'بەتلەر';
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
          <ul class="pages">
<?php wp_list_pages('title_li=&depth=1'); ?>
</ul>
		<?php  echo $after_widget;
	}
}
add_action('widgets_init', create_function('', 'return register_widget("pages");'));?>