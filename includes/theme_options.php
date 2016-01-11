<?php
//
// +----------------------------------------------------------------------+
// | 							Menzil Team                      	      |
// +----------------------------------------------------------------------+
// | 					  file: theme_options.php				   	      |
// +----------------------------------------------------------------------+
// |					 Copyright (c) 2013-2014    			          |
// +----------------------------------------------------------------------+
// | 		     Author: Menzil Team <http://Web.Menzil.Cn>   	          |
// +----------------------------------------------------------------------+
// | 													          	      |
// | 	   	  这下面是主题设置函数,可修改$options 数组的内容					  |
// | 		即可增加新的主题设置选项,如果你不会增加,请忽做任何更改	 		 	  |
// | 													          	      |
// +----------------------------------------------------------------------+
//
$themename = "NurDos 1.0";
$shortname = "NurDos";
$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array();
foreach ($categories as $category_list ) {
       $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}
//Stylesheets Reader
$alt_stylesheets = array();
if ( is_dir($alt_stylesheet_path) ) {
    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 
        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
            if(stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }
    }
}

$number_entries = array("选择数量" => "", "10" => "10", "12" => "12", "14" => "14", "16" => "16", "18" => "18", "20" => "20" );
$slider_num = array("选择数量" => "", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "10" => "10");
$other_num = array("选择数量" => "", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "10" => "10", "11" => "11", "12" => "12", "13" => "13", "14" => "14", "15" => "15", "16" => "16", "17" => "17", "18" => "18", "19" => "19", "20" => "20");


			
$options = array ( 
array( "name" => $themename."主题设置",
       "type" => "title"),
	   

//首页设置
    array( "name" => "首页布局",
           "type" => "section"),
    array( "type" => "open"),

	array(  "name" => "幻灯片设置",
			"desc" => "选择幻灯片显示内容",
            "id" => $shortname."_slider_type",
            "type" => "select",
            "std" => "置顶文章",
            "options" => array(
			"置顶文章" => 'Sticky',
			 "分类中文章" => 'Category')),
			
	array(	"name" => "幻灯片中显示的文章分类ID设置",
			"desc" => "说明：显示更多分类，请用英文逗号＂,＂隔开",
			"id" => $shortname."_slider_cat",
			"type" => "text",
            "std" => "1,2,3,4",),
			
	array(  "name" => "幻灯片显示数量",
			"desc" => "提示",
            "id" => $shortname."_slider_num",
            "type" => "select",
            "std" => "置顶文章",
            "options" => $slider_num,
			"section" => '<div class="part"></div>'),

	array(	"name" => "咨询小喇叭分类ID设置",
			"desc" => "说明：只能填写一个分类ID",
            "id" => $shortname."_notice",
            "type" => "text",
            "std" => "1,2,3,4",
			"section" => '<div class="part"></div>'),
			
	array(	"name" => "首页CMS分类ID设置",
			"desc" => "说明：最多显示8格(多了显示前8个分类)，多个分类请用英文逗号＂,＂隔开",
            "id" => $shortname."_catl",
            "type" => "text",
            "std" => "1,2,3,4",
			"section" => '<div class="part"></div>'),

	array(  "name" => "滚动相册分类ID设置",
			"desc" => "说明：最多显示8格，多个分类请用英文逗号＂,＂隔开",
            "id" => $shortname."_pic",
            "type" => "text",
            "std" => "1,2,3,4",
			"section" => '<div class="part"></div>'),

	array(	"name" => "首页手拉手分类ID设置",
			"desc" => "说明：能显示三个分类下的文章(多了只显示前三个分类)，分类请用英文逗号＂,＂隔开",
            "id" => $shortname."_cms_list_2",
            "type" => "text",
            "std" => "1,2,3",
			"section" => '<div class="part"></div>'),

	array(  "name" => "视频分类ID设置",
			"desc" => "说明：显示左右两格(多了只显示前两个分类)，多个分类请用英文逗号＂,＂隔开",
            "id" => $shortname."_video",
            "type" => "text",
            "std" => "1,2,3,4",
			"section" => '<div class="part"></div>'),

//首页侧边栏设置开始

    array( "type" => "close"),
    array( "name" => "首页侧边栏设置",
           "type" => "section"),
    array( "type" => "open"),

	array(  "name" => "Staff Picks 显示数量",
			"desc" => "说明:请选择要显示的文章总数",
            "id" => $shortname."_Staff_Picks",
            "type" => "select",
            "std" => "10",
            "options" => $other_num,
			"section" => '<div class="part"></div>'),
			
	array(  "name" => "Top Downloaded 显示数量",
			"desc" => "说明:请选择要显示的文章总数",
            "id" => $shortname."_side_rand",
            "type" => "select",
            "std" => "5",
            "options" => $other_num,
			"section" => '<div class="part"></div>'),
			
	array(  "name" => "Latest Tech Jobs 显示数量",
			"desc" => "说明:请选择要显示的文章总数",
            "id" => $shortname."_side_mostView",
            "type" => "select",
            "std" => "10",
            "options" => $other_num,
			"section" => '<div class="part"></div>'),
			
	array(  "name" => "Recommended Projects 示数量",
			"desc" => "说明:请选择要显示的读者总数",
            "id" => $shortname."_side_star",
            "type" => "select",
            "std" => "9",
            "options" => array(
				"请选择数量" => "",
				"6" => "6",
				"9" => "9",
				"12" => "12",
				"15" => "15",
				"18" => "18",
				"21" => "21",
			
			),
			"section" => '<div class="part"></div>'),
array(  "name" => "Recent Releases 示数量",
			"desc" => "说明:请选择要显示的读者总数",
            "id" => $shortname."_side_star",
            "type" => "select",
            "std" => "9",
            "options" => array(
				"请选择数量" => "",
				"6" => "6",
				"9" => "9",
				"12" => "12",
				"15" => "15",
				"18" => "18",
				"21" => "21",
			),
			"section" => '<div class="part"></div>'),
	array(  "name" => "يان سىتون خىزمەت ئۇچۇرى",
			"desc" => "سۈكۈت: تاقاقلىق بولىدۇ",
            "id" => $shortname."_job_display",
            "type" => "select",
            "std" => "كۆرسىتىش",
            "options" => array("يوشۇرۇش", "كۆرسىتىش")),
			
	
			

//页脚(Footer)设置开始

    array( "type" => "close"),
    array( "name" => "页脚(Footer)设置",
           "type" => "section"),
    array( "type" => "open"),


	array(	"name" => "页脚内容代码设置\n",
            "desc" => '你可以编辑下面的代码来修改页脚内容',
            "id" => $shortname."_footer",
            "type" => "textarea",
            "std" => '<li>Copyright © 2013 Dice. All Rights Reserved.
MenZil is a Dice Holdings, Inc. service.</li>
<li><a target="_blank" href="http://www.MenZil.Cn/">新ICP备123456789号</a></li>',
			"section" => '<div class="part"></div>'),

 	array(	"name" => "输入推荐栏目小工具分类ID",
            "desc" => "说明：输入分类ID，显示更多的分类请用英文逗号＂,＂把ID号隔开",
            "id" => $shortname."_cat_h",
            "type" => "text",
            "std" => "1,2,3,4"),

	array(	"name" => "输入侧边推荐文章小工具分类ID",
            "desc" => "多个ID用英文逗号＂,＂隔开",
            "id" => $shortname."_s_cat",
            "type" => "text",
            "std" => "1,2,3"),

	array(	"name" => "输入推荐文章显示的篇数",
            "desc" => "说明：默认20篇",
            "id" => $shortname."_s_cat_n",
            "type" => "text",
            "std" => "20",
			"section" => '<div class="part"></div>'),

	array(  "name" => "侧边最新图片",
			"desc" => "说明：默认闭关",
            "id" => $shortname."_mimg",
            "type" => "select",
            "std" => "显示",
            "options" => array("关闭", "显示")),

	array(	"name" => "侧边最新图片显示数量",
			"desc" => "说明：默认显示4张",
			"id" => $shortname."_mimg_n",
			"std" => "4",
			"type" => "text",
			"options" => $number_entries,
			"section" => '<div class="part"></div>'),

	array(  "name" => "侧边同分类最新文章",
			"desc" => "说明：默认闭关",
            "id" => $shortname."_mcat",
            "type" => "select",
            "std" => "显示",
            "options" => array("关闭", "显示")),

	array(	"name" => "同分类最新文章显示篇数",
			"desc" => "说明：默认显示5篇",
			"id" => $shortname."_mcat_n",
			"std" => "5",
			"type" => "text",
			"options" => $number_entries,
			"section" => '<div class="part"></div>'),

	array(	"name" => "输入从侧边固定分类排除的分类ID",
            "desc" => "说明：比如：1,2,3多个ID用英文逗号＂,＂隔开",
            "id" => $shortname."_cat_exclude",
            "type" => "text",
            "std" => "",
			"section" => '<div class="part"></div>'),

	array(  "name" => "侧边最活跃读者",
			"desc" => "说明：默认不显示",
            "id" => $shortname."_wallreaders",
            "type" => "select",
            "std" => "关闭",
            "options" => array("关闭", "显示"),
			"desc" => '<div class="part"></div>'),

	array(  "name" => "最近浏览过的文章",
			"desc" => "说明：默认显示",
            "id" => $shortname."_recently",
            "type" => "select",
            "std" => "关闭",
            "options" => array("显示", "关闭"),
			"section" => '<div class="part"></div>'),

	array(  "name" => "侧边网站统计",
			"desc" => "说明：默认不显示",
            "id" => $shortname."_statistics",
            "type" => "select",
            "std" => "显示",
            "options" => array("关闭", "显示")),

	array(	"name" => "建站日期",
            "desc" => "说明：日期格式：2008-02-01",
            "id" => $shortname."_builddate",
            "type" => "text",
            "std" => "2008-02-01"),

//综合功能控制

    array( "type" => "close"),
    array( "name" => "综合功能",
           "type" => "section"),
    array( "type" => "open"),

	array(  "name" => "是否显示LOGO",
			"desc" => "说明：默认显示",
            "id" => $shortname."_logo",
            "type" => "select",
            "std" => "关闭",
            "options" => array("显示", "关闭")),

	array(  "name" => "特色图片功能",
			"desc" => "说明：默认闭关。开启后，上传图片会自动生成三张裁剪后的缩略图，选择作为特色图像",
            "id" => $shortname."_cut_img",
            "type" => "select",
            "std" => "开启",
            "options" => array("关闭", "开启")),

	array(  "name" => "暗箱放大特效",
			"desc" => "说明：默认开启",
            "id" => $shortname."_pirobox",
            "type" => "select",
            "std" => "关闭",
            "options" => array("开启", "关闭")),

	array(  "name" => "彩色标签云",
			"desc" => "说明：默认显示",
            "id" => $shortname."_cumulus",
            "type" => "select",
            "std" => "关闭",
            "options" => array("显示", "关闭")),

	array(  "name" => "分类图标",
			"desc" => "说明：默认不显示",
            "id" => $shortname."_ico",
            "type" => "select",
            "std" => "显示",
            "options" => array("关闭", "显示")),

	array(  "name" => "正文底部相关文章",
			"desc" => "说明：默认显示",
            "id" => $shortname."_related",
            "type" => "select",
            "std" => "关闭",
            "options" => array("显示", "关闭")),

	array(  "name" => "显示分享按钮",
            "id" => $shortname."_share",
            "type" => "checkbox",
			"std" => "false"),

	array(  "name" => "文章导航目录",
			"desc" => "默认不显示。",
            "id" => $shortname."_directory",
            "type" => "checkbox",
			"std" => "false"),

	array(  "name" => "是否显示表情",
			"desc" => "说明：默认显示",
            "id" => $shortname."_smiley",
            "type" => "select",
            "std" => "关闭",
            "options" => array("显示", "关闭")),

	array(  "name" => "底部公告栏设置",
			"desc" => "说明：默认显示",
            "id" => $shortname."_bulletin",
            "type" => "select",
            "std" => "关闭",
            "options" => array("显示", "关闭")),

	array(	"name" => "公告显示条数",
			"desc" => "说明：默认显示4条",
			"id" => $shortname."_bulletin_n",
			"std" => "4",
			 "type" => "text",
			"options" => $number_entries),

	array(	"name" => "输入首页底部友情链接数量",
            "desc" => "说明：默认随机排序显示20个",
            "id" => $shortname."_link",
            "type" => "text",
            "std" => "20"),

	array("name" => "全部链接",
            "desc" => "说明：输入友情链接页面地址",
            "id" => $shortname."_link_s",
            "type" => "text",
            "std" => "输入你的友情链接页面地址"),

	array(  "name" => "关注新浪微博",
			"desc" => "",
            "id" => $shortname."_weib",
            "type" => "checkbox",
			"std" => "false"),

	array(	"name" => "输入新浪微博ID",
            "desc" => "",
            "id" => $shortname."_weibo",
            "type" => "text",
            "std" => "1882973105"),

       array("name" => "输入你的商铺地址",
            "desc" => "说明：用于我的商铺独立模版",
            "id" => $shortname."_shops",
            "type" => "text",
            "std" => "http://wopus.taobao.com/"),

//SEO设置

    array( "type" => "close"),
	array( "name" => "SEO设置",
       "type" => "section"),
	array( "type" => "open"),

	array(	"name" => "首页描述（Description）",
			"desc" => "",
			"id" => $shortname."_description",
			"type" => "textarea",
            "std" => "说明：输入你的网站描述，一般不超过200个字符"),

	array(	"name" => "首页关键词（KeyWords）",
            "desc" => "",
            "id" => $shortname."_keywords",
            "type" => "textarea",
            "std" => "说明：输入你的网站关键字，一般不超过100个字符"),

	array("name" => "流量统计代码",
            "desc" => "",
            "id" => $shortname."_track_code",
            "type" => "textarea",
            "std" => ""),

//google自定义搜索

    array( "type" => "close"),
	array( "name" => "搜索设置",
			"type" => "section"),
	array( "type" => "open"),


	array(	"name" => "侧边百度搜索小工具，输入域名",
            "desc" => "",
            "id" => $shortname."_baidu_s",
            "type" => "text",
            "std" => "zmingcx.com"),

	array(  "name" => "导航搜索框，选择搜索方式",
			"desc" => "说明：默认WP程序自带，选择google自定义搜索，需设置以下两项",
            "id" => $shortname."_search",
            "type" => "select",
            "std" => "google",
            "options" => array("wp", "google")),

	array(	"name" => "输入你的Google搜索结果页面链接",
            "desc" => "",
            "id" => $shortname."_search_link",
            "type" => "text",
            "std" => "http://zmingcx.com/search"),

	array(	"name" => "输入你的Google自定义搜索ID",
            "desc" => "",
            "id" => $shortname."_search_ID",
            "type" => "text",
            "std" => "005077649218303215363:ngrflw3nv8m"),

    array( "type" => "close"),
	array( "name" => "广告设置",
			"type" => "section"),
	array( "type" => "open"),

	array(  "name" => "是否显示首页广告",
			"desc" => "说明：默认显示，最大宽度730px",
            "id" => $shortname."_adh",
            "type" => "select",
            "std" => "关闭",
            "options" => array("显示", "关闭")),

	array(	"name" => "输入首页广告代码",
            "desc" => "",
            "id" => $shortname."_adh_c",
            "type" => "textarea",
            "std" => '<a href="http://faq.wopus.org/" target="_blank"><img src="' . get_bloginfo('template_directory') . '/images/ad/ad730.jpg" alt="Wopus问答" /></a>'),

	array(	"name" => "输入侧边固定广告代码(小工具)",
            "desc" => "",
            "id" => $shortname."_adsc",
            "type" => "textarea",
            "std" => '<a href="http://idc.wopus.org/" target="_blank"><img src="' . get_bloginfo('template_directory') . '/images/ad/ad230.jpg" alt="博客主机" /></a>'),
 
 	array(	"name" => "输入侧边跟随广告代码",
            "desc" => "",
            "id" => $shortname."_adsr",
            "type" => "textarea",
            "std" => '<a href="http://idc.wopus.org/" target="_blank"><img src="' . get_bloginfo('template_directory') . '/images/ad/ad230.jpg" alt="博客主机" /></a>'),
 
 
	array(  "name" => "是否显示评论框上方广告",
			"desc" => "说明：默认显示，最大宽度730px",
            "id" => $shortname."_adc",
            "type" => "select",
            "std" => "关闭",
            "options" => array("显示", "关闭")),

	array(	"name" => "输入评论框上方广告代码",
            "desc" => "",
            "id" => $shortname."_ad_c",
            "type" => "textarea",
            "std" => '<a href="http://faq.wopus.org/" target="_blank"><img src="' . get_bloginfo('template_directory') . '/images/ad/ad730.jpg" alt="Wopus问答" /></a>'),

	array(  "name" => "是否显示正文广告",
			"desc" => "说明：默认显示，最大宽度730px",
            "id" => $shortname."_ad_r",
            "type" => "select",
            "std" => "关闭",
            "options" => array("显示", "关闭")),

	array(	"name" => "输入正文广告代码",
            "desc" => "",
            "id" => $shortname."_ad_rc",
            "type" => "textarea",
            "std" => '<a href="http://idc.wopus.org/" target="_blank"><img src="' . get_bloginfo('template_directory') . '/images/ad/ad300.jpg" alt="博客主机" /></a>'),

	array(	"name" => "输入下载弹窗广告",
            "desc" => "",
            "id" => $shortname."_file_ad",
            "type" => "textarea",
            "std" => '<a href="http://idc.wopus.org/" target="_blank"><img src="' . get_bloginfo('template_directory') . '/images/ad/ad500.jpg" alt="博客主机" /></a>'),

	array(  "name" => "是否显示正文底部广告",
			"desc" => "说明：默认显示，最大宽度730px",
            "id" => $shortname."_adt",
            "type" => "select",
            "std" => "关闭",
            "options" => array("显示", "关闭")),

	array(	"name" => "输入正文底部广告代码",
            "desc" => "",
            "id" => $shortname."_adtc",
            "type" => "textarea",
            "std" => '<a href="http://faq.wopus.org/" target="_blank"><img src="' . get_bloginfo('template_directory') . '/images/ad/ad730.jpg" alt="Wopus问答" /></a>'),

	array(	"type" => "close") 
);
// 定义管理面板
function mytheme_add_admin() {
global $themename, $shortname, $options;
if ( $_GET['page'] == basename(__FILE__) ) {
	if ( 'save' == $_REQUEST['action'] ) {
		foreach ($options as $value) {
		update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
foreach ($options as $value) {
	if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
	header("Location: admin.php?page=theme_options.php&saved=true");
die;
}
else if( 'reset' == $_REQUEST['action'] ) {
	foreach ($options as $value) {
		delete_option( $value['id'] ); }
	header("Location: admin.php?page=theme_options.php&reset=true");
die;
}
} 
add_theme_page($themename." 主题设置", "主题选项", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}

function mytheme_add_init() {
$file_dir=get_bloginfo('template_directory');
wp_enqueue_style("functions", $file_dir."/includes/options/options.css", false, "1.0", "all");
wp_enqueue_script("rm_script", $file_dir."/includes/options/rm_script.js", false, "1.0");
}
function mytheme_admin() { 
global $themename, $shortname, $options;
$i=0; 
if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' 主题设置已保存</strong></p></div>';
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' 主题已重新设置</strong></p></div>';
?>
<div class="wrap rm_wrap">

<h2><?php echo $themename; ?>主题选项</h2>
<p>当前主题: <?php echo $themename;?> 定制版 | 设计者：<a href="http://Web.Menzil.Cn" target="_blank">Menzil Team</a> | <a href="http://Web.Menzil.Cn" target="_blank">查看更新</a> | <a href="http://Web.Menzil.Cn" target="_blank">常见问题</a></p>
<div class="rm_opts">
<form method="post">
  <?php foreach ($options as $value) { switch ( $value['type'] ) { case "open": ?>
  <?php break; case "close": ?>
</div>

</div>




<?php break; case "title": ?>
<?php break; case 'text': ?>

<div class="rm_input rm_text">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" size="25" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
	<small><?php echo $value['desc']; ?></small>
	<small><?php echo $value['section']; ?></small>
	<div class="clearfix"></div>
</div>

<?php break; case 'textarea': ?>

<div class="rm_input rm_textarea">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" style = "width:100%"><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>
	<small><?php echo $value['desc']; ?></small>
	<small><?php echo $value['section']; ?></small>
 	 <div class="clearfix"></div> 
</div>
  
<?php break; case 'select': ?>



<div class="rm_input rm_select">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>	
	<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
		 <?php foreach ($value['options'] as $key => $option) { ?>
      <option <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?> value="<?php echo $option ?>"><?php echo $key; ?></option>
      <?php } ?>
	</select>
	<small><?php echo $value['desc']; ?></small>
	<small><?php echo $value['section']; ?></small>
	<div class="clearfix"></div>
</div>

<?php break; case "checkbox": ?>

<div class="rm_input rm_checkbox">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>	
	<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
	<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
	<small><?php echo $value['desc']; ?></small>
	<small><?php echo $value['section']; ?></small>
	<div class="clearfix"></div>
</div>

<?php break; case "section": $i++ ?>

<div class="rm_section">
	<div class="rm_title">
		<h3><img src="<?php bloginfo('template_directory')?>/includes/options/clear.png" class="inactive" alt="""><?php echo $value['name']; ?></h3>
		<span class="submit"><input type="submit" class="button-primary" name="save<?php echo $i; ?>" value="保存设置" /></span>
		<div class="clearfix"></div>
	</div>
<div class="rm_options">
<?php break;
}
}
?>
<?php
function show_id() {
	global $wpdb;
	$request = "SELECT $wpdb->terms.term_id, name FROM $wpdb->terms ";
	$request .= " LEFT JOIN $wpdb->term_taxonomy ON $wpdb->term_taxonomy.term_id = $wpdb->terms.term_id ";
	$request .= " WHERE $wpdb->term_taxonomy.taxonomy = 'category' ";
	$request .= " ORDER BY term_id asc";
	$categorys = $wpdb->get_results($request);
	foreach ($categorys as $category) { 
		$output = '<ol>'.$category->name."&nbsp;［<font color=#0196e3>".$category->term_id.'</font>］</ol>';
		echo $output;
	}
}
?>
<span class="show_id">
    <h4>分类对应 ID</h4>
    <?php show_id();?>
</span>
<input type="hidden" name="action" value="save" />
</form>
<form method="post">
	<p class="submit">
		<input type="submit" class="button-primary" name="reset" value="恢复默认设置" />
		<input type="hidden" name="action" value="reset" />
		提示：此按钮将恢复到主题初始状态，您的所有设置将消失！
	</p>
</form>
</div>
<?php }?>
<?php
add_action('admin_init', 'mytheme_add_init');
add_action('admin_menu', 'mytheme_add_admin');
?>
