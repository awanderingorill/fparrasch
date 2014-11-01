<?php get_header(); ?>

<?php 

// call the pods
$exhibition = pods( 'exhibition' ); 
$exhibition->find( $params ); 


// find() 
$params = array( 
    'where'=>"category.name = 'current'" 
); 

// Run the find 
$exhibition = pods( 'exhibition', $params ); 

// Loop through the records returned 
while ( $exhibition->fetch() ) { 


    echo $exhibition->display( 'name' ) . "\n";
    echo $exhibition->display('start_date') . "\n";
    echo $exhibition->display('end_date') . "\n";

}

?>

<div class="container">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>">

		<header class="sixteen columns">

			<h1><?php the_title(); ?></h1>

		</header>

		<div class="section">

			<?php
	      		//get the current slug 
				$slug = pods_v( 'last', 'url' );

	      		//get pods object
				$artist = pods( 'artist', $slug );

				// get data
				$bio = $artist->field('bio');
				$pieces = $artist->field('pieces');
				$press = $artist->field('press');
			?>

			<!-- side menu -->
			<div class="three columns side-menu">

				<?php if (!empty($pieces)): ?>
					<a href="#" id="pieces-link">images</a>
				<?php endif ?>

				<?php if (!empty($bio)): ?>
					<a href="<?php echo $bio[guid] ?>" id="bio-link" target="new">bio</a>
				<?php endif ?>

				<?php if (!empty($press)): ?>
					<a href="#" id="press-link">press</a>
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
