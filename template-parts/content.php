<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package DubsPress
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_single() ) :
			$headId = get_post_meta($post->ID,'dubspress_header_image',true);
			if ($headId) : 
				$headImg = wp_get_attachment_image_src( $headId, 'single-large' );
				$headSrc = wp_get_attachment_image_srcset( $headId, 'single-large' );
				$headSize = wp_get_attachment_image_sizes( $headId, 'single-large' );
				$headAlt = get_post_meta( $headId, '_wp_attachment_image_alt', true);
				$headTitle = get_post($headId)->post_title;
				
				echo '<img class="header-image-single" src="'.esc_url_raw($headImg[0]).'" alt="'.esc_attr($headAlt).'" title="'.esc_attr($headTitle).'" srcset="'.esc_attr($headSrc).'" sizes="'.esc_attr($headSize).'" />';
			endif;
			
			the_title( '<h1 class="entry-title">', '</h1>' );			
		else :
			if(has_post_thumbnail()):
				echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">';
				the_post_thumbnail('grid');
				echo '</a>';
			endif;
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php dubspress_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
	<?php
		if ( is_single() ) :
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'dubspress' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dubspress' ),
				'after'  => '</div>',
			) );
		
		elseif( is_home() ) :
			if( get_theme_mod('dubspress_post_excerpt') == true || !has_post_thumbnail() ):
				the_excerpt();
			endif;
		else :
			
		endif;
	?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
	<?php
		if ( is_single() ) :
		
		elseif( is_home() ) :
		
		else :
		
		endif;
		dubspress_entry_footer();
	?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
