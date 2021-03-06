<?php
/*Index Page*/
?>


<!-- Get Page Header
================================================== -->
<?php get_header(); ?>


<?php
	global $prof_default;
	
	$all = __(' Comments', 'sentient');
	$one = __(' Comment', 'sentient');	
	
	$displayedCat = '';
	
	$string = get_the_title();
	$pieces = explode(' ', $string);
	$last_word = array_pop($pieces);
	
	$string = str_replace($last_word, "", $string);	
?>


<!-- Page Title Section
================================================== -->	
<div id="single" class="fullwidth-section bg-callout title-section">
	<div class="container">
		<div class="col-md-12 item_bottom">
			<!-- Section title -->
			<div class="section-title item_bottom text-center">
				<div style="background-color:<?php echo of_get_option('top_title_icon_color',$prof_default); ?>;">
					<span class="fa fa-home fa-2x"></span>
				</div>
				<h1 class="white page-title">
				<?php echo esc_attr(of_get_option('index_page_title',$prof_default)); ?>
				</h1>
			</div>
			<!-- End Section title -->
		</div>
	</div>
</div>



<!-- Page Body Started
================================================== -->
<section class="new-line" id="blog-page">
	<div class="container">
		<div class="row">
		
			<!-- ============ START POSTS =========== -->
			<div class="col-md-8 col-sm-8" id="primary">
				<div class="blog-item">
					<?php
						$postBy = __("Posted by " , "sentient");
						$onString = __("on" , "sentient");
						$inString = __("in" , "sentient");	
					
						$temp = $wp_query;
						$wp_query= null;
						$wp_query = new WP_Query();
						$wp_query->query('posts_per_page=6'.'&paged='.$paged);
						while ($wp_query->have_posts()) : $wp_query->the_post();
					?>
						<?php 
							if (has_post_format( 'gallery' ) && get_post_meta(get_the_ID(), 'Post Gallery', true) != '') { 
								$ThumbClass = 'flexslider';
							} elseif ( has_post_format( 'video' ) || has_post_format( 'audio' )){
								$ThumbClass = 'media-container';								
							}else{
								$ThumbClass = '';
							}
						?>
						<article <?php post_class(); ?>>
							<div class="post-thumb <?php echo esc_attr($ThumbClass); ?>">
								<!-- Standard Post Format
								================================================== -->							
								
								<?php
									if ( get_post_format() == false && has_post_thumbnail()) {									
								?>
									<?php the_post_thumbnail('full'); ?>
														
								<!-- Video Post Format
								================================================== -->								
								<?php
									} elseif ( has_post_format('video') && get_post_meta(get_the_ID(), 'Post Video URL', true) != '') {
								?>
										<iframe width="100%" height="450px" src="<?php echo esc_url(get_post_meta(get_the_ID(), 'Post Video URL', true)); ?>"></iframe>

								<!-- Gallery Post Format
								================================================== -->							
								<?php
									}elseif ( has_post_format('gallery') && get_post_meta(get_the_ID(), 'Post Gallery', true)!= '') { ?>
										<ul class="slides">
										<?php
											$galleryids = explode(",", get_post_meta(get_the_ID(), 'Post Gallery', true));
											$idscount = count($galleryids);
											for ($x=0; $x < $idscount; $x++)
											{	
												$getimageurlarray = wp_get_attachment_image_src( $galleryids[$x] , 'full');
												
												$alt = get_post_meta($galleryids[$x], '_wp_attachment_image_alt', true);
												
												echo '<li>   
																	<a href="'. esc_url(get_permalink()) .'"><img class="img-center img-responsive" src="' . esc_url($getimageurlarray[0]) . '" alt="' . esc_attr($alt) . '"/></a>
															</li>';
											} 
										?>
										</ul>
										
								<!-- Audio Post Format
								================================================== -->								
								<?php
								}elseif ( has_post_format( 'audio' ) && get_post_meta(get_the_ID(), 'Post Audio Shortcode', true)!= '') { ?>							
									<?php echo do_shortcode(get_post_meta(get_the_ID(), 'Post Audio Shortcode', true)) ;  ?>									
								
								<!-- ELSE
								================================================== -->									
								<?php } else { ?>					
									<?php the_post_thumbnail('full'); ?>
								<?php } ?>
							</div>

							<h3 class="post-title"><a href="<?php echo esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h3>

							<div class="post-meta">
								<span class="author"><i class="fa fa-user"></i><?php esc_attr(the_author_meta( 'display_name' )); ?></span>
								<span class="time"><i class="fa fa-clock-o"></i><?php echo get_the_time('M') . ' ' . get_the_time('j') . ', ' . get_the_time('Y'); ?></span>
								<span class="category"><i class="fa fa-folder"></i>
									<?php 
										$categories = get_the_category(get_the_ID());
										$output = '';
										foreach ( $categories as $category ) {
											$output .= '<a href="' . esc_url(get_category_link( $category->term_id )) . '" >' . esc_attr($category->name) . '</a>' . ', ';
										}

										$displayedCat = trim($output, ', ');
										
										 echo wp_kses( $displayedCat, array(
												'a' => array(
													'href' => array(),
													'class' => array()									
												)
											) );
									?>								
								
								</span>
								<span class="comment pull-right"><i class="fa fa-comment"></i><?php comments_number( '0 ' . $all, '1 ' . $one, '% ' . $all); ?></span>
							</div>

							<div class="post-excerpt clearfix">
								<p><?php echo strip_shortcodes(wp_trim_words( get_the_content(), 60 )); ?></p>
								<a class="btn btn-default pull-left" href="<?php echo esc_url(the_permalink()); ?>"><?php _e("Read More" , "sentient"); ?></a>
							</div>

						</article>					
					
					<?php endwhile; ?>

					<!-- Pagination Begin
					================================================== -->						
					<div class="pagination">
						<div class="pages">
							<?php
								global $wp_query;

								$big = 999999999;

								echo paginate_links( array(
									'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
									'format' => '?paged=%#%',
									'current' => max( 1, get_query_var('paged') ),
									'total' => $wp_query->max_num_pages,														
									'prev_text'    => __('<i class="fa fa-chevron-left"></i> Previous'),
									'next_text'    => __('Next <i class="fa fa-chevron-right"></i>')						
								) );
							?>
						</div>
					</div>
					<!-- Pagination End
					================================================== -->		
					
					<?php $wp_query = null; $wp_query = $temp;?>					
				</div>
			</div>
			
			<!-- START SIDEBAR -->
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>				
				<div class="col-md-4 col-sm-4" id="secondary">
					<?php get_sidebar(); ?>
				</div>
			<?php endwhile; endif; ?>	
			
		</div>
	</div>
</div>

<!-- Page Body End
================================================== -->



<!-- Get Page Footer
================================================== -->
<?php get_footer(); ?>