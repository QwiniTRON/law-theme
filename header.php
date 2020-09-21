<?php

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="fh5co-loader"></div>

	<div id="page">
		<nav class="fh5co-nav" role="navigation" style="background-color: <?php echo law_theme_option("header_color")?>;">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-xs-2">
							<div id="fh5co-logo"><a href="<?php echo home_url("/") ?>"><?php echo bloginfo("name") ?><span>.</span></a></div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<?php wp_nav_menu(array(
								"theme_location" => "header-menu",
								'container'       => '',
								"walker" => new Law_header_menu(),
							)) ?>
						</div>
					</div>

					<div class="searchform"><?php get_search_form() ?></div>
					
				</div>
			</div>
			<img src="<?php echo law_theme_option("header_image")["url"] ?>" width="30" height="30" alt="header sublogo">
		</nav>