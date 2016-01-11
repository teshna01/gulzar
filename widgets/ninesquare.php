<?php
/*
*阿树工作室-小工具类文件
*/
//类
class NineSquare extends WP_Widget{
	function NineSquare(){
		$widget_ops = array('classname'=>'widget_fx_list','description'=>'自定义小工具-9方格');
		$control_ops = array('width'=>300);
		$this->WP_Widget(false,'投稿最新-9方格',$widget_ops,$control_ops);
	}
	//表单
	function form($instance){
		$instance = wp_parse_args((array)$instance,array(
		'title'=>'最新内容',
		'post_type'=>'',
		'more_link'=>'',
		));
		
		$output = '<p><lable>标题</lable>';
		$output .= '<input id="'.$this->get_field_id('title') .'" name="'.$this->get_field_name('title').'" type="text" value="'.$instance['title'].'" /></p>';
		$output .= '<p><lable>文章类型</lable>';
		$output .= '<select class="postform" id="'.$this->get_field_id('post_type') .'" name="'.$this->get_field_name('post_type').'">';
			$output .= "<option selected='selected' value='post'>默认文章</option>";
			$output .= "<option value='detail'>爆料(投稿)</option>";
		$output .= '</select>';

		$output .= '<p><lable>更多链接(可选)</lable>';
		$output .= '<input style="width:200px;" id="'.$this->get_field_id("more_link") .'" name="'.$this->get_field_name("more_link").'" type="text" value="'.$instance["more_link"].'" />';

		echo $output;
	}
	
	function update($new_instance,$old_instance){
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance["post_type"] = $new_instance["post_type"];
		$instance["more_link"] = $new_instance["more_link"];
			
		return $instance;
	}
	
	function widget($args,$instance){
		extract($args);

		echo $before_widget;
		if( $instance['title'] != '' )
		echo $before_title . $instance['title'] . $after_title;
			echo '<div id="faxian_widget" class="faxian_widget"><div class="full" style="display:none;"><a class="faxian_href" href="" target="_blank" ><img class="faxian_widget_img" width="250" height="250"/><div class="faxian_widget_title"></div></a></div>';
			$args = array(
				'post_type'=>$instance['post_type'],
				'showposts'=>'8'
			);
			$new_query = new WP_Query($args);
			if($new_query->have_posts()){
			echo '<ul>';
			while($new_query->have_posts()){
				$new_query->the_post(); ?>
				<li><a href="<?php echo get_permalink($new_query->post->ID);?>" target="_blank" class="relateFxPic">
				<?php
				if( has_post_thumbnail() ){
					$thumb_id = get_post_thumbnail_id($new_query->post->ID);
					$thumb = wp_get_attachment_image_src($thumb_id,array(250, 250));
					$url =  $thumb[0];
				}else{
					$url =get_post_img($new_query->post->ID, 250, 250 );
				}
				?>
				
				<img src="<?php echo $url;?>"  height="77" width="77" title="<?php echo $new_query->post->post_title; ?>" alt="<?php echo $new_query->post->post_title; ?>"/>
				</a></li>
			<?php
			}
			
			if($instance['more_link']!=''){
				$more_link = $instance['more_link'];
			}else{
				$more_link = get_post_type_archive_link( $instance['post_type'] );
			}
			
			echo '<li><a href="'.$more_link.'" class="relateFxPic relateMore" target="_blank">&nbsp;</a></li></ul></div>';
			}
		
		echo $after_widget;
	}
}
?>