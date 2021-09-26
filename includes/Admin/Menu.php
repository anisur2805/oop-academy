<?php

namespace OOP\Academy\Admin;

/**
 * Menu class
 */
class Menu {
    public function __construct() {
        add_action( 'admin_menu', [$this, 'admin_menu'] );
    }

    public function admin_menu() {
        $hook = add_menu_page( __( 'OOP Academy', 'oop-academy' ), __( 'OOP Academy', 'oop-academy' ), 'manage_options', 'oop-academy', [$this, 'plugin_page'], 'dashicons-welcome-learn-more' );
        
        add_action( 'admin_head-' . $hook, [$this, 'enqueue_assets'] );
    }

    public function plugin_page() {
        echo "hello world";
    }
    
    public function enqueue_assets() {
         wp_enqueue_style('admin-style');
    }

}
