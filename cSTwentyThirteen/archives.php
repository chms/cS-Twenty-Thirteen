<?php
/*
Template Name: Archives
*/
get_header(); ?>
<div class="entry-content-page">
<div id="container">
	<div id="content" role="main" class="cSarchive">
		<div class="posts_list">
		<?php get_search_form(); ?>
<!-- Quary the leatest 15 posts -->
<h2>Latest 15 Posts</h2>
<?php query_posts('post_type=post&posts_per_page=15'); ?>
<?php if ( have_posts() ) : ?>
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>,
			<?php endwhile; ?>
	<?php endif; ?>
<?php wp_reset_query(); ?>
</div><!-- .posts_list -->

		
		
		<h2>Archives by Month</h2>
			<?php wp_get_archives('type=monthly&format=custom&after=,'); ?>
		
		<h2>Archives by Tags</h2>
			  <?php wp_tag_cloud('smallest=0.6&largest=3&unit=rem'); ?> 
	</div><!-- #content -->
</div><!-- #container -->
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>