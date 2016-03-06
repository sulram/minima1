<?php $base = app_template_base(); ?>
 
<?php if(!isset($_POST['ajax'])) get_header( $base ); ?>
	<?php include app_template_path(); ?>
<?php if(!isset($_POST['ajax'])) get_footer( $base ); ?>