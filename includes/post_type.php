<?php
//文章类型
add_action('init', 'ashu_post_type');
add_action('init', 'ashu_post_taxonomy');
function ashu_post_type() {
	/**********لايھە*****************/
	$labels = array(
		'name' => 'لايھە',
		'singular_name' => 'لايھە',
		'add_new' => 'قوشۇش',
		'add_new_item' => 'يېڭى لايھە قوشۇش',
		'edit_item' => 'تەھرىرلەش',
		'new_item' => 'يېڭى لايھە',
		'view_item' => 'كۆرۈش',
		'search_items' => 'ئىزدەش',
		'menu_name' => 'لايھە'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => true,
		'rewrite' => array('slug'=>'details','with_front' => false),
		'capability_type' => 'post',
		'has_archive' => true, 
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','author','thumbnail','excerpt','comments','custom-fields'),
		'map_meta_cap' => true,
	);
	register_post_type('detail',$args);
	
	/**********公告*****************/
	$labels2 = array(
		'name' => 'ئېلان',
		'singular_name' => 'ئېلان',
		'add_new' => 'ئېلان قۇشۇش',
		'add_new_item' => 'يېڭى ئالان قوشۇش',
		'edit_item' => 'تەھرىرلەش',
		'new_item' => 'يېڭى ئېلان',
		'view_item' => 'كۆرۈش',
		'search_items' => 'ئىزدەش',
		'menu_name' => 'ئېلان'
	);
	$args2 = array(
		'labels' => $labels2,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => true,
		'rewrite' => array('slug'=>'notices'),
		'capability_type' => 'post',
		'has_archive' => true, 
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','author','excerpt','comments','custom-fields'),
		'map_meta_cap' => true,
	);
	register_post_type('notice',$args2);
}

function ashu_post_taxonomy() {
	

	
	
	/*************لايھە سەھىپىسى*****************/
	$labels2 = array(
		'name' => 'لايھە سەھىپىسى',
		'singular_name' => 'سەھىپە',
		'search_items' =>  'ئىزدەش' ,
		'popular_items' => 'ئاۋات' ,
		'all_items' => 'ھەممە' ,
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => 'تەھرىرلەش' , 
		'update_item' => 'يېڭىلاش' ,
		'add_new_item' => 'قوشۇش' ,
		'new_item_name' => 'لايھە سەھىپە نامى',
		'menu_name' => 'لايھە سەھىپە تۈرى',
	); 

	register_taxonomy(
		'shop',
		array('detail'),
		array(
			'hierarchical' => true,
			'labels' => $labels2,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'shop' ),
		)
	);
	
	/*************لايھە خەتكۈشلىرى*****************/
	$labels3 = array(
		'name' => 'لايھە خەتكۈشلىرى',
		'singular_name' => 'لايھە خەتكۈشلىرى',
		'search_items' =>  'ئىزدەش' ,
		'popular_items' => 'ئاۋات' ,
		'all_items' => 'ھەممە' ,
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => 'تەھرىرلەش' , 
		'update_item' => 'يېڭىلاش' ,
		'add_new_item' => 'قوشۇش' ,
		'new_item_name' => 'لايھە خەتكۈشلىرى نامى',
		'menu_name' => 'لايھە خەتكۈشلىرى',
	); 

	register_taxonomy(
		'detail_tag',
		'detail',
		array(
			'labels' => $labels3,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'details_tag','with_front' => false  ),
		)
	);
}
?>