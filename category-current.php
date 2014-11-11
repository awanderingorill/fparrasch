<?php get_header(); ?>

<?php 
	//get the current slug 
	$slug = pods_v( 'last', 'url' );

	$params = array(
		'where'=>"category.name = '$slug'"
		);

	//get pods object
	$exhibition = pods( 'exhibition', $params );

	// get data
	$name = $exhibition->field( 'name' );
	$start_date = $exhibition->field('start_date');
	$end_date = $exhibition->field('end_date');
	$artists = $exhibition->field('artists');
	$pieces = $exhibition->field('pieces');
	$press_release = $exhibition->field('press_release');
?>

<div class="container">

	<article>

		<header class="sixteen columns">

			<h1><?php echo $name ?> <span class="gray-text"><?php echo $artists ?></span></h1>
			<p class="gray-text"><?php echo $start_date?> - <?php echo $end_date ?></p>

		</header>

		<div class="section">

			<!-- side menu -->
			<div class="three columns side-menu">

				<?php if ( !empty( $pieces ) ): ?>
					<a href="#" id="pieces-link">images</a>
				<?php endif ?>

				<?php if ( !empty( $press_release ) ) : ?>
					<a href="<?php echo $press_release[guid] ?>" id="bio-link" target="new">press release</a>
				<?php endif ?>
			</div>
			
			<!-- content -->

			<div id="pieces">
				<div id="slider">
					<ul class="thirteen columns">
					<?php foreach ($pieces as $piece): ?>
							
							<li>
								<div class="ten columns piece-image">
									<img src="<?php echo $piece[guid]; ?>">
								</div>
								<div class="two columns piece-caption">
									<div class="arrows">
										<a href="#" class="control_prev">
											<i class="fa fa-angle-left"></i>
										</a>
										<a href="#" class="control_next">
											<i class="fa fa-angle-right" class="control_next"></i>
										</a>
									</div>
									<?php echo $piece[post_excerpt]; ?>
								</div>
							</li>

					<? endforeach; ?>
					</ul>
				</div>
			</div>

		</div>
	</article>


</div>

<?php get_footer(); ?>
