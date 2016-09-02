<?php
/**
 * This is the template for displaying contact pages.
 *
 * Template Name: Contact
 * @package DubsPress
 * @since Dubspress 1.0
 */

get_header();
$page_id = get_queried_object_id();
$sidebar_position = get_post_meta( $page_id, 'dubspress_sidebar_position', true );
$sidebar_selection = get_post_meta( $page_id, 'dubspress_sidebar_select', true );
//echo '<h3>sidebar_position is ' .$sidebar_position. ', sidebar_selection is ' .$sidebar_selection. '.</h3>';

$primaryClass;
if($sidebar_position == 'right'){
	$primaryClass = 'col-xs-12 col-sm-8';
} elseif($sidebar_position == 'left') {
	$primaryClass = 'col-xs-12 col-sm-8 col-sm-push-4';
} else {
	$primaryClass = 'col-xs-12';
}

$showmap = get_theme_mod( 'dubspress_contact_showmap' );

?>
<div class="container">
	<div class="row">
		<div id="primary" class="content-area <?php echo $primaryClass; ?>">
			<main id="main" class="site-main" role="main">
			
				<?php if ( $showmap ) { ?>
					<?php get_template_part( 'template-parts/contact', 'map' ); ?>
				<?php } ?>

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

			</main><!-- #main -->
		</div><!-- #primary -->
	<?php
	if($sidebar_position == 'right' || $sidebar_position == 'left'){
		get_sidebar();
	}
	?>
	</div><!-- .row -->
</div><!-- .container -->
<?php
get_footer();