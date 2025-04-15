<?php get_header(); ?>

<!-- Banner Desktop -->
<section class="banner-home relative clear-fix">
	<div class="swiper swiper-banner-home">
		<div class="swiper-wrapper">
			<div class="swiper-slide">
	        	<img src="<?php echo get_stylesheet_directory_uri(). '/library/' ?>images/banner-home-sneak-explore-1.jpg" alt=""> 
			</div>
			<div class="swiper-slide">
	        	<img src="<?php echo get_stylesheet_directory_uri(). '/library/' ?>images/banner-home-sneak-explore-2.jpg" alt=""> 
			</div>
			<div class="swiper-slide">
	        	<img src="<?php echo get_stylesheet_directory_uri(). '/library/' ?>images/banner-home-sneak-explore-3.jpg" alt=""> 
			</div>
		</div>
	</div>
	<div class="swiper-button-next next-home"></div>
  	<div class="swiper-button-prev prev-home"></div>
	<div class="swiper-pagination pagination-site pagination-home"></div>
</section>


<section class="main-recursos full clear-fix">
	<div class="wrapper-main center">

		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalGenerico">
		  Modal Generico
		</button>

		<!-- Js modal automatico -->
		<!-- jQuery('#ModalGenerico').modal('show'); -->

		<!-- Modal -->
		<section class="modal fade modal-generico" id="ModalGenerico" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog  modal-dialog-centered">
				<div class="modal-content">
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					<article>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni saepe, impedit eligendi quam, doloribus quibusdam, rem quae blanditiis, provident alias sunt. Accusamus molestias, quas blanditiis non enim eaque soluta quae.</p>
					</article>
				</div>
			</div>
		</section>
		
		<hr>

		<section class="main-accordion">
			<div class="accordion" id="accordionExample">
			  <div class="accordion-item">
			    <h2 class="accordion-header">
			      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
			        Accordion Item #1
			      </button>
			    </h2>
			    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
			      <div class="accordion-body">
			        <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
			      </div>
			    </div>
			  </div>
			  <div class="accordion-item">
			    <h2 class="accordion-header">
			      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
			        Accordion Item #2
			      </button>
			    </h2>
			    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
			      <div class="accordion-body">
			        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
			      </div>
			    </div>
			  </div>
			  <div class="accordion-item">
			    <h2 class="accordion-header">
			      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
			        Accordion Item #3
			      </button>
			    </h2>
			    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
			      <div class="accordion-body">
			        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
			      </div>
			    </div>
			  </div>
			</div>
		</section>

		<hr>

		<section class="main-tabs">
			<ul class="nav nav-pills" id="pills-tab" role="tablist">
			  <li class="nav-item">
			    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Home</button>
			  </li>
			  <li class="nav-item">
			    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</button>
			  </li>
			  <li class="nav-item">
			    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>
			  </li>
			  <li class="nav-item">
			    <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled" aria-selected="false" disabled>Disabled</button>
			  </li>
			</ul>
			<div class="tab-content" id="pills-tabContent">
			  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">1 This is the first item's accordion body.</div>
			  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">2 This is the first item's accordion body.</div>
			  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">3 This is the first item's accordion body.</div>
			  <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">4 This is the first item's accordion body.</div>
			</div>
		</section>
		
		<hr>

		<section class="grid grid-2 grid-none-xsfull">
			<article class="card-example">
				Grid Repeat 2
			</article>
			<article class="card-example">
				Grid Repeat 2
			</article>
		</section>

		<hr>

		<section class="grid grid-3-repeat grid-none-xs full">
			<article class="card-example">
				Grid Repeat 3
			</article>
			<article class="card-example">
				Grid Repeat 3
			</article>
			<article class="card-example">
				Grid Repeat 3
			</article>			
		</section>

		<hr>

		<section class="flex-between flex-none-xs full">
			<article class="card">
				1 flex-between
			</article>
			<article class="card">
				2 flex-between
			</article>
			<article class="card">
				3 flex-between
			</article>			
		</section>

		<hr>

		<section class="main-swiper-card clear-fix relative">
			<div class="relative">
				<div class="swiper swiper-cards">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
				        	<article class="card-example">
								Card Swiper
							</article>	
						</div>
						<div class="swiper-slide">
				        	<article class="card-example">
								Card Swiper
							</article>
						</div>
						<div class="swiper-slide">
				        	<article class="card-example">
								Card Swiper
							</article>
						</div>
						<div class="swiper-slide">
				        	<article class="card-example">
								Card Swiper
							</article>
						</div>
						<div class="swiper-slide">
				        	<article class="card-example">
								Card Swiper
							</article>
						</div>
					</div>
				</div>
				<div class="swiper-button-next next-card"></div>
	      		<div class="swiper-button-prev prev-card"></div>
			</div>
			<div class="swiper-pagination pagination-site pagination-card"></div>
	    </section>
	</div>
</section>

<div class="redes">    
    <ul>
    	<li class="icon-fb"><a href="" target="_blank">Facebook</a></li>
    	<li class="icon-x"><a href="" target="_blank">X</a></li>
        <li class="icon-it"><a href="" target="_blank">Instagram</a></li>
        <li class="icon-yt"><a href="" target="_blank">Youtube</a></li>
        <li class="icon-ws"><a href="https://wa.me/+5700000000" target="_blank">Whatsapp</a></li>
    </ul>
</div>

<div class="btn-fixed">
	<ul>
		<li class="icon-ws">
			<a href="" target="_blank">Whatsapp</a>
		</li>
	</ul>
</div>

<?php get_footer(); ?>
