<?php if(count($imagenes)>0):?>
    <div class="col-md-6 col-lg-6 test-back">
        <div id="carousel-1" class="carousel slide carousel slide carousel-fade slide-carousel" data-ride="carousel">
           <!-- Indicators -->
               <ul class="carousel-indicators">
                     <?php $cnt=0; $slider = 0; foreach($imagenes as  $imagen):?>
                     <li data-target="#carousel-1" data-slide-to="<?php echo $slider?>" class="<?php if($cnt==0){ echo 'active'; }?>"></li>
                        <?php $cnt++; $slider++; endforeach; ?>
               </ul>

                        <!-- The slideshow -->
               <div class="carousel-inner">


               
                   <?php $cnt=0; foreach($imagenes as  $imagen):
                    print_r($imagen['image'])
                    ?>
                   <div class="carousel-item  <?php if($cnt==0){ echo 'active'; }?>">
                       <img src="<?php echo $imagen['image']; ?>"  class="" alt="Los Angeles">
                   </div>


                   <?php $cnt++; endforeach; ?> 
       
               </div>
        </div>
    </div>
   <?php endif; ?>