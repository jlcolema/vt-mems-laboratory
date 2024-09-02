			<div class="clear"></div>
		</div> <!-- end container-wrapper -->
	<div id="footer" class="under-footer">
	<?php
	if ( function_exists( 'ot_get_option' ) ) {
		if ((ot_get_option('pego_under_footer_left_content') != '') ||  (ot_get_option('pego_under_footer_right_content') != ''))  {
	?>
	
		<div class="center">
			<div class="left">
			<?php echo ot_get_option('pego_under_footer_left_content') ; ?>
			</div>
			<div class="right">
			<?php echo do_shortcode(ot_get_option('pego_under_footer_right_content')) ; ?>
			</div>
			<div class="clear"></div>
		</div>
	<?php
		}
	}
	?>
	</div>
</div>
<?php  
	//custom CSS 
	include("/home/agahlab/www/www/wp-content/themes/xavier/functions/custom-css.php"); 
	wp_footer(); 
?>
</body>
</html>