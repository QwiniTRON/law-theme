<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'title'    => array(
		'type'  => 'text',
		'label' => __( 'Progressbar content', 'fw' ),
		'desc'  => __( 'Progressbar content', 'fw' ),
	),
	'percent'    => array(
		'type'  => 'text',
		'label' => __( 'Percent of progress', 'fw' ),
		'desc'  => __( 'Percent of progress', 'fw' ),
	),
);