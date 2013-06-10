<?php
/*
Template Name: Page ofertas
*/
//$vo_id = $_GET['vid'];
//$vo_cat = $_GET['category'];
//$vo_loc = $_GET['localizacion']; « Como variables globales definidas en header.php
?>
<?php get_header(); ?>
			
    <div id="content">
    	<?php get_sidebar('ofertas');  ?>    
        <div id="main" class="eight columns clearfix" role="main">
        	                     
            <h3>Ofertas de Viajes</h3>
            <hr class="barra">
        
            <?php 
            if (isset($vo_id)) {
				?> <a href="./" class="volver" title="Listado de ofertas de viaje">Volver al listado de ofertas de viajes</a><?php  
				 $ruta = get_template_directory_uri() . '/XML-parser/index.php?id=' . $vo_id . '&category=' . $vo_cat . '&localizacion=' . $vo_loc . '';
				 $a = file_get_contents($ruta);
           		 echo $a; ?>
                     <hr />					 
					 <script type="text/javascript">
					  $(document).ready(function() {
						$("#buttonForModal").click(function() {
						  $("#modalContenido").reveal();
						});
					  });
					</script>
                         <div id="modalContenido" class="reveal-modal expand"> 
                         <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <?php the_content(); ?>
                        <?php endwhile; endif;?>
                         <a class="close-reveal-modal">&#215;</a>
                         </div> <!-- Modal -->
					 
                <?php 
            }else{
				?> <p class="slogan"><?php the_excerpt(); ?></p ><?php 
                $ruta = get_template_directory_uri() . '/XML-parser/index.php?category=nuestrasofertas&order=true';
				$a = file_get_contents($ruta);
            	echo $a;?>
				<hr /><h5>¿No encuentras el viajes que buscas?</h5>
                <p>No te preocupes, contacta con nosotros y preparamos tu viaje a medida: <br />
                en el teléfono <strong>902 052 400</strong>, vía <a href="mailto:info@viajes-online.net">info@viajes-online.net</a>.</p>
            <?php }?>
        
        
           <?php /*?> <ul class="ultimas-ofertas">
				<?php wp_reset_query(); ?> 
                <?php query_posts ( 'post_type=ofertas&orderby=date&order=desc' ); ?>  
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                
        
                <li id="post-<?php the_ID(); ?>" <?php post_class('clearfix four column'); ?> role="article">
                        <h5><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                        <div class="vo-ofertas-foto">
                            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail( 'medium' ); ?></a>
                        </div>					
                        
                        
                        
                        <?php //if (get('precio')!="" && is_null(get('precio')) == 0 ) {?>  
                        <div class="precio"><span>
                            <?php echo get_post_meta(the_ID(), 'precio', true); ?> €</span>
                        </div>
                        <?php //} ?>
                        
                        <p><?php //the_excerpt();?></p>
                        
                </li> <!-- end article -->
                
                <?php //comments_template(); ?>
                
                <?php endwhile; ?>	
            </ul>
            <?php if (function_exists('page_navi')) { // if expirimental feature is active ?>
                
                <?php page_navi(); // use the page navi function ?>
                
            <?php } else { // if it is disabled, display regular wp prev & next links ?>
                <nav class="wp-prev-next">
                    <ul class="clearfix">
                        <li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', "bonestheme")) ?></li>
                        <li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', "bonestheme")) ?></li>
                    </ul>
                </nav>
            <?php } ?>		
            
            <?php else : ?>
            
            <article id="post-not-found">
                <header>
                    <h1>Not Found</h1>
                </header>
                <section class="post_content">
                    <p>Sorry, but the requested resource was not found on this site.</p>
                </section>
                <footer>
                </footer>
            </article>
            
            <?php endif; ?><?php */?>
    		
        </div> <!-- end #main -->
		
        

    </div> <!-- end #content -->

<?php get_footer(); ?>