<?php
/**
 * Default Page
 */
?>


<!-- Get Page Header
================================================== -->
<?php get_header(); ?>



<!-- Page Title Section
================================================== -->
<?php
	global $prof_default;
	
	$string = get_the_title();
	$pieces = explode(' ', $string);
	$last_word = array_pop($pieces);
	
	$string = str_replace($last_word, "", $string);	
?>

<?php if(class_exists('Woocommerce') && (is_cart() || is_checkout())){ ?>
	<div id="single" class="fullwidth-section bg-callout title-section">
		<div class="container">
			<div class="col-md-12 item_bottom">
				<!-- Section title -->
				<div class="section-title item_bottom text-center">
					<div style="background-color:<?php echo of_get_option('top_title_icon_color',$prof_default); ?>;">
						<span class="fa fa-shopping-cart fa-2x"></span>
					</div>
					<h1 class="white page-title">
						<?php echo esc_attr($string); ?> <span style="background-color:<?php echo of_get_option('top_title_icon_word',$prof_default); ?>;"><?php echo esc_attr($last_word); ?></span>
					</h1>
				</div>
				<!-- End Section title -->
			</div>
		</div>
	</div>
<?php }elseif(class_exists('Woocommerce') && is_account_page()){ ?>	
	<div id="single" class="fullwidth-section bg-callout title-section">
		<div class="container">
			<div class="col-md-12 item_bottom">
				<!-- Section title -->
				<div class="section-title item_bottom text-center">
					<div style="background-color:<?php echo of_get_option('top_title_icon_color',$prof_default); ?>;">
						<span class="fa fa-user fa-2x"></span>
					</div>
					<h1 class="white page-title">
						<?php echo esc_attr($string); ?> <span style="background-color:<?php echo of_get_option('top_title_icon_word',$prof_default); ?>;"><?php echo esc_attr($last_word); ?></span>
					</h1>
				</div>
				<!-- End Section title -->
			</div>
		</div>
	</div>	
<?php }else{ ?>
	<div id="single" class="fullwidth-section bg-callout title-section">
		<div class="container">
			<div class="col-md-12 item_bottom">
				<!-- Section title -->
				<div class="section-title item_bottom text-center">
					<div style="background-color:<?php echo of_get_option('top_title_icon_color',$prof_default); ?>;">
						<span class="fa fa-<?php echo esc_attr(get_post_meta(get_the_ID(), 'Icon', true)); ?> fa-2x"></span>
					</div>
					<h1 class="white page-title">
						<?php echo esc_attr($string); ?> <span style="background-color:<?php echo of_get_option('top_title_icon_word',$prof_default); ?>;"><?php echo esc_attr($last_word); ?></span>
					</h1>
				</div>
				<!-- End Section title -->
			</div>
		</div>
	</div>
<?php } ?>



<!-- Page Blog Body Start
================================================== -->		
<?php 
	if(class_exists('Woocommerce')){
		if(is_cart() || is_checkout() || is_account_page()){
			$ContainerClasses = 'col-md-12 col-sm-12';
		} else {
			$ContainerClasses = 'col-md-8 col-sm-8';
		}
	} else {
		$ContainerClasses = 'col-md-8 col-sm-8';
	}

?>	
	
	
<section class="new-line" id="blog-page">
	<div class="container">
		<div class="row">
			<!-- ============ START POSTS =========== -->
			<div class="<?php echo esc_attr($ContainerClasses); ?>" id="primary">
				<div class="blog-item">
					<?php if(have_posts()) : while(have_posts()) : the_post(); ?>				
						<!-- Content
						================================================== -->							
						<?php the_content(); ?>
						
						<!-- Blog Comments Section
						================================================== -->					
						<?php if(comments_open($post->ID )){?> 
						<div id="comment" class="comments">
								<?php comments_template('', true); ?>
						</div>															
						<?php } ?>
							
					<?php endwhile; endif; ?>						
				</div>
			</div>

			<!-- START SIDEBAR -->
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				<?php if(class_exists('Woocommerce')){
						if(!is_cart() && !is_checkout()){
						
						} else {
				?>
					<div class="col-md-4 col-sm-4" id="secondary">
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>
			<?php } else { ?>
					<div class="col-md-4 col-sm-4" id="secondary">
						<?php get_sidebar(); ?>
					</div>			
			<?php } ?>
			<?php endwhile; endif; ?>			
		</div>
	</div>
</section>


<!-- Get Page Footer
================================================== -->
<?php get_footer(); ?>