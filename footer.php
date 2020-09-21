<footer id="fh5co-footer" role="contentinfo">
		<div class="container">

		<?php if( is_active_sidebar("footer") ): ?>

			<div class="row row-pb-md">

				<?php dynamic_sidebar("footer")?>

			</div>

		<?php endif?>

			<div class="row copyright">
				<div class="col-md-12 text-center">
						<!-- <small class="block">&copy; < ?= date("Y")?> Free HTML5. All Rights Reserved.</small>  -->
						<?php echo law_theme_option("footer_text")?>
					
						<ul class="fh5co-social-icons">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>

	<?php wp_footer()?>

	</body>
</html>

