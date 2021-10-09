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

    /**
     * Get sortable columns
     *
     * @return array
     */
    public function get_sortable_columns() {
        $sortable_columns = [
            'name'       => ['name', true],
            'created_at' => ['created_at', true],
        ];

        return $sortable_columns;
    }

    protected function column_default( $item, $column_name ) {

        switch ( $column_name ) {
        case 'value':
            # code...
            break;

        default:
            return isset( $item->$column_name ) ? $item->$column_name : '';
        }
    }

    public function column_name( $item ) {
        $actions = [];

        $actions['edit']   = sprintf( '<a href="%s" title="%s">%s</a>', admin_url( 'admin.php?page=oop-academy&action=edit&id=' . $item->id ), $item->id, __( 'Edit', 'oop-academy' ), __( 'Edit', 'oop-academy' ) );
        $actions['delete'] = sprintf( '<a href="%s" class="submitdelete" title="%s" onclick="return confirm(\'Are you sure?\');">%s</a>', wp_nonce_url( admin_url( 'admin-post.php?page=oop-ac-delete-address&action=edit&id=' . $item->id ) ), $item->id, __( 'Delete', 'oop-academy' ), __( 'Delete', 'oop-academy' ) );

        return sprintf(
            '<a href="%1$s"><strong>%2$s</strong></a> %3$s',
            admin_url( 'admin.php?page=oop-academy&action=view&id' . $item->id ),
            $item->name,
            $this->row_actions( $actions )
        );
    }

    public function column_cb( $item ) {
        return sprintf(
            '<input type="checkbox" name="address_id[]" value="%d" />', $item->id
        );
    }

    public function prepare_items() {
        $column   = $this->get_columns();
        $hidden   = [];
        $sortable = $this->get_sortable_columns();
        $per_page = 20;

        $this->_column_headers = [$column, $hidden, $sortable];

        $per_page     = 20;
        $current_page = $this->get_pagenum();
        $offset       = ( $current_page - 1 ) * $per_page;

        $args = [
            'number' => $per_page,
            'offset' => $offset,
        ];

        if( isset( $_REQUEST['orderby']) && isset( $_REQUEST['order' ] ) ) {
            $args['orderby'] = $_REQUEST['orderby'];
            $args['order'] = $_REQUEST['order'];
        }

        $this->items = opp_ac_get_addresses( $args );

        $this->set_pagination_args( [
            'total_items' => oop_ac_addresses_count(),
            'per_page'    => $per_page,
        ] );
    }

}
