<?php
/*
 * CUSTOM POST TYPE ARCHIVE TEMPLATE
 *
 * This is the custom post type archive template. If you edit the custom post type name,
 * you've got to change the name of this template to reflect that name change.
 *
 * For Example, if your custom post type is called "register_post_type( 'bookmarks')",
 * then your template name should be archive-bookmarks.php
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates
*/
?>

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
			


<?php bones_page_navi(); ?>

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
