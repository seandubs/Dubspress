<?php
/**
 * The home template file.
 *
 * This is the template for the static Blog page. Goal is to have it
 * sort the columns of posts and keep it pretty.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package DubsPress
 */

get_header(); 
?>
<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;
			
			?>			
			<div class="grid-wrapper row">
			<?php 
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );
			endwhile; ?>
			</div><!-- .grid-wrapper -->
			<?php
			if($wp_query->max_num_pages > 1): ?>
			<nav class="pagination">
				<h5>
					<?php next_posts_link(__('LOAD MORE', 'dubspress'), 0); ?>
				</h5>
			</nav>
			<div id="loading-is"></div>
			<?php
			endif;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
		
</div><!-- .container -->
<?php
get_footer();
