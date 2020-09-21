<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'icon'       => array(
		'type' => 'icon',
		'label' => __( 'Icon', 'fw' )
	),
	'title'    => array(
		'type'  => 'text',
		'label' => __( 'Title', 'fw' ),
		'desc'  => __( 'Icon title', 'fw' ),
	),

	// custom

	// 'custom_id' => array(
	// 	'label' => __('Custom_id', 'clean'),
	// 	'type'  => 'text',
	// ),
	'custom_url' => array(
		'label' => __('Custom_url', 'fw'),
		'type'  => 'text',
	)

);