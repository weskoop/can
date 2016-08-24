<?php
/**
 * Can, The Whole Theme
 *
 * @package can
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

	<header id="header" class="site-header" role="banner">

		<a class="site-home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
			<h1 id="site-title" class="site-title"><?php bloginfo( 'name' ); ?></h1>
			<p id="site-description" class="site-description"><?php bloginfo( 'description' ); ?></p>
		</a>

		<nav id="site-navigation" class="site-navigation" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav>

	</header>

	<?php if ( have_posts() && !is_search() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<header class="entry-header">
					<h1 class="entry-title">
						<?php the_title(); ?>
					</h1>
				</header>

				<div class="entry-content">
					<?php the_content(); ?>
				</div>

			</article>

		<?php endwhile; ?>
	<?php else : ?>

		<div id="post-0" class="404 hentry">

			<header class="entry-header">

				<h1 class="entry-title">
					<?php
						if ( is_404() ) {
							_e( '404 Not Found', 'can' );
						} else {
							_e( 'Nothing Found Here', 'can' );
						}
					?>
				</h1>

			</header>

			<div class="entry-content typeset">

				<p><?php _e( 'Sorry, nothing.', 'can' ); ?></p>

			</div>

		</div>

	<?php endif; ?>

	<?php wp_footer(); ?>
</body>
</html>
