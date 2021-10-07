<?php
namespace OOP\Academy;

// use OOP\Academy\Frontend\Enquiry;

class Frontend {
    public function __construct() {
        new Frontend\Shortcode();
        new Frontend\Enquiry();
    }
}
