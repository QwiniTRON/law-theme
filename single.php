<?php get_header() ?>

<section id="fh5co-blog" class="fh5co-bg-section" style="background-color:#fcfcfc;">

	<div class="container">

		<div class="row">

			<?php if (have_posts()) : while (have_posts()) : the_post() ?>

					<div class="col-lg-12 col-md-12">
						<div class="fh5co-blog animate-box">
							<?php
							if (has_post_thumbnail()) {
								$imgUrl = get_the_post_thumbnail_url();
							} else {
								$imgUrl = "https://picsum.photos/800/570";
							}
							?>
							<img src="<?= $imgUrl ?>" alt="">
							<div class="blog-text">
								<span class="main-title_single"><?php the_title()?></span><span class="posted_on"><?php the_time("j M Y") ?></span>
								<span class="comment"><a href=""><?php echo get_comments_number() ?><i class="icon-speech-bubble"></i></a></span>
								<h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
								<p><?php the_content("") ?></p>
							</div>
						</div>
					</div>

				<?php endwhile ?>

			<?php else : ?>

			<?php endif ?>

		</div>
	</div>
	<div class="row">

		<div class="container">
			<?php if(comments_open() || get_comments_number()):?>
				<div class="col-md12">
					<?php comments_template()?>
				</div>
			<?php endif?>
		</div>

	</div>

</section>

<?php get_footer() ?>