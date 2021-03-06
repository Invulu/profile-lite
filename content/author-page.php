<?php
/**
 * This template is used to display the author page content.
 *
 * @package Profile Lite
 * @since Profile Lite 1.0
 */

?>

<h1 class="entry-header"><?php echo esc_html( get_the_author() ); ?></h1>

<!-- BEGIN .entry-content -->
<article class="entry-content">

	<div class="author-avatar">
		<?php echo get_avatar( get_the_author_meta( 'user_email' ), 120 ); ?>
	</div>

	<!-- BEGIN .author-column -->
	<div class="author-column">

		<?php $website = get_the_author_meta( 'user_url' ); ?>
		<?php if ( ! empty( $website ) ) : ?>
			<h6><?php esc_html_e( 'Website:', 'profile-lite' ); ?></h6>
			<p><a href="<?php echo esc_url( $website ); ?>" rel="bookmark" title="<?php esc_attr_e( 'Link to author page', 'profile-lite' ); ?>" target="_blank"><?php echo esc_url( $website ); ?></a></p>
		<?php endif; ?>

		<?php $description = get_the_author_meta( 'description' ); ?>
		<?php if ( ! empty( $description ) ) : ?>
			<h6><?php esc_html_e( 'Profile:', 'profile-lite' ); ?></h6>
			<p><?php echo wp_kses_post( $description ); ?></p>
		<?php endif; ?>

		<?php if ( have_posts() ) : ?>

			<h6>
				<?php
				/* Translators: author link */
				printf( esc_html__( 'Posts by %1$s:', 'profile-lite' ), get_the_author() );
				?>
			</h6>

			<ul class="author-posts">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php endwhile; ?>
			</ul>

			<?php
				the_posts_pagination( array(
					'prev_text' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Previous Page', 'profile-lite' ) . ' </span>&laquo;',
					'next_text' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Next Page', 'profile-lite' ) . ' </span>&raquo;',
				) );
			?>

		<?php else : ?>
			<p><?php esc_html_e( 'No posts by this author.', 'profile-lite' ); ?></p>
		<?php endif; ?>

	<!-- END .author-column -->
	</div>

<!-- END .entry-content -->
</article>
