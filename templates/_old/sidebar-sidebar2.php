				<!-- sidebar de HOMEPAGE -->

                <div id="sidebar2" class="sidebar four columns" role="complementary">

					<div class="">                    
                    <?php include 'sidebar-widget-mega-oferta.php'; ?>                        
                        
						<?php if ( is_active_sidebar( 'sidebar2' ) ) : ?>

							<?php dynamic_sidebar( 'sidebar2' ); ?>

						<?php else : ?>

							<!-- This content shows up if there are no widgets defined in the backend. -->
							
							<?php /*?><div class="alert-box">Please activate some Widgets.</div><?php */?>

						<?php endif; ?>
                        
						<?php include 'sidebar-widget-rrss.php'; ?>

					</div>

				</div>