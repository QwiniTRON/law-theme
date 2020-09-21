<?php if (!defined( 'FW' )) die('Forbidden');

$options = array(
    'general' => array(
        'type'  => 'tab',
        'title' => __('General', 'law'),
        "options" => array(
            "footer_text" => array(
                'type'  => 'wp-editor',
                'label' => __('Text in footer', 'law'),
                "desc"  => __("write text for footer", 'law'),
                "help"  => __('Write text for footer', 'law'),
            ),
            "header_image" => array(
                'type'  => 'upload',
                'label' => __('Header image', 'law'),
            )
        )
    ),
    'colors' => array(
        'type'  => 'tab',
        'title' => __('Colors', 'law'),
        "options" => array(
            "header_color" => array(
                'type'  => 'color-picker',
                'label' => __('Color to footer', 'law'),
                "value" => "#ffffff",
                "desc"  => __("Choose header color", 'law'),
                "help"  => __('Choose color', 'law'),
            )
        )
    )
);

?>