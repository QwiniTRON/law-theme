<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'col_class' => array(
		'label' => __('Column classes', 'fw'),
		'type'  => 'text',
		'desc'  => __( 'Class of span-counter', 'fw' ),
	),
	'col_id' => array(
		'label' => __('Column id', 'fw'),
		'type'  => 'text',
		'desc'  => __( 'Id of span-counter', 'fw' ),
	)
);