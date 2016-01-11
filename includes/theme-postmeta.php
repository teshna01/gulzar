<?php


/*----------------------------------*/
/* Custom Posts Options				*/
/*----------------------------------*/


add_action('save_post', 'custom_add_save');

function custom_add_save($postID){
	// called after a post or page is saved
	if($parent_id = wp_is_post_revision($postID))
	{
	  $postID = $parent_id;
	}
	
	if ($_POST['save'] || $_POST['publish']) {
		update_custom_meta($postID, $_POST['menzil_post_template'], 'menzil_post_template');
	}
}

function update_custom_meta($postID, $newvalue, $field_name) {
	// To create new meta
	if(!get_post_meta($postID, $field_name)){
		add_post_meta($postID, $field_name, $newvalue);
	}else{
		// or to update existing meta
		update_post_meta($postID, $field_name, $newvalue);
	}
	
}

// Custom Post Layouts
function menzil_post_layout_options() {
	global $post;
	$postLayouts = array('side-right' => 'Sidebar on the right', 'side-left' => 'Sidebar on the left', 'full' => 'Full Width');
	?>

	<style>
	.RadioClass{  
		display: none;
	} 
	
	.RadioLabelClass {
		margin-right: 10px;
	}
	
	img.layout-select {
		border: solid 4px #c0cdd6;
		border-radius: 5px;
	}
	
	.RadioSelected img.layout-select{
		border: solid 4px #3173b2;
	}
	</style>

	<script type="text/javascript">  
	jQuery(document).ready(
	function($)
	{
		$(".RadioClass").change(function(){  
		    if($(this).is(":checked")){  
		        $(".RadioSelected:not(:checked)").removeClass("RadioSelected");  
		        $(this).next("label").addClass("RadioSelected");  
		    }  
		}); 
	});  
	</script>

	<fieldset>
		<div>
			 
			<p>
			
			<?php
			foreach ($postLayouts as $key => $value)
			{
				?>
				<input id="<?php echo $key; ?>" type="radio" class="RadioClass" name="menzil_post_template" value="<?php echo $key; ?>"<?php if (get_post_meta($post->ID, 'menzil_post_template', true) == $key) { echo' checked="checked"'; } ?> />
				<label for="<?php echo $key; ?>" class="RadioLabelClass<?php if (get_post_meta($post->ID, 'menzil_post_template', true) == $key) { echo' RadioSelected"'; } ?>">
				<img src="<?php echo menzil::$menzilPath; ?>/assets/images/layout-<?php echo $key; ?>.png" alt="<?php echo $value; ?>" title="<?php echo $value; ?>" class="layout-select" /></label>
			<?php
			} 
			?>

			</p>
			
  		</div>
	</fieldset>
	<?php } ?>
<?php
$menzil_featured_fields = array(
	array(
		"name"		=> "menzil_is_featured",
		"label"		=> "YES",
		"type"		=> "checkbox"
	)	// checkbox
	);


function menzil_featured_meta( $post_data, $meta_info ) {
	global $post, $menzil_featured_fields;
	echo '<div class="menzil_panel"><input type="hidden" name="menzil_featured_metaes_nonce" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
	foreach( $menzil_featured_fields as $o ){
		$val = get_post_meta( $post->ID, $o['name'], true );
		echo '<p>';

		switch ( $o['type'] ){
			case "checkbox":
				$isChecked = ( $val == 1 ? 'checked="checked"' : '' ); // we store checked checkboxes as 1
				echo '<input type="checkbox" name="' . $o['name'] . '" id="' . $o['name'] . '" ' . $isChecked . ' /> <label for="menzil_is_featured" >' . $o['label'] . '</label>';
			break; // checkbox

			case "text":
				default:
				echo '<input type="text" name="' . $o['name'] . '" id="' . $o['name'] . '" value="' . $val . '" placeholder="' . $o['label'] . '" />';
			break; // text & default

			 
		}// switch

	}// foreach
	echo '</div>';
?>

<style type="text/css" media="screen">
	.menzil_panel input[type="text"],
	.menzil_panel textarea {
		width:100%;
	}
	.menzil_panel .desc {
		text-align:right;
	}
 
</style>

<?php 
}

function menzil_create_featured_meta() {
	if ( function_exists( 'add_meta_box' ) ) {
		add_meta_box( 'menzil_featured_meta', 'Show this post thubnail at home page slider?(610*20)', 'menzil_featured_meta', 'post', 'side', 'high' );
	}
}

function menzil_save_featured_meta( $post_id ) {

	global $post, $post_id, $menzil_featured_fields;
	if ( in_array( $_REQUEST['post_type'], array('page') ) ) {
		if ( !current_user_can( 'edit_page', $post_id ) ) {return $post_id;}
	} else {
		if ( !current_user_can( 'edit_post', $post_id ) ) {return $post_id;}
	}

	foreach($menzil_featured_fields as $o){
		if ( !wp_verify_nonce( $_REQUEST['menzil_featured_metaes_nonce'], plugin_basename(__FILE__) )) {
			return $post_id;
		}
		switch ($o['type']){
			case "checkbox":
				update_post_meta( $post_id, $o['name'], isset( $_REQUEST[$o['name']] ) );
			break;
			default:
				update_post_meta($post_id, $o['name'], $_REQUEST[$o['name']]);
			break;
		}
	}
}
add_action( 'admin_menu', 'menzil_create_featured_meta' );  
add_action( 'save_post', 'menzil_save_featured_meta' );
