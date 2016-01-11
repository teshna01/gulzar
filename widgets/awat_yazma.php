<?php
class awat_yazma extends WP_Widget {

	 function __construct() {
		$widget_ops = array('classname' => 'awat_yazma', 'description' =>  "تور بېتىڭىزنىڭ ئەڭ كۆپ ئىنكاسلىق يازمىلارنى كۆرسىتىدۇ." );
		parent::__construct('awat_yazma', '«مەنزىل» | ئاۋات يازمىلار', $widget_ops);
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

		if ( !empty($instance['title']) ) {  //TEMISI BOSH QALDURULSA  'ئاۋات يازمىلار' BOLUP KORINIDU
			$title = $instance['title'];
		} else {
				$title = 'ئاۋات يازمىلار';
			}
			if ( !empty($instance['Num'])) {  //TEMISI BOSH QALDURULSA  'ئەڭ يېڭى ئىنكاسلار'  BOLUP KORINIDU
			$Num = $instance['Num'];
		} else {
				$Num = '10';
			}
		$title = apply_filters('widget_title', $title, $instance, $this->id_base);

		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;?>
            <ul class="awat_yazma">
        <?php
	$post_num = $Num;
	$args = array(
      'post_password' => '',
	  'post_status' => 'publish', // ELAN QILINGHAN YAZMA ICHIDIN TALLAYDU
	  'post__not_in' => array($post->ID),//HAZIR KORWATQAN YAZMINI CHIQIRWETIDU
	  'caller_get_posts' => 1, // CHOQQILANGHAN YAZMINI CHIQIRWETIDU
	  'orderby' => 'comment_count', // INKAS SANI BOYICHE TIZIDU
	  'posts_per_page' => $post_num //TEMA SANI { ARQA SEHNIDE TALLISHI BAR }
);
 $query_posts = new WP_Query();
 $query_posts->query($args);
 while( $query_posts->have_posts() ) { $query_posts->the_post(); ?>
  <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
<?php } wp_reset_query();?>
</ul>
		<?php  echo $after_widget;
	}
}
add_action('widgets_init', create_function('', 'return register_widget("awat_yazma");'));?>