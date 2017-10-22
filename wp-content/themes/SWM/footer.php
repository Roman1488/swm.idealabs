		<footer id="footer">
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-sm-6 col-12">
							<div class="footer-logo footer-block">
								<?php if( $footer_logo = get_field('footer_logo', 'option')) { ?>
                                    <a href="https://www.tufts.edu/" target="_blank">
									<?php echo wp_get_attachment_image($footer_logo, 'full'); ?>
                                    </a>
								<?php } ?>
							</div>
						</div>
						<div class="col-sm-6 col-12">
							<div class="row">
								<div class="col-sm-6 col-12 footer-block">
									<?php if( $footer_links_menu = get_field('footer_links_menu', 'option')) { ?>
										<h3><?php _e('Links', 'tufts'); ?></h3>
										<?php wp_nav_menu( array(
											'menu'        => $footer_links_menu,
											'after'          => '<i></i>'
										) ); ?>
									<?php } ?>
								</div>
								<div class="col-sm-6 col-12 footer-block">
									<?php if( $footer_contact_text = get_field('footer_contact_text', 'option')) { ?>
										<h3><?php _e('Contact', 'tufts'); ?></h3>
										<?php echo nl2br($footer_contact_text); ?>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="container">
					<div class="row justify-content-end">
						<div class="col-md-3">
							<?php _e('© Tufts University ', 'tufts'); echo date('Y'); ?>
						</div>
						<div class="col-md-3">
							<?php if( $footer_bottom_links = get_field('footer_bottom_links', 'option')) { ?>
								<?php wp_nav_menu( array(
									'menu'        => $footer_bottom_links,
									'after'          => '<i></i>'
								) ); ?>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</footer>
		</div><!-- #content -->
	</div><!-- #wrapper -->
<?php wp_footer(); ?>
</body>
</html>