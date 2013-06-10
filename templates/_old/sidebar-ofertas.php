			<!-- sidebar de PAGE-OFERTAS -->
				
            	<div id="sidebar-ofertas" class="sidebar four columns" role="complementary">

					<div class="twelve columns">
						<?php include 'sidebar-widget-mega-oferta.php'; ?> 
                        
						<?php if ( is_active_sidebar( 'ofertas' ) ) : ?>

							<?php dynamic_sidebar( 'ofertas' ); ?>

						<?php else : ?>

							<!-- This content shows up if there are no widgets defined in the backend. -->
							
							<?php /*?><div class="alert-box">Please activate some Widgets.</div><?php */?>

						<?php endif; ?>
                        <?php $vo_id = $_GET['vid']; ?>
						<?php if (isset($vo_id)) { ?>
                            <div class="widgetparser panel">
                                <h4>Otras Ofertas...</h4>
                                <?php 	 
                                $ruta = get_template_directory_uri() . '/XML-parser/index.php?category=nuestrasofertas&widget=true&order=random';
                                $a = file_get_contents($ruta);
                                echo $a; ?>              
                            </div>
                        <?php } ?>
                        
                        <?php include 'sidebar-widget-rrss.php'; ?>

					</div>

				</div>
              