<?php get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php the_content(); ?>

	<?php endwhile; ?>

	<?php echo do_shortcode( '[contact-form-7 title="Contact"]' ); ?>

	<!--

[vc_row][vc_column][vc_pego_maps latitude="37.232215" longitude="-80.424359"][/vc_column][/vc_row][vc_row][vc_column][vc_portfolio_welcome]Please contact us if you have any questions or comments.[/vc_portfolio_welcome][/vc_column][/vc_row][vc_row][vc_column][contact-form-7 id="5"][/vc_column][/vc_row][vc_row][vc_column][vc_contact_info content1="Dr. Masoud Agah
agah@vt.edu" content2="469 Whittemore Hall
Blacksburg, VA 24061" content3="Phone: (540) 231-2653
Lab: (540) 231-4180
Fax: (540) 231-3362" icon1="fa-address-book" icon2="fa-address-book" icon3="fa-address-book"][/vc_column][/vc_row][vc_row][vc_column][vc_portfolio_welcome]Several postdoctoral positions are currently available in the lab. Please refer to the position listing PDF file and apply online via Virginia Tech website.

Students interested to pursue their graduate studies in VT MEMS Lab can send an email to Dr. Agah with a short description of their research interest and a sumtmary of a few papers they have reviewed (half a page). If students do not hear anything back in three days, this is an indication that their research interests and background do not fit the VT MEMS lab. In no means, this replaces the online submission of the application process and going through the admission process.[/vc_portfolio_welcome][/vc_column][/vc_row]

	-->

<?php get_footer(); ?>
