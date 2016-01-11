<?php
class blog_info extends WP_Widget {

	 function __construct() {
		$widget_ops = array('classname' => 'blog_info', 'description' =>  "تور بېتىڭىزدىكى ئۇچۇرلىرىنى كۆرسىتىدۇ." );
		parent::__construct('blog_info', '«مەنزىل» | بىكەت ئۇچۇرى', $widget_ops);
	}

 	 
		 function form($instance) {
			$title = esc_attr($instance['title']);
			$date = esc_attr($instance['date']);
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>">تېمىسى：<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('date'); ?>">بىكەت قۇرۇلغان ۋاقىت(شەكلى:2012-9-1)：<input class="widefat" id="<?php echo $this->get_field_id('date'); ?>" name="<?php echo $this->get_field_name('date'); ?>" type="text" value="<?php echo $date; ?>" /></label></p>
            <?php
    }
	

	 function update($new_instance, $old_instance) {
        return $new_instance;
    }

	 function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		if ( !empty($instance['title']) ) {  
			$title = $instance['title'];
		} else {
				$title = 'بىكەت ئۇچۇرى';
			}
		$title = apply_filters('widget_title', $title, $instance, $this->id_base);
		$date = $instance['date'];
		echo $before_widget;
		echo $before_title . $title . $after_title;
		echo'<ul class="blog_info">';
		if ( $title )
			?>
         

           <li>يازما سانى：<?php $count_posts = wp_count_posts();echo $published_posts = $count_posts->publish;?> </li>
           <li> بەت سانى：<?php $count_pages = wp_count_posts('page'); echo $page_posts = $count_pages->publish; ?></li>
           <li>ئومۇمىي باھا：<?php $count_comments = get_comment_count();echo $count_comments['approved'];?></li>
           <li>ئومۇمىي خەتكۈش：<?php echo $count_tags = wp_count_terms('post_tag'); ?> </li>
           <?php if(!empty($instance['date'])){?>
           <li>قۇرۇلغان ۋاقىت：<?php echo $date; ?></li>
           <li>بىكەت يېشى：<?php echo floor((time()-strtotime("$date"))/86400); ?> كۈن</li>
           <?php } ?>
</ul>
		<?php  echo $after_widget;
	}
}
add_action('widgets_init', create_function('', 'return register_widget("blog_info");'));?>