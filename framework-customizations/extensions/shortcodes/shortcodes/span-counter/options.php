<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'icon'       => array(
		'type' => 'icon',
		'label' => __( 'Span icon', 'fw' )
	),
	'title'    => array(
		'type'  => 'text',
		'label' => __( 'Span content', 'fw' ),
		'desc'  => __( 'Span content', 'fw' ),
	),

	// custom

	// 'custom_id' => array(
	// 	'label' => __('Custom_id', 'clean'),
	// 	'type'  => 'text',
	// ),
	'span_class' => array(
		'label' => __('Span_class', 'fw'),
		'type'  => 'text',
		'desc'  => __( 'Class of span-counter', 'fw' ),
	),
	'span_id' => array(
		'label' => __('Span_id', 'fw'),
		'type'  => 'text',
		'desc'  => __( 'Id of span-counter', 'fw' ),
	),
	'span_start' => array(
		'label' => __('Span_counter_start', 'fw'),
		'type'  => 'text',
		'desc'  => __( 'Start of span-counter', 'fw' ),
	),
	'span_end' => array(
		'label' => __('Span_counter_end', 'fw'),
		'type'  => 'text',
		'desc'  => __( 'End of span-counter', 'fw' ),
	),
	'span_speed' => array(
		'label' => __('Span_counter_speed', 'fw'),
		'type'  => 'text',
		'desc'  => __( 'Speed of span-counter', 'fw' ),
	),
	'span_refresh' => array(
		'label' => __('Span_counter_refresh', 'fw'),
		'type'  => 'text',
		'desc'  => __( 'Refresh interval of span-counter', 'fw' ),
	)

);