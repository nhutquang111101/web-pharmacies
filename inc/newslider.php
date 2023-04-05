<div class="banner-mini" style="padding-top:180px;">
    <div id ="sidebar" class="span-custom">
        <img src="./img/banner2.png" alt="" style="margin-top:20px;height:145px"><a href="topbrands"></a>
        <img src="./img/banner3.png" alt=""style="margin-top:20px;height:145px">
								
    </div>
    <section class="slider" style="padding-left:30px">
				  <div class="flexslider"style="padding-left:30px">
					<ul class="slides" style="padding-left:30px">
						<?php 
							// $customer_id = Session::get('customer_id');
							$get_slider = $product->getSlider();
							if($get_slider){
								$i = 0;
								while($result = $get_slider->fetch_assoc()){
									$i++;
							
						?>
							<li><img src="admin/uploads/<?php echo $result['slider_image']?>" alt=""/></li>
						<?php
								}
							}
						?>
				    </ul>
				  </div>
	      </section>
</div>

