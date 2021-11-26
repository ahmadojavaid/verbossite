<?php

	global $prof_default;

?>
 
 
	<footer class="text-center">
	
		<?php if(of_get_option('select_footer_widget',$prof_default) == 'On') { ?>	
			<div class="container footer_container">
				<div class="col-md-3 col-sm-6 col-xs-12">
					<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Col I')) { ?>   
						<?php dynamic_sidebar('Footer Col I'); ?>
					<?php } ?>				
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Col II')) { ?>   
						<?php dynamic_sidebar('Footer Col II'); ?>
					<?php } ?>				
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Col III')) { ?>   
						<?php dynamic_sidebar('Footer Col III'); ?>
					<?php } ?>				
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Col IV')) { ?>   
						<?php dynamic_sidebar('Footer Col IV'); ?>
					<?php } ?>					
				</div>			
			</div>
		<?php } ?>
		
		<!-- Footer Text -->
			<div class="container text-center item_top">
			
				<!-- Footer Logo
				================================================== -->
				<?php if(of_get_option('select_footer_logo',$prof_default) == 'On') { ?>
					<?php 
						if(of_get_option('select_footer_newtab',$prof_default) == 'On') {
							$target = 'target="_blank"';
						} else {
							$target = '';
						}
					?>
					<a <?php echo $target; ?> href="<?php echo esc_url(of_get_option('footer_logo_url',$prof_default)); ?>">
						<img class="footer-logo" src="<?php echo of_get_option('footer_logo',$prof_default); ?>" alt="footer logo">
					</a>
				<?php } ?>	
			
			
			
				<!-- Footer Copyrights Section
				================================================== -->				
				<?php if(of_get_option('select_copyrights_columns',$prof_default) == 'On') { ?>
					<?php
						$allowed_html = array(
							'a' => array(
								'href' => array(),
								'title' => array()
							),
							'br' => array(),
							'strong' => array(),
						);
						
						$footerText = wp_kses(of_get_option('footer_text',$prof_default), $allowed_html);
					?>
					<div class="identity-copyrights"><?php echo $footerText; ?></div>
				<?php } ?>			
				
			</div>
		<!-- End Footer Text -->
	</footer>
 
	<?php if(of_get_option('select_backtotop',$prof_default) == 'On') { ?> 
		<a id="back-top" href="#" style="display: none;"><i class="fa fa-angle-up fa-2x"></i></a>
	<?php } ?>
	
	
	<!-- Footer End
	================================================== -->		

<?php wp_footer(); ?>
</body>
</html>

