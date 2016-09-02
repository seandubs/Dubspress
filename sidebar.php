<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DubsPress
 */

$page_id = get_queried_object_id();
global $sidebar_position;
global $sidebar_selection;
 
if ( ! is_active_sidebar( $sidebar_selection ) ) {
	return;
}
$secondaryClass;
if($sidebar_position == 'left') {
	$secondaryClass = 'col-xs-12 col-sm-4 col-sm-pull-8';
} else {
	$secondaryClass = 'col-xs-12 col-sm-4';
}

?>

<aside id="secondary" class="widget-area <?php echo $secondaryClass; ?>" role="complementary">
	<?php dynamic_sidebar( $sidebar_selection ); ?>
</aside><!-- #secondary -->
