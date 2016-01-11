<?php 
/**
 * WordPress Rengdar Hetkvshliri
 * @author: Doghap  
 * @Email : doghap@hemnepes.com
 * @Blog  : http://www.hemnepes.com
 */

class tagcloud extends WP_Widget {
    /******************  FUNCTION BASHLINISHI  ***********************/
    function tagcloud() {
		$widget_ops = array('classname' => 'tag_cloud', 'description' =>  "تور بېتىڭىزنىڭ خەتكۈچلىرىنى كۆرسىتىدۇ." );
		parent::__construct('tagcloud', '«مەنزىل» | رەڭدار خەتكۈشلەر', $widget_ops);
    }
    /****************  SAQLASH ELIP BARIDU  *******************/
		function update($new_instance, $old_instance) {
        return $new_instance;
    }

    /************************  ARQA SEHNE TALLASHLIRI  *******************/
	
    function form($instance) {
			$title = esc_attr($instance['title']);
        $Num = esc_attr($instance['Num']);
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>">تېمىسى：<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('Num'); ?>">خەتكۈش سانى： (سۈكۈت قىممەت:20)</label><input class="widefat" id="<?php echo $this->get_field_id('Num'); ?>" name="<?php echo $this->get_field_name('Num'); ?>"  type="text"  value="<?php echo $Num; ?>" /></p>
            <?php
    }
    /******************  MEZMUNI BU YERDE  ***********************/
		function widget( $args, $instance ) {
		extract($args);
		if ( !empty($instance['title']) ) {  //TEMISI BOSH QALDURULSA  'رەڭدار خەتكۈشلەر'  BOLUP KORINIDU
			$title = $instance['title'];
		} else {
				$title = 'رەڭدار خەتكۈشلەر';
			}
			if ( !empty($instance['Num'])) {
			$Num = $instance['Num'];
		} else {
				$Num = '20';
			}
		$title = apply_filters('widget_title', $title, $instance, $this->id_base);

		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;
		echo '<ul class="tagcloud"><li>';
		wp_tag_cloud('smallest=14&largest=14&unit=px&number='.$Num
.'&orderby=count&order=DESC');
		echo "</li></ul>";
		echo $after_widget;
		}
}
add_action('widgets_init', create_function('', 'return register_widget("tagcloud");'));?>