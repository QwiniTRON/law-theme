<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'recent_post_class' => array(
		'label' => __('Recent posts class', 'fw'),
		'type'  => 'text',
		'desc'  => __( 'Recent posts class', 'fw' ),
	),
	'recent_post_id' => array(
		'label' => __('Recent posts id', 'fw'),
		'type'  => 'text',
		'desc'  => __( 'Recent posts id', 'fw' ),
	),
	'post_count' => array(
		'label' => __('Count posts', 'fw'),
		'type'  => 'text',
		'desc'  => __( 'Count Posts', 'fw' ),
	),

);