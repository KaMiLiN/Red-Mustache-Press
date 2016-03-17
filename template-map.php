<?php
/** 
* Template Name: Site Map Page *
 * @package Fluffy_Child */



get_header(); ?> 
 <div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			
			<?php //displays posts on the page
			 if (have_posts()) : 
			while (have_posts()) : the_post(); ?>
			<article id="post- <?php the_ID(); ?>"
		 post_class();  >
			<header class="entry-header">
			<h2 class="post-title">
			<?php the_title(); ?>
			</h2> </header>
						
			<ul class="posts">
	<?php query_posts('tag=forhome&showposts=12'); while (have_posts()) : the_post(); 
	
// displays featured images of posts instead of posts themselves
if ( has_post_thumbnail()) {
  echo '<a href="' . get_permalink ($post->ID) . '" >';
  the_post_thumbnail();
  echo '</a>';
}

?>

		
	<?php 
	
	endwhile; ?>
	
	<?php wp_reset_query(); ?>
</ul>
			 
			 
			 <!-- .entry-header --> 
			 <div class="entry-content"> 
			  <?php the_content(); ?>
			 <?php wp_link_pages( array
			 ('before'=>'<div class="page-links">'.__( 'Pages:', 'underscores' ),'after'=>'</div>',) ); ?>
			 </div> 
			
			 <!-- .entry-content -->
			 </article>
			 <!-- #post-## -->
			 <?php endwhile; endif; ?>
			  
			  
			  
	
	

			 
		
			 
			
			
			
			
			
		</main><!-- #main -->
		
			</div>
		
		
		
 
	
	
	<!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>