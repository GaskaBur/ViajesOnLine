			<!-- sidebar de MWEB-agenciadedespedidas -->

            	<div id="sidebar3" class="sidebar four columns" role="complementary">

					<div class="twelve columns">
						<?php //include 'sidebar-widget-mega-oferta.php'; ?> 
                        <?php include 'sidebar-widget-rrss-ad.php'; ?>
						<?php if ( is_active_sidebar( 'sidebar3' ) ) : ?>

							<?php dynamic_sidebar( 'sidebar3' ); ?>

						<?php else : ?>

							<!-- This content shows up if there are no widgets defined in the backend. -->
							
							<?php /*?><div class="alert-box">Please activate some Widgets.</div><?php */?>

						<?php endif; ?>
                        <?php //$vo_id = $_GET['vid']; ?>
						<?php //if (isset($vo_id)) { ?>
                            <div class="widgetparser panel">
                                <h4>Otras Ofertas...</h4>
                                <?php 	 
                                $ruta = get_template_directory_uri() . '/XML-parser/index.php?category=agenciadedespedidas&widget=true&order=random';
                                $a = file_get_contents($ruta);
                                echo $a; ?>              
                            </div>
                        <?php //} ?>
                        
                        

					</div>

				</div>