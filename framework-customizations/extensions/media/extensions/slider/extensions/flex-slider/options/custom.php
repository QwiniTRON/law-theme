<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$options = array(
	'link' => array(
		'type'  => 'text',
		'label' => __( 'Link', 'law' ),
		'value' => '',
		'desc'  => __( 'Choose a link for your slide.', 'law' )
	),
	'link_title' => array(
		'type'  => 'text',
		'label' => __( 'Link title', 'law' ),
		'value' => '',
		'desc'  => __( 'Choose a link-title for your slide.', 'law' )
	)
);

