<?php
namespace OOP\Academy;

use OOP\Academy;

class Admin {
    public function __construct() {
        $addressbook = new Admin\Addressbook();

        $this->dispatch_actions( $addressbook );
        new Admin\Menu( $addressbook );
    }

    public function dispatch_actions( $addressbook ) {

        $action = "oop-ac-delete-address";
        add_action( 'admin_init', [$addressbook, 'form_handler'] );

        add_action( 'admin_post_oop-ac-delete-address', [$addressbook, 'delete_address'] );
    }

}
