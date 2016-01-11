<?php

class oqurmen extends WP_Widget {
	 function __construct() {
		$widget_ops = array('classname' => 'oqurmen', 'description' =>  "تور بېتىڭىزنىڭ ئىنكاس ئاۋانگارتلىرى." );
		parent::__construct('oqurmen', '«مەنزىل» | ئاكتىپ ئوقۇرمەنلەر', $widget_ops);
	}

 	 
		 function form($instance) {
			$title = esc_attr($instance['title']);
        $Num = esc_attr($instance['Num']);
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>">تېمىسى：<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('Num'); ?>"> يازما سانى： (سۈكۈت قىممەت:10)</label><input class="widefat" id="<?php echo $this->get_field_id('Num'); ?>" name="<?php echo $this->get_field_name('Num'); ?>"  type="text"  value="<?php echo $Num; ?>" /></p>
            <?php
    }
	

	 function update($new_instance, $old_instance) {
        return $new_instance;
    }

	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );

		if ( !empty($instance['title']) ) {  //TEMISI BOSH QALDURULSA  'ئاكتىپ ئوقۇرمەنلەر'  BOLUP KORINIDU

			$title = $instance['title'];
		} else {
				$title = 'ئاكتىپ ئوقۇرمەنلەر';
			}
			if ( !empty($instance['Num'])) {  
			$Num = $instance['Num'];
		} else {
				$Num = '10';
			}
		$title = apply_filters('widget_title', $title, $instance, $this->id_base);

		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;?>
		<ul class="oqurmen">        
<?php
    global $wpdb;
    // 执行数据库查询
    $counts = $wpdb->get_results("SELECT COUNT(comment_author) AS cnt, comment_author, comment_author_url, comment_author_email
        FROM {$wpdb->prefix}comments
        WHERE comment_date > date_sub( NOW(), INTERVAL 6 MONTH )
            AND comment_approved = '1'
            AND comment_type = ''
            AND user_id = '0'
        GROUP BY comment_author_email
        ORDER BY cnt DESC
        LIMIT $Num");

    $mostactive = '';
    if ( $counts ) {
    // 输出读者列表      
        foreach ($counts as $count) {
            $c_url = $count->comment_author_url;
            $mostactive .= '<li>' . '<a href="'. $c_url . '" title="' . $count->comment_author . '('. $count->cnt . ')" target="_blank">' . get_avatar($count->comment_author_email, 40, '', $count->comment_author .  '') . '</a></li>';
        }
        echo $mostactive;
    }
?>
<div class="clear"></div>
</ul>
		<?php  echo $after_widget;
	}
}
add_action('widgets_init', create_function('', 'return register_widget("oqurmen");'));
