<?php
class izdesh extends WP_Widget {
	 function __construct() {
		$widget_ops = array('classname' => 'widget_search', 'description' =>  "تور بېتىڭىزنىڭ ئىزدەش ماتورى" );
		parent::__construct('izdesh', '«مەنزىل» | ئىزدىگۈچى', $widget_ops);
	}

 	 
		 function form($instance) {
			$title = esc_attr($instance['title']);
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

		if ( !empty($instance['title']) ) {  //TEMISI BOSH QALDURULSA  'ئىزدەپ بېقىڭ'  BOLUP KORINIDU
			$title = $instance['title'];
		} else {
				$title = 'ئىزدەپ بېقىڭ';
			}
		$title = apply_filters('widget_title', $title, $instance, $this->id_base);

		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;
			?>
         <ul >
	   <?php get_search_form();?>
</ul>
<?php
		  echo $after_widget;
	}
}
add_action('widgets_init', create_function('', 'return register_widget("izdesh");'));?>