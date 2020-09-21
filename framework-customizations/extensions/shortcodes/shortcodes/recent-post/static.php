<?php if (!defined('FW')) die('Forbidden');

$shortcodes_extension = fw_ext('shortcodes');
wp_enqueue_style(
	'fw-shortcode-span-counter',
	$shortcodes_extension->get_declared_URI('/shortcodes/span-counter/static/css/styles.css'),
	array('font-awesome')
);

