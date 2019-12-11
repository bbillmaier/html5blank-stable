<?php get_header(); ?>

<?php 
	$fields = get_fields();
	$post = get_post();
	//printArr([$fields, $post]);
	$projectTitle = $fields['project_title'];
	$projectDesc = $fields['project_description'];
	$projectImage = $fields['project_image'];
?>


	<h1><?php echo $projectTitle; ?></h1>
	<h2><?php echo $projectDesc; ?></h2>
	<?php echo $post->post_content; ?>

<?php get_footer(); ?>