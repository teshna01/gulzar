<?php
/*
*阿树工作室-小工具类文件
*/
//类
class Ashu_postlist extends WP_Widget{
	function Ashu_postlist(){
		$widget_ops = array('classname'=>'widget_featured','description'=>'侧边栏文章列表--可按随机、热门、最新文章排列，图文显示');
		$control_ops = array('width'=>300);
		$this->WP_Widget(false,'侧边栏文章列表',$widget_ops,$control_ops);
	}
	//表单
	function form($instance){
		$instance = wp_parse_args((array)$instance,array(
		'title'=>'最新内容',
		'order'=>'',
		'number'=>5,
		));
		
		$output = '<p><lable>标题</lable>';
		$output .= '<input id="'.$this->get_field_id('title') .'" name="'.$this->get_field_name('title').'" type="text" value="'.$instance['title'].'" /></p>';
		$output .= '<p><lable>排序方式</lable>';
		$output .= '<select class="postform" id="'.$this->get_field_id('order') .'" name="'.$this->get_field_name('order').'">';
			$output .= "<option>请选择排序方式</option>";
			if( $instance['order'] == 'comment' ){
				$selected = 'selected="selected"';
			}else{
				$selected = '';
			}
			$output .= "<option value='comment' $selected>按评论数</option>";
			
			if( $instance['order'] == 'view' ){
				$selected = 'selected="selected"';
			}else{
				$selected = '';
			}
			$output .= "<option value='view' $selected>按浏览量</option>";
			
			if( $instance['order'] == 'new' ){
				$selected = 'selected="selected"';
			}else{
				$selected = '';
			}
			$output .= "<option value='new' $selected>最新文章</option>";
			
			if( ($instance['order'] == 'selected')||$no_value){
				$selected = 'selected="selected"';
			}else{
				$selected = '';
			}
			$output .= "<option value='radom' $selected>随机文章</option>";
		$output .= '</select>';

		$output .= '<p><lable>文章数量</lable>';
		$output .= '<input id="'.$this->get_field_id("number") .'" name="'.$this->get_field_name("number").'" type="text" value="'.$instance["number"].'" />';

		echo $output;
	}
	
	function update($new_instance,$old_instance){
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance["order"] = $new_instance["order"];
		$instance["number"] = (int)$new_instance["number"];
		
		return $instance;
	}
	
	function widget($args,$instance){
		extract($args);
		if($instance['order'] == 'view'){
			echo '<div class="widget widget_featured" id="widget_featured">';
		}elseif($instance['order'] == 'comment'){
			echo '<div class="widget widget_popular" id="widget_featured">';
		}elseif($instance['order'] == 'new'){
			echo '<div class="widget widget_latest" id="widget_featured">';
		}else{
			echo '<div class="widget widget_random" id="widget_featured">';
		}
		
		if( $instance['title'] != '' )
		echo $before_title . $instance['title'] . $after_title;
			$count = (int)$instance["number"];
			if( $instance['order'] == 'view'){
				$args = array(
				'post__not_in' => get_option('sticky_posts'),
				'posts_per_page'=>$count,
				'orderby' => 'meta_value',
				'meta_query' => array(
					array('key' => 'post_views_count'))
				);
			}elseif($instance['order'] == 'comment'){
				$args = array(
				'post__not_in' => get_option('sticky_posts'),
				'posts_per_page'=>$count,
				'orderby' => 'comment_count'
				);
			}elseif($instance['order'] == 'new'){
				$args = array(
				'post__not_in' => get_option('sticky_posts'),
				'showposts'=>$count,
				'offset'=>1
				);
			}else{
				$args = array(
				'post__not_in' => get_option('sticky_posts'),
				'showposts'=>$count,
				'orderby' => 'rand',
				);
			}
			
			$new_query = new WP_Query($args);
			if($new_query->have_posts()){
			echo '<ul>';
			while($new_query->have_posts()){
				$new_query->the_post(); ?>
				<li>
				<div  class="div1"> 
				<dl>
					<dt>
					<a href="<?php echo get_permalink($new_query->post->ID);?>" target="_blank" rel="nofollow">
					<?php
						if( has_post_thumbnail() ){
							$thumb_id = get_post_thumbnail_id($new_query->post->ID);
							$thumb = wp_get_attachment_image_src($thumb_id,array(60, 60));
							$url =  $thumb[0];
						}else{
							$url =get_post_img($new_query->post->ID, 60, 60 );
						}
						?>
						<img src="<?php echo $url;?>" height="60" width="60" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
						</a>
						</dt>
						<dd><a  target="_blank" href="<?php echo get_permalink($new_query->post->ID);?>" title="<?php echo $new_query->post->post_title; ?>"><?php echo $new_query->post->post_title; ?></a></dd>
				</dl>
				</div>
				</li> 
			<?php
			}
			echo '</ul>';
			}
		echo $after_widget;
	}
}
?>