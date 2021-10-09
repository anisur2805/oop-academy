<?php

namespace OOP\Academy\Admin;

/**
 * Menu class
 */
class Menu {
    public $addressbook;
    
    public function __construct( $addressbook ) {
        $this->addressbook = $addressbook;
        
        add_action( 'admin_menu', [$this, 'admin_menu'] );
    }

    public function admin_menu() {
        $capability = 'manage_options';
        $parent_slug = 'oop-academy';
        
        // $hook = 
        $page_title = __( 'OOP Academy', 'oop-academy' );
        add_menu_page( $page_title, $page_title, $capability, $parent_slug, [$this->addressbook, 'plugin_page'], 'dashicons-welcome-learn-more' );
        add_submenu_page($parent_slug, __('Address Book', 'oop-academy'), __('Address Book', 'oop-academy'), $capability, 'oop-academy', [$this->addressbook, 'plugin_page']);
        add_submenu_page($parent_slug, __('Settings', 'oop-academy'), __('Settings', 'oop-academy'), $capability, 'oop-academy-settings', [$this, 'settings_page']);
        
        // add_submenu_page( $parent_slug:string, $page_title:string, $menu_title:string, $capability:string, $menu_slug:string, $function:callable, $position:integer|null )
        
        // add_action( 'admin_head-' . $hook, [$this, 'enqueue_assets'] );
    }
    
    // public function enqueue_assets() {
    //      wp_enqueue_style('admin-style');
    // }
    
    // public function address_book_page() {
    //     $addressbook = new Addressbook();
    //     $addressbook->plugin_page();
    // }
    
    public function settings_page() {
        echo "Hello from settings page";
    }
    

}
