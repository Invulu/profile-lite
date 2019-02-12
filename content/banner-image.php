<?php
/**
 * This template is used to display the banner image on posts and pages.
 *
 * @package Profile Lite
 * @since Profile Lite 1.0
 */

?>

<?php $front_page = is_front_page(); ?>
<?php $header_image = get_header_image(); ?>
<?php $thumb = ( '' != get_the_post_thumbnail() ) ? wp_get_attachment_image_src( get_post_thumbnail_id(), 'profile-featured-large' ) : false; ?>

<?php if ( has_post_thumbnail() ) { ?>

	<!-- BEGIN .row -->
	<header class="row" role="banner">

		<div id="custom-header" class="featured-img banner-img" style="background-image: url(<?php echo esc_url( $thumb[0] ); ?>);">
			<?php if ( is_page() && '1' == get_theme_mod( 'display_img_title_page', '1' ) || is_single() && '1' == get_theme_mod( 'display_img_title_post', '1' ) ) { ?>
				<div class="img-title vertical-center">
					<h1 class="img-headline"><?php the_title(); ?></h1>
					<?php if ( is_single() && '1' == get_theme_mod( 'display_img_title_post', '1' ) ) { ?>
						<div class="post-author">
							<p><?php profile_lite_posted_on(); ?> <?php esc_html_e( 'by', 'profile-lite' ); ?> <?php the_post(); ?><?php echo get_the_author(); ?><?php rewind_posts(); ?></p>
						</div>
					<?php } ?>
				</div>
			<?php } ?>
			<?php the_post_thumbnail( 'profile-featured-large' ); ?>
		</div>

	<!-- END .row -->
	</header>

<?php } elseif ( $front_page && is_page() && has_custom_header() ) { ?>

	<!-- BEGIN .row -->
	<header class="row" role="banner">

		<div class="featured-img banner-img" <?php if ( ! empty( $header_image ) ) { ?>
			style="background-image: url(<?php header_image(); ?>);"<?php } ?>>
			<?php if ( '1' == get_theme_mod( 'display_img_title_page', '1' ) ) { ?>
			<div class="img-title vertical-center">
				<h1 class="img-headline"><?php the_title(); ?></h1>
			</div>
			<?php } ?>
			<?php the_custom_header_markup(); ?>
		</div>

	<!-- END .row -->
	</header>

<?php } ?>
