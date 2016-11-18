<?php
/**
 * Sage Theme:		Stand alone page
 * @package:			WordPress
 * @subpackage:			Sage Theme
 * @version:			1.0
 * @since:				1.0
 */
 
 // Include framework options
 $hgr_options = get_option( 'redux_options' );
 
	get_header();
 ?>
<!-- page.php [<?php echo get_the_ID();?>]-->

 <?php
	// Get metaboxes values from database
	$hgr_page_bgcolor			=	get_post_meta( get_the_ID(), '_hgr_page_bgcolor', true );
	$hgr_page_top_padding		=	get_post_meta( get_the_ID(), '_hgr_page_top_padding', true );
	$hgr_page_btm_padding		=	get_post_meta( get_the_ID(), '_hgr_page_btm_padding', true );
	$hgr_page_color_scheme		=	get_post_meta( get_the_ID(), '_hgr_page_color_scheme', true );
	$hgr_page_height			=	get_post_meta( get_the_ID(), '_hgr_page_height', true );
	
	// Does this page have a featured image to be used as row background with paralax?!
 	$src = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), array( 5600,1000 ), false, '' );

 	if( !empty($src[0]) ) {
		$parallaxImageUrl 	=	" background-image:url('".$src[0]."'); ";
		$parallaxClass		=	' parallax ';
		$backgroundColor	=	'';
	} elseif( !empty($hgr_page_bgcolor) ) {
		$parallaxImageUrl 	=	'';
		$parallaxClass		=	' ';
		$backgroundColor	=	' background-color:'.$hgr_page_bgcolor.'!important; ';
	} else {
		$parallaxImageUrl 	=	'';
		$parallaxClass		=	' ';
		$backgroundColor	=	' ';
	}
 ?>
 <script>
 jQuery(document).ready(function() {
 	var windowHeight = jQuery(window).height(); //retrieve current window height
	jQuery('.standAlonePage').css('min-height',windowHeight);
 })
 </script>
 
 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
 <div id="<?php echo esc_html($post->post_name);?>" class="row standAlonePage <?php echo esc_attr($parallaxClass);?> <?php echo esc_attr($hgr_page_color_scheme);?>"  style=" <?php echo esc_attr($parallaxImageUrl); echo esc_attr($backgroundColor); echo ( !empty($hgr_page_height) ? ' height:'.esc_attr($hgr_page_height).'px!important; ' : ''); echo ( !empty($hgr_page_top_padding) ? ' padding-top:'.esc_attr($hgr_page_top_padding).'px!important;' : '' ); echo ( !empty($hgr_page_btm_padding) ? ' padding-bottom:'.esc_attr($hgr_page_btm_padding).'px!important;' : '' );?> ">
  <div class="col-md-12" >
    <div class="container">
      <div class="slideContent gu12">
      <!--<h1 class="page_title"><?php the_title(); ?></h1>-->
        <?php the_content(); ?>
        
        <?php if(is_paged()) : ?>
      <?php paginate_comments_links(); ?>
      <?php endif;?>
      <?php comments_template(); ?>
      <?php if(is_paged()) : ?>
      <?php paginate_comments_links(); ?>
      <?php endif;?>
      
      </div>
    </div>
  </div>
</div>
<?php endwhile; endif; ?>

<?php 
 	get_footer();
 ?>
