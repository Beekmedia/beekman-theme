<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

					<div id="main" class="m-all t-2of3 d-5of7 cf" role="main">

						<article id="post-not-found" class="hentry cf">

							<header class="article-header">

								<h1><?php _e( 'Not What You Were Looking For', 'beekman-theme' ); ?></h1>

							</header>

							<section class="entry-content">

								<p><?php _e( 'The link you were following was not found. Please try searching or browsing to locate it.', 'beekman-theme' ); ?></p>

							</section>

							<section class="search">

							<p><?php get_search_form(); ?></p>

							</section>

							<footer class="article-footer"></footer>

						</article>

					</div>

				</div>

			</div>

<?php get_footer(); ?>
