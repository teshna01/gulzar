<?php
//自定义面板类的实例化
/**********title*************/
$options_1 = array();


//page参数为在页面和文章中都添加面板
//context参数为面板在后台的位置，比如side则显示在侧栏
$boxinfo = array('title' => 'Soft Information', 'id'=>'doghapbox', 'page'=>array('page','post'), 'context'=>'normal', 'priority'=>'low', 'callback'=>'');

$options_1[] = array(
			"name" => "Icon Image Address : ",
			"button_label"=>'upload image',
			"desc" => "",
			"id" => "icon",
			"size"=>"80",
			"std" => "",
			"width"=>"90",
			"height"=>"1",
			//"dir"=>"rtl",
			"type" => "text"
			);

$options_1[] = array(
			"name" => "Description : ",
			"desc" => "",
			"id" => "description",
			"size"=>"80",
			"std" => "",
			"width"=>"90",
			"height"=>"5",
			//"dir"=>"rtl",
			"type" => "textarea"
			);
$options_1[] = array(
			"name" => "Enterprise : ",
			"desc" => "",
			"id" => "enterprise",
			"size"=>"40",
			"std" => "",
			//"dir"=>"rtl",
			"type" => "text"
			);
$options_1[] = array(
			"name" => "Last Updated Time : ",
			"desc" => "",
			"id" => "last_updated",
			"size"=>"40",
			"std" => "",
			"type" => "text"
			);

$options_1[] = array(
			"name" => "Download Now Address : ",
			"desc" => "",
			"id" => "download_now",
			"size"=>"80",
			"std" => "",
			"dir"=>"ltr",
			"type" => "text"
			);
$options_1[] = array(
			"name" => "Soft Size :",
			"desc" => "",
			"id" => "soft_size",
			"size"=>"10",
			"std" => "",
			"type" => "text"
			);	
$options_1[] = array(
			"name" => "Screenshots_1 Image Address : ",
			"button_label"=>'upload image',
			"desc" => "",
			"id" => "screenshots_1",
			"size"=>"80",
			"std" => "",
			"width"=>"90",
			"height"=>"1",
			//"dir"=>"rtl",
			"type" => "text"
			);
$options_1[] = array(
			"name" => "Screenshots_2 Image Address : ",
			"button_label"=>'upload image',
			"desc" => "",
			"id" => "screenshots_2",
			"size"=>"80",
			"std" => "",
			"width"=>"90",
			"height"=>"1",
			//"dir"=>"rtl",
			"type" => "text"
			);
$options_1[] = array(
			"name" => "Screenshots_3 Image Address : ",
			"button_label"=>'upload image',
			"desc" => "",
			"id" => "screenshots_3",
			"size"=>"80",
			"std" => "",
			"width"=>"90",
			"height"=>"1",
			//"dir"=>"rtl",
			"type" => "text"
			);
$options_1[] = array(
			"name" => "Screenshots_4 Image Address : ",
			"button_label"=>'upload image',
			"desc" => "",
			"id" => "screenshots_4",
			"size"=>"80",
			"std" => "",
			"width"=>"90",
			"height"=>"1",
			//"dir"=>"rtl",
			"type" => "text"
			);
$options_1[] = array(
			"name" => "Screenshots_5 Image Address : ",
			"button_label"=>'upload image',
			"desc" => "",
			"id" => "screenshots_5",
			"size"=>"80",
			"std" => "",
			"width"=>"90",
			"height"=>"1",
			//"dir"=>"rtl",
			"type" => "text"
			);
$options_1[] = array(
			"name" => "Screenshots_6 Image Address : ",
			"button_label"=>'upload image',
			"desc" => "",
			"id" => "screenshots_6",
			"size"=>"80",
			"std" => "",
			"width"=>"90",
			"height"=>"1",
			//"dir"=>"rtl",
			"type" => "text"
			);

			
			
$new_box = new doghap_meta_box($options_1, $boxinfo);

?>