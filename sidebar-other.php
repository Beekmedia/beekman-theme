				<div id="other-sb" class="sidebar m-all t-1of3 d-2of7 last-col cf" role="complementary">

					<?php if ( is_active_sidebar( 'other-work' ) ) : ?>

						<?php dynamic_sidebar( 'other-work' ); ?>

					<?php else : ?>

						<?php
							/*
							 * This content shows up if there are no widgets defined in the backend.
							*/
						?>

						<div class="no-widgets">
							<p><?php _e( 'This is a widget ready area. Add some and they will appear here.', 'beekmantheme' );  ?></p>
						</div>

					<?php endif; ?>

				</div>