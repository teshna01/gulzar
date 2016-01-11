<?php
class new_comments extends WP_Widget {

	 function __construct() {
		$widget_ops = array('classname' => 'sidebar-widget jobs-widget', 'description' =>  "تور بېتىڭىزنىڭ يېقىنقى ئىنكاسلىرىنى كۆرسىتىدۇ كۆرسىتىدۇ." );
		parent::__construct('new_comments', '«مەنزىل» | ئەڭ يېڭى ئىنكاسلار', $widget_ops);
	}

 	 
		 function form($instance) {
			$title = esc_attr($instance['title']);
        $Num = esc_attr($instance['Num']);
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>">تېمىسى：<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('Num'); ?>">ئىنكاس سانى：(سۈكۈت قىممەت:5)</label><input class="widefat" id="<?php echo $this->get_field_id('Num'); ?>" name="<?php echo $this->get_field_name('Num'); ?>"  type="text"  value="<?php echo $Num; ?>" /></p>
            <?php
    }
	

	 function update($new_instance, $old_instance) {
        return $new_instance;
    }

	 function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		$Num = apply_filters( '$Num', $instance['Num'] );
		if ( !empty($instance['title'])) {  //TEMISI BOSH QALDURULSA  'ئەڭ يېڭى ئىنكاسلار'  BOLUP KORINIDU
			$title = $instance['title'];
		} else {
				$title = 'ئەڭ يېڭى ئىنكاسلار';
			}
		if ( !empty($instance['Num'])) {  //TEMISI BOSH QALDURULSA  'ئەڭ يېڭى ئىنكاسلار'  BOLUP KORINIDU
			$Num = $instance['Num'];
		} else {
				$Num = '5';
			}
		$title = apply_filters('widget_title', $title, $instance, $this->id_base);
		$Num = apply_filters('$Num', $Num, $instance, $this->id_base);
		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;?>
		
    
    
    

            <ul id="job-listing">
     
		<?php
			global $wpdb;
			$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type,comment_author_url,comment_author_email, SUBSTRING(comment_content,1,64) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' AND user_id='0' ORDER BY comment_date_gmt DESC LIMIT 8";
			$comments = $wpdb->get_results($sql);
			$output = $pre_HTML;
			$i=0;
			$liclass="";
			foreach ($comments as $comment) {

	
				
				 if($i%2==1){ $liclass = '<li class="item even">';
				}else {$liclass = '<li class="item odd">';}
				$i++;
				
				
				
				
				$output .= $liclass." <span class=\"comment_author\">".get_avatar( $comment, 32 ).strip_tags($comment->comment_author)." </span>
				<span class=\"post_title\"><a href=\"" . get_permalink($comment->ID) ."#comment-" . $comment->comment_ID . "\" title=\"ئورنى: " .$comment->post_title . "\"> ".$comment->post_title."</a></span>
				
			<span class=\"comment_title\"><a href=\"" . get_permalink($comment->ID) ."#comment-" . $comment->comment_ID . "\" title=\"ئورنى: " .$comment->post_title . "\"> ".strip_tags($comment->com_excerpt)."</a> </span></li>";}
			
			$output .= $post_HTML;
			echo $output;
		?>
	</ul>

		<?php  echo $after_widget;
	}
}
add_action('widgets_init', create_function('', 'return register_widget("new_comments");'));?>