<?php get_header()?>

<section id="fh5co-search-page" class="fh5co-bg-section" style="background-color:#fcfcfc;">

		<div class="container">
			
			<div class="row">

                <div class="col-md-12">

                    <?php if(have_posts()):?>
                        <h2 class="page-title">
                            <?php printf(esc_html__("Search result for: %s", "law"), "<span>" . get_search_query() . "</span>")?>
                        </h2>
                        <ul>

                            <?php while(have_posts()): the_post()?>
                                <li><a href="<?php the_permalink()?>"><?php the_title()?></a></li>
                            <?php endwhile?>

                        </ul>

                        <?php else: ?>
                            <p>Nothing found</p>

                    <?php endif?>

                </div>

                
                
			</div>
		</div>
	
</section>

<?php get_footer()?>
