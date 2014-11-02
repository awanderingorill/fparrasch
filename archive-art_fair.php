<?php get_header(); ?>

<div class="container">
	
	<div class="sixteen columns">

		<h1>
			gallery
			<span class="gray-text">
				<?php post_type_archive_title(); ?>
			</span>
		</h1>

	</div>

	<ul class="three columns">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<li>
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		</li>
	<?php endwhile; ?>
	</ul>
			
<?php else : ?>

	<article id="post-not-found" class="hentry cf">
		<header class="article-header">
			<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
		</header>
		<section class="entry-content">
			<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
		</section>
		<footer class="article-footer">
			<p><?php _e( 'This is the error message in the custom posty type archive template.', 'bonestheme' ); ?></p>
		</footer>
	</article>

<?php endif; ?>

</div>
