<?php get_header()?>

<section id="fh5co-blog" class="fh5co-bg-section" style="background-color:#fcfcfc;">

		<div class="container">
			
			<div class="row">

                <?php if(have_posts()): while(have_posts()): the_post() ?>

                <div class="col-lg-4 col-md-4">
					<div class="fh5co-blog animate-box">
                        <a href="<?php the_permalink()?>">
                        <?php
                            if(has_post_thumbnail()){
                                $imgUrl = get_the_post_thumbnail_url();
                            }else{
                                $imgUrl = "https://picsum.photos/800/570";
                            }
                        ?>
                        <img src="<?= $imgUrl?>" alt="">
                        </a>
						<div class="blog-text">
							<span class="posted_on"><?php the_time("j M")?></span>
							<span class="comment"><a href=""><?php echo get_comments_number()?><i class="icon-speech-bubble"></i></a></span>
							<h3><a href="<?php the_permalink()?>"><?php the_title()?></a></h3>
							<p><?php the_content("")?></p>
							<a href="<?php the_permalink()?>" class="btn btn-primary"><?php echo __("Read more", "law");?></a>
						</div> 
					</div>
				</div>

                <?php endwhile?>

                <?php else: ?>

                <?php endif?>
                
			</div>
		</div>
	
</section>

<?php get_footer()?>