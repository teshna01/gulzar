<?php
class login extends WP_Widget {

	 function __construct() {
		$widget_ops = array('classname' => 'login', 'description' =>  "تور بېتىڭىزدىكى يېڭى يازمىلارنى كۆرسىتىدۇ." );
		parent::__construct('meta', '«مەنزىل» | ئەزالار رايونى', $widget_ops);
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
		if ( !empty($instance['title']) ) {  //SVKVTIKI NAMI:ئەزالار رايونى
			$title = $instance['title'];
		} else {
				$title = 'ئەزالار رايونى';
			}
		$title = apply_filters('widget_title', $title, $instance, $this->id_base);
		echo '<div class="widget login">';
		echo $before_title . $title . $after_title;
		echo'<ul class="login">';
		if ( $title )?>
			
         
<?php
  global $user_ID, $user_identity, $user_level, $user_info;
  if (!$user_ID) {
	   $user_info = get_currentuserinfo($user_ID);
?>
<form id="loginform" action="<?php echo get_settings('siteurl'); ?>/wp-login.php" method="post">
<p>
ئەزالىق نامى：<label><input class="login" type="text" name="log" id="log" value="" size="12" /></label>
</p>
<p>
مەخپىي نومۇرى：<label><input class="login" type="password" name="pwd" id="pwd" value="" size="12" /></label>
</p>
<p>
<input class="kirish" type="submit" name="submit" value="كىرىش" /> 
<label class="rememberme"><input  type="checkbox" name="rememberme" value="forever" />    ئەستە تۇت   </label>
</p>
<p>
<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>"/>
</p>
</form>
<?php } 
else { ?>
<p><div class="login_list">
<ul class="info">
<div class="login_avatar"><a href="<?php bloginfo('wpurl') ?>/wp-admin/profile.php"><?php global $current_user;get_currentuserinfo();echo get_avatar( $current_user->user_email, 35); ?></a></div>
<li class="user"><img  src="<?php echo get_bloginfo ( 'stylesheet_directory' );?>/images/icons/author.png" /><?php echo $user_identity; ?></li>
<li class="tewelik"><img src="<?php echo get_bloginfo ( 'stylesheet_directory' );?>/images/icons/identify.png" /><?php wp_register('', ''); ?></li></ul>
<ul class="cpanal">
			<li><a href="<?php bloginfo('url') ?>/wp-admin/"><img src="<?php echo get_bloginfo ( 'stylesheet_directory' );?>/images/icons/cpanal.png" />ئارقا سەھنە</a></li>
				<li><a href="<?php bloginfo('url') ?>/wp-admin/post-new.php"><img  src="<?php echo get_bloginfo ( 'stylesheet_directory' );?>/images/icons/write.png" />يازما يوللاش</a></li>
				<li><a href="<?php bloginfo('url') ?>/wp-admin/edit-comments.php"><img  src="<?php echo get_bloginfo ( 'stylesheet_directory' );?>/images/icons/comments.png" />باھا باشقۇرۇش</a></li>
				<li><a href="<?php bloginfo('url') ?>/wp-login.php?action=logout&amp;redirect_to=<?php bloginfo('url');?>"><img  src="<?php echo get_bloginfo ( 'stylesheet_directory' );?>/images/icons/quit.png" />چېكىنىش</a></li>
                </ul>
                </div></p><div class="clear"></div>
                <?php } ?>
</ul>
		<?php  echo $after_widget;
	}
}
add_action('widgets_init', create_function('', 'return register_widget("login");'));?>