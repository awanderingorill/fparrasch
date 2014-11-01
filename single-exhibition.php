<?php get_header(); ?>


<div id="content" class="container">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php
	    //get the current slug 
		$slug = pods_v( 'last', 'url' );

		//get pods object
		$exhibition = pods( 'exhibition', $slug );

		// get data
		$start_date = $exhibition->field('start_date');
		$end_date = $exhibition->field('end_date');
		$artists = $exhibition->field('artists');
		$pieces = $exhibition->field('pieces');
		$press_release = $exhibition->field('press_release');

	?>

	<article id="post-<?php the_ID(); ?>">

		<header>

			<h1><?php the_title(); ?></h1>
			<?php echo $start_date ?> - <?php echo $end_date ?>

		</header>

		<div class="container section">

			<!-- side menu -->
			<div class="three columns side-menu">

				<?php if (!empty($pieces)): ?>
					<a href="#" id="pieces-link">images</a>
				<?php endif ?>

				<?php if (!empty($press_release)): ?>
					<a href="<?php echo $press_release[guid] ?>" id="bio-link">press release (PDF)</a>
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

		</div>

	</article>

<?php endwhile; ?>

<?php else : ?>

	<article id="post-not-found" class="hentry cf">
		<header class="article-header">
			<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
		</header>
		<section class="entry-content">
			<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
		</section>
		<footer class="article-footer">
			<p><?php _e( 'This is the error message in the single-custom_type.php template.', 'bonestheme' ); ?></p>
		</footer>
	</article>
<?php endif; ?>

</div>

</div>

</div>

<?php get_footer(); ?>
