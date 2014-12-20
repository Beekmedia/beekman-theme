<div id="home-sb" class="sidebar m-all t-1of3 d-2of7 alignleft" role="complementary">

	<?php if ( is_active_sidebar( 'home' ) ) : ?>

		<?php dynamic_sidebar( 'home' ); ?>

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
