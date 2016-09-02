<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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
		<div id="primary" class="content-area <?php echo $primaryClass; ?>">
			<main id="main" class="site-main" role="main">

				<section class="error-404 not-found">
					<header class="page-header">
						<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'dubspress' ); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content">
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'dubspress' ); ?></p>

						<?php
							get_search_form();

							the_widget( 'WP_Widget_Recent_Posts' );

							// Only show the widget if site has multiple categories.
							if ( dubspress_categorized_blog() ) :
						?>

						<div class="widget widget_categories">
							<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'dubspress' ); ?></h2>
							<ul>
							<?php
								wp_list_categories( array(
									'orderby'    => 'count',
									'order'      => 'DESC',
									'show_count' => 1,
									'title_li'   => '',
									'number'     => 10,
								) );
							?>
							</ul>
						</div><!-- .widget -->

						<?php
							endif;

							/* translators: %1$s: smiley */
							$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'dubspress' ), convert_smilies( ':)' ) ) . '</p>';
							the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );

							the_widget( 'WP_Widget_Tag_Cloud' );
						?>

					</div><!-- .page-content -->
				</section><!-- .error-404 -->

			</main><!-- #main -->
		</div><!-- #primary -->
		<?php
		if( ($sidebar_position == 'right' || $sidebar_position == 'left') && is_active_sidebar($sidebar_selection) ){
			get_sidebar();
		}
		?>
		
	</div><!-- .row -->	
</div><!-- .container -->
<?php
get_footer();
