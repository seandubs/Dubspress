<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package DubsPress
 */

get_header();

$sidebar_position = get_theme_mod('dubspress_search_sidebar');
$sidebar_selection = 'search-widget';
 
$primaryClass;
if($sidebar_position == 'right' && is_active_sidebar( $sidebar_selection )){
	$primaryClass = 'col-xs-12 col-sm-8';
} elseif($sidebar_position == 'left' && is_active_sidebar( $sidebar_selection )) {
	$primaryClass = 'col-xs-12 col-sm-8 col-sm-push-4';
} else {
	$primaryClass = 'col-xs-12';
}

?>
<div class="container">
	<div class="row">
		<section id="primary" class="content-area <?php echo $primaryClass; ?>">
			<main id="main" class="site-main" role="main">

			<?php
			if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'dubspress' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header><!-- .page-header -->

				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'search' );

				endwhile;

				the_posts_navigation();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

			</main><!-- #main -->
		</section><!-- #primary -->
		
		<?php
		if( ($sidebar_position == 'right' || $sidebar_position == 'left') && is_active_sidebar($sidebar_selection) ){
			get_sidebar();
		}
		?>
		
	</div><!-- .row -->
</div><!-- .container -->
<?php
get_footer();
