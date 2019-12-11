<?php get_header(); ?>

<div class="grid">
<?php
	$projects = get_projects();
	//printArr($projects);

	foreach ($projects as $project) {
		//$project is an object not an array
		//printArr($project);

		$projectFields = get_fields($project->ID);
		//printArr($projectFields);

		$projectGUID = $project->guid;

		$projectImage = $projectFields['project_image'];
		$projectTitle = $projectFields['project_title'];
		$projectDesc = $projectFields['project_description'];
		$projectSize = $projectFields['grid_width'];
		?>

		<div id="single-project-<?php echo $project->ID; ?>" class="single-project-container grid-item grid-item--width<?php echo $projectSize; ?>">
			<div class="single-project-container-inner">
				<div class="project-image-container">
					<img src="<?php echo $projectImage; ?>">
				</div>
				<div class="project-info-container">
					<h3><?php echo $projectTitle; ?></h3>
					<p><?php echo $projectDesc; ?></p>
				</div>
			</div>
		</div>

		<?php
	}	
?>
</div>
<?php get_footer(); ?>