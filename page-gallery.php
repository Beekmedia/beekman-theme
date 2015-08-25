<?php
/*
 Template Name: Project Gallery page
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

					<div id="main" class="m-all t-3of3 d-7of7 cf" role="main">

						<div id="main" class="m-all t-all d-all cf" role="main">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title"><?php the_title(); ?></h1>
									<?php if ( has_post_thumbnail() ) {
										echo '<div class="aligncenter fullwidth abs-top">';

											the_post_thumbnail('full' );
										echo '</div>';
									} //end post thumbnail
								?>


								</header>

								<section class="entry-content cf" itemprop="articleBody">
									<?php

										// the content (pretty self explanatory huh)
										the_content();
									?>
								</section>

							</article>

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'beekman-theme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'beekman-theme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page-custom.php template.', 'beekman-theme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div>
<!-- 						<?php get_sidebar('web'); ?> -->
				</div>

			</div>


<?php get_footer(); ?>
