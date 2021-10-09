<?php

namespace OOP\Academy\Frontend;

class Enquiry {

    /**
     * Initialize the class
     */
    public function __construct() {
        add_shortcode( 'enquiry_form', [$this, 'render_shortcode'] );
    }

    /**
     * Shortcode handler
     *
     * @param array $atts
     * @param string $content
     *
     * @return string
     */
    public function render_shortcode( $atts, $content = null ) {
        wp_enqueue_script( 'enquiry-script' );
        wp_enqueue_style( 'enquiry-style' );

        ob_start();
        include __DIR__ . "/views/enquiry-form.php";
        return ob_get_clean();

    }

}
