				<div id="home-after-sb" class="d-all t-all m-all" role="complementary">

					<?php if ( is_active_sidebar( 'home-after' ) ) : ?>

						<?php dynamic_sidebar( 'home-after' ); ?>

					<?php else : ?>

						<?php
							/*
							 * This content shows up if there are no widgets defined in the backend.
							*/
						?>

						<div class="no-widgets">
							<p><?php _e( 'Add some widgets!', 'beekman-theme' );  ?></p>
						</div>

					<?php endif; ?>

				</div>
