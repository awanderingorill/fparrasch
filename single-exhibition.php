<?php get_header(); ?>

<div class="container">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>">

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

		<header class="sixteen columns">

			<h1><?php the_title(); ?> <span class="gray-text"><?php echo $artists ?></span></h1>
			<p>
				<?php echo $start_date ?> - <?php echo $end_date ?>
			</p>

		</header>

		<div class="section">


			<!-- side menu -->
			<div class="three columns side-menu">

				<?php if (!empty($pieces)): ?>
					<a href="#" id="pieces-link">images</a>
				<?php endif ?>

				<?php if (!empty($bio)): ?>
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
