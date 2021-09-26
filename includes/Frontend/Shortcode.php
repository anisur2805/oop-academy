<?php

namespace OOP\Academy\Frontend;

class Shortcode {
    
    /**
     * Initialize the class
     */
    public function __construct() {
        add_shortcode('oop_academy', [$this, 'render_shortcode']);
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
        wp_enqueue_script('academy-script');
        wp_enqueue_style('academy-style');
        
        return '<div class="oop-shortcode">BG Green Shortcode</div>';
        
    }
    
}
