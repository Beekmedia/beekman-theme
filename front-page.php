<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">
					<div id="main" role="main">


					<div class="m-3of3 t-2of3 d-5of7 floatright">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

							<header class="article-header">

								<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>

							</header> <?php // end article header ?>

							<section class="entry-content cf" itemprop="articleBody">
							<?php if ( has_post_thumbnail() ) {
									echo '<div class="alignright">';
									the_post_thumbnail('medium' );
									echo '</div>';
								} //end post thumbnail
									// the content (pretty self explanatory huh)
									the_content();
								?>

							</section> <?php // end article section ?>

						</article>

						<?php endwhile; else : ?>

								<article id="post-not-found" class="hentry cf">
									<header class="article-header">
										<h1><?php _e( 'Oops, Post Not Found!', 'beekmantheme' ); ?></h1>
									</header>
									<section class="entry-content">
										<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'beekmantheme' ); ?></p>
									</section>
									<footer class="article-footer">
											<p><?php _e( 'This is the error message in the page.php template.', 'beekmantheme' ); ?></p>
									</footer>
								</article>

							<?php endif; ?>
						</div>
					<?php get_sidebar('home'); ?><!--  homepage sidebar is floated to left -->
					<?php get_template_part('library/after_content', 'home'); ?>
				</div>

			</div>

		</div>

<?php get_footer(); ?>
