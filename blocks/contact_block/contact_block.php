<?php 
$phone = get_field('oo_phone_number');
$email = get_field('oo_email');
$address = get_field('oo_address');
?>
	<div class="oo-contact-box">
		<div class="row">
			<div class="col-md-7">
				<div class="oo-contact-box_map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9482.040215731402!2d-6.743154542815283!3d53.5486618603867!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xeb44ac1ca727b6f6!2sScurlockstown%20Business%20Park!5e0!3m2!1sen!2sie!4v1578578484190!5m2!1sen!2sie" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
				</div>
			</div>
			<div class="col-md-5">
				<article>
					<div class="oo-accordion-1">
						Contact us
					</div>
				    <div class="oo-panel">
			        	<ul>
			        		<li>
								<span class="oo-contact-box_contact-icon">
									<svg class="oo-icon">
										<use xlink:href="http://localhost/specialistdiecutters/wp-content/themes/ocean-one/img/oo-icons.svg#phone"></use>
									</svg>
								</span>
								<a class="oo-contact-box_info" href="tel:<?php echo $phone; ?>" class="site-footer_contact-item-main"><?php echo $phone; ?></a>
							</li>
							<li>
								<span class="oo-contact-box_contact-icon">
									<svg class="oo-icon">
										<use xlink:href="http://localhost/specialistdiecutters/wp-content/themes/ocean-one/img/oo-icons.svg#envelope"></use>
									</svg>
								</span>
								<a class="oo-contact-box_info" href="mailto:<?php echo $email; ?>" class="site-footer_contact-item-main"><?php echo $email; ?></a>
							</li>
							<li>
								<span class="oo-contact-box_contact-icon">
									<svg class="oo-icon">
										<use xlink:href="http://localhost/specialistdiecutters/wp-content/themes/ocean-one/img/oo-icons.svg#location-arrow"></use>
									</svg>
								</span>
								<span class="oo-contact-box_info"><?php echo $address; ?></span>
							</li>
						</ul>
				    </div>    
				    <div class="oo-contact-box_buttons">
						<button>View Map</button> <button>Contact Form</button>
					</div>
				</article>  
			</div> 
		</div> 
	</div>
