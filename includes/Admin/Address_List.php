<?php

namespace OOP\Academy\Admin;

if ( !class_exists( 'WP_List_Table' ) ) {
    require_once ABSPATH . "wp-admin/includes/class-wp-list-table.php";
}

class Address_List extends \WP_List_Table {
    public function __construct() {
        parent::__construct( [
            'singular' => 'contact',
            'plural'   => 'contacts',
            'ajax'     => false,
        ] );
    }

    public function get_columns() {
        return [
            "cb"         => '<input type="checkbox" />',
            'name'       => __( "Name", "oop-academy" ),
            'address'    => __( "Address", "oop-academy" ),
            'phone'      => __( "Phone", "oop-academy" ),
            'created_at' => __( "Date", "oop-academy" ),
        ];
    }

    public function prepare_items() {
        $column   = $this->get_columns();
        $hidden   = [];
        $sortable = $this->get_sortable_columns();

        $this->_column_headers = [$column, $hidden, $sortable];
    }

}
