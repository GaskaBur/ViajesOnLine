			<!-- sidebar de PAGE-MEGA-OFERTAS -->

            	<div id="sidebar4" class="sidebar four columns" role="complementary">

					<div class="twelve columns">
						
						<?php if ( is_active_sidebar( 'sidebar4' ) ) : ?>

							<?php dynamic_sidebar( 'sidebar4' ); ?>

						<?php else : ?>

							<!-- This content shows up if there are no widgets defined in the backend. -->
							
							<?php /*?><div class="alert-box">Please activate some Widgets.</div><?php */?>

						<?php endif; ?>
						
                            <div class="widgetparser panel">
                                <h4>+ ofertas de viajes</h4>
                                <?php 	 
                                $ruta = get_template_directory_uri() . '/XML-parser/index.php?category=nuestrasofertas&widget=true&order=random';
                                $a = file_get_contents($ruta);
                                echo $a; ?>              
                            </div>
                            
                            <?php include 'sidebar-widget-rrss.php'; ?>
                        
					</div>
                    

				</div>