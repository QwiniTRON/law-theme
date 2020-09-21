<?php if (!defined('FW')) {
	die('Forbidden');
}
?>

<?php 
	$number = abs((int)$atts["post_count"])? (int)$atts["post_count"] : 3 ;


    $query = new WP_Query(array(
        "posts_per_page" => $number
    ));
?>

		<div class="container">
			
			<div class="row">

                <?php if($query->have_posts()): while($query->have_posts()): $query->the_post() ?>

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

                <?php endif; wp_reset_postdata();?>
                
			</div>
		</div>














