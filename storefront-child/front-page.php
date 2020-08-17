<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Homepage
 *
 * @package storefront
 */
$imagenes = get_post_meta( get_the_ID(), 'slider_front',true );
$logos = get_post_meta( get_the_ID(), 'logos',true );


get_header(); ?>
</div>

<div id="carouselExampleCaptions" class="carousel slide slider-cabecera" data-ride="carousel">
           <ul class="carousel-indicators">
                     <?php $cnt=0; $slider = 0; foreach($imagenes as  $imagen):?>
                     <li data-target="#carousel-1" data-slide-to="<?php echo $slider?>" class="<?php if($cnt==0){ echo 'active'; }?>"></li>
                        <?php $cnt++; $slider++; endforeach; ?>
            </ul>
            <div class="carousel-inner">
              <?php $cnt=0; foreach($imagenes as  $imagen):?>
                  <div class="carousel-item  <?php if($cnt==0){ echo 'active'; }?>">
                      <img src="<?php echo $imagen['image']; ?>"  class="" alt="Los Angeles">
                      <div class="carousel-caption">
                        <h3 class="titulo_slider"><?php echo $imagen['title'];?></h3>
                        <p class="descripcion_slider"><?php echo $imagen['description'];?></p>
                      </div>
                  </div>
               <?php $cnt++; endforeach; ?> 
              </div>
      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    

        
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			/**
			 * Functions hooked in to homepage action
			 *
			 * @hooked storefront_homepage_content      - 10
			 * @hooked storefront_product_categories    - 20
			 * @hooked storefront_recent_products       - 30
			 * @hooked storefront_featured_products     - 40
			 * @hooked storefront_popular_products      - 50
			 * @hooked storefront_on_sale_products      - 60
			 * @hooked storefront_best_selling_products - 70
			 */
			do_action( 'homepage' );
			?>

		</main><!-- #main -->
	</div><!-- #primary -->


<div class="container_destacado logos">
                <a class='Productos_destacado_semanal'>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Marcas conque trabajamos

                <a>
</div>
            <br>
            <br><br><br>
     
            
          <div class="body_card">
           <?php
            foreach($logos as $logo): ?>
                        <li class="card">
                              
                            <div class="imglg">
                              <img   src="<?php echo $logo['image']?>" alt="<?php echo $logo['image_caption'];?>">
                            </div>
                              
                            <div class="contentBx">
                               <h4 >
                                  <?php echo $logo['title'];?>
                               </h4>
                            </div>
                        </li>
                   <?php 
            endforeach;
          echo "</div>";

               
         

get_footer();