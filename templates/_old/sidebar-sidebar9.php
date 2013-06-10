			<!-- sidebar de PAGE-BUSCADOR -->

            	<div id="sidebar5" class="sidebar four columns" role="complementary">

					<div class="twelve columns">
						<?php include 'sidebar-widget-mega-oferta.php'; ?> 

						<?php if ( is_active_sidebar( 'sidebar9' ) ) : ?>

							<?php dynamic_sidebar( 'sidebar9' ); ?>

						<?php else : ?>

							<!-- This content shows up if there are no widgets defined in the backend. -->
							
							<?php /*?><div class="alert-box">Please activate some Widgets.</div><?php */?>

						<?php endif; ?>

					</div>
                    <?php include 'sidebar-widget-rrss.php'; ?>

				</div>