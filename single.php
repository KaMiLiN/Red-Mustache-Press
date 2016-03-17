<?php
/**
 * The template for displaying all single posts.
 *
 * 
 * @package SashaCamilo
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );
			
		
		//creates custom fields that may be used for posts
		the_meta();
		$songs = get_post_meta($post->ID, 'songs', false); 
		if( !empty( $songs) ) : ?>
		<h4>This post is inspired by a song:</h4>
		
	 <?php foreach($songs as $song) {
		echo '<h4>'. '- '.$song.'</h4>';
		}
endif;

		$raiting = get_post_meta($post->ID, 'mood', false); 
		if( !empty( $raiting) ) : ?>
		<h4>Personal Raiting:</h4>
		
		<?php foreach($mood as $raitings) {
		echo '<h4>'. '- '.$raitings.'</h4>';
		}
		
		endif;



			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
