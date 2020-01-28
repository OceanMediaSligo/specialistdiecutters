 <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="site-footer_logo">
                        	<a href="<?php site_url(); ?>">
                            	<?php $logo = get_field('footer_logo', 'option');
                                    if($logo) {
                                      echo wp_get_attachment_image($logo, 'small');
                                } ?>
                           	</a>
                        </div>
                        <div class="site-footer_social">
							<?php if(get_field('facebook', 'option')) { ?>
								<a href="<?php echo (esc_url (get_field ('facebook', 'option'))); ?>" target="_blank" class="site-footer_social-button button -square -white"><?php oo_icon('facebook-f'); ?></a> 
							<?php }
							if(get_field('twitter', 'option')) { ?>
								<a href="<?php echo (esc_url (get_field ('twitter', 'option'))); ?>" target="_blank" class="site-footer_social-button button -square -white"><?php oo_icon('twitter'); ?></a> 
							<?php }
							if(get_field('instagram', 'option')) { ?>
								<a href="<?php echo (esc_url (get_field ('instagram', 'option'))); ?>" target="_blank" class="site-footer_social-button button -square -white"><?php oo_icon('instagram'); ?></a> 
							<?php }
							if(get_field('youtube', 'option')) { ?>
								<a href="<?php echo (esc_url (get_field ('youtube', 'option'))); ?>" target="_blank" class="site-footer_social-button button -square -white"><?php oo_icon('youtube'); ?></a> 
							<?php }?>                            
                        </div>
                        <div class="site-footer_certs">
                        	<img src="<?php echo get_field('footer_certificate_1', 'option'); ?>">
                        	<img src="<?php echo get_field('footer_certificate_2', 'option'); ?>">
                        	<img src="<?php echo get_field('footer_certificate_3', 'option'); ?>">

                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-xs-stack footer-middle-col_padding">
                        <?php
                            $menu_location = 'footer';
                            $menu_locations = get_nav_menu_locations();
                            $menu_object = (isset($menu_locations[$menu_location]) ? wp_get_nav_menu_object($menu_locations[$menu_location]) : null);
                            $menu_name = (isset($menu_object->name) ? $menu_object->name : '');
                        ?>
                        <h4 class="site-footer_heading"><?php echo $menu_name ?></h4>
                         <?php wp_nav_menu(array(
                                'theme_location'  => 'footer',
                                'depth'           => 2,
                                'container'       => 'ul',
                                'menu_id'         => 'footer-menu',
                                'menu_class'      => 'site-footer_services',
                        )); ?>
                    </div>
                    <div class="col-sm-6 col-md-4 col-xs-stack col-sm-stack">
                        <h4 class="site-footer_heading">Contact Us</h4>
                        <ul class="site-footer_contact">
                        	<li class="site-footer_contact-item">
                            	<span class="site-footer_contact-item-inner">
                            		<span class="site-footer_contact-icon"><?php oo_icon('map-marker-alt'); ?></span>
     								<p class="site-footer_contact-item-main"><?php echo get_field('location', 'option'); ?></p>
     							</span>
                            </li>
                            <li class="site-footer_contact-item">
     							<span class="site-footer_contact-item-inner">
     								<span class="site-footer_contact-icon"><?php oo_icon('phone'); ?></span>
                                    <a href="tel:<?php echo get_field ('phone','option'); ?>" class="site-footer_contact-item-main"><?php echo get_field ('phone','option'); ?></a>
     							</span>
                            </li>
                            <li class="site-footer_contact-item">
                                <span class="site-footer_contact-item-inner">
                                	<span class="site-footer_contact-icon"><?php oo_icon('envelope'); ?></span>
                                    <a href="mailto:<?php echo get_field ('email', 'option'); ?>" class="site-footer_contact-item-main"><?php echo get_field('email', 'option'); ?></a>
     							</span>
                            </li>                            
                        </ul>
                    </div>
                </div>
                <?php wp_nav_menu(array(
                                'theme_location'  => 'footer-secondary',
                                'depth'           => 2,
                                'container'       => 'ul',
                                'menu_id'         => 'footer-secondary-menu',
                                'menu_class'      => 'site-footer_secondary-menu',
                )); ?>      
            </div> 
	<div class="oo-footer-1cc_bottom">
  		<div class="container">
      		<div class="row">
          		<div class="col-sm-6 oo-footer-1cc_bottom-left">
              		<p>&copy; Copyright <?php echo get_bloginfo('name'); echo ' ' . date('Y'); ?></p>
              	</div>
              	<div class="col-sm-6 oo-footer-1cc_bottom-right">
             		<p>Website by <a style="color:#fa7820;" href="http://oceanmedia.ie" target="_blank">Ocean Media</a></p>
              	</div>
          	</div>
      	</div>
  	</div>

		</footer>
	<?php wp_footer(); ?>
	</body>
</html>