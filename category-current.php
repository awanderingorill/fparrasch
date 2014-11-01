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
				<?php foreach ($pieces as $piece): ?>
					<div class="slideshow">
						
						<div class="ten columns piece-image">

							<img src="<?php echo $piece[guid]; ?>">

						</div>
						<div class="three columns piece-caption">

							<i class="fa fa-angle-left" id="left-arrow"></i> <i class="fa fa-angle-right" id="right-arrow"></i>

							<p>
								<?php echo $piece[post_excerpt]; ?>
							</p>

						</div>
					</div>
				<? endforeach; ?>
			</div>

			<div id="press" class="ten columns">

				<?php foreach ($press as $article): ?>

					<a href="<?php echo $article[guid] ?>"><?php echo $article[post_title] ?></a>

				<?php endforeach; ?>

			</div>

		</div>
	</article>


</div>

<?php get_footer(); ?>
