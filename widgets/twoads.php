<?php
/*
*阿树工作室-小工具类文件
*/
//类
class Onecolumnsads extends WP_Widget{
	function Onecolumnsads(){
		$widget_ops = array('classname'=>'onecolumnsads','description'=>'这个工具可显示一个大图片广告258*120');
		$control_ops = array('width'=>300);
		$this->WP_Widget(false,'一列图-广告',$widget_ops,$control_ops);
	}
	//表单
	function form($instance){
		$instance = wp_parse_args((array)$instance,array(
		'title'=>'赞助商',
		'ads_image'=>'',
		'ads_link'=>'',
		'ads_alt'=>'',
		));
		
		$output = '<p><lable>标题</lable>';
		$output .= '<input id="'.$this->get_field_id('title') .'" name="'.$this->get_field_name('title').'" type="text" value="'.$instance['title'].'" /></p>';
		$output .= '<p><lable>图片地址</lable>';
		$output .= '<input style="width:200px;" id="'.$this->get_field_id("ads_image") .'" name="'.$this->get_field_name("ads_image").'" type="text" value="'.$instance["ads_image"].'" />';
		$output .= '<p><lable>链接地址</lable>';
		$output .= '<input style="width:200px;" id="'.$this->get_field_id("ads_link") .'" name="'.$this->get_field_name("ads_link").'" type="text" value="'.$instance["ads_link"].'" />';
		$output .= '<p><lable>alt信息</lable>';
		$output .= '<input style="width:200px;" id="'.$this->get_field_id("ads_alt") .'" name="'.$this->get_field_name("ads_alt").'" type="text" value="'.$instance["ads_alt"].'" />';

		echo $output;
	}
	
	function update($new_instance,$old_instance){
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance["ads_image"] = $new_instance["ads_image"];
		$instance["ads_link"] = $new_instance["ads_link"];
		$instance["ads_alt"] = $new_instance["ads_alt"];
			
		return $instance;
	}
	
	function widget($args,$instance){
		extract($args);
		
		echo $before_widget;
		if( $instance['title'] != '' )
			echo $before_title . $instance['title'] . $after_title;
		
		if( $instance["ads_image"] != '' ) {
			$output ='<div class="onecolumnspic">';
			if( $instance["ads_link"] == ''){
				$output .= '<img src="'.$instance["ads_image"].'" width="258" height="120" alt="'.$instance["ads_alt"].'" />';
			}else{
				$output .= '<a href="'.$instance["ads_link"].'">';
				$output .= '<img src="'.$instance["ads_image"].'" width="258" height="120" alt="'.$instance["ads_alt"].'" />';
				$output .= '</a>';
			}
			$output .= '</div>';
			echo $output;
		}
		
		echo $after_widget;
	}
}
?>