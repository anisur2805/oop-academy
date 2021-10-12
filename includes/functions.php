<?php

/**
 * Insert a new address
 *
 * @param array $args
 *
 * @return int|WP_Error
 */
function oop_ac_insert_address( $args = [] ) {
    global $wpdb;

    if ( empty( $args['name'] ) ) {
        return new \WP_Error( 'no-name', __( 'You must provide a name', 'oop-academy' ) );
    }

    $defaults = [
        "name"       => '',
        "address"    => '',
        "phone"      => '',
        "created_by" => get_current_user_id(),
        "created_at" => current_time( 'mysql' ),
    ];

    $data = wp_parse_args( $args, $defaults );

    if ( isset( $data['id'] ) ) {

        $id = $data['id'];
        unset( $data['id'] );

        $updated = $wpdb->update(
            "{$wpdb->prefix}ac_addresses",
            $data,
            ['id' => $id],
            [
                '%s',
                '%s',
                '%s',
                '%d',
                '%s',
            ],
            ['%d']
        );

        return $updated;
    } else {

        $inserted = $wpdb->insert(
            "{$wpdb->prefix}ac_addresses",
            $data,
            [
                '%s',
                '%s',
                '%s',
                '%d',
                '%s',
            ]
        );

        if ( !$inserted ) {
            return new \WP_Error( 'failed-to-insert', __( 'Failed to insert', 'oop-academy' ) );
        }

        return $wpdb->insert_id;
    }

}

/**
 * Fetch address
 *
 * @param array
 *
 * @return array
 */
function opp_ac_get_addresses( $args = [] ) {
    global $wpdb;

    $defaults = [
        "offset"  => 0,
        "number"  => 20,
        "orderby" => "id",
        "order"   => "ASC",
    ];

    $args = wp_parse_args( $args, $defaults );

    $items = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT * FROM {$wpdb->prefix}ac_addresses
            ORDER BY {$args["orderby"]} {$args["order"]}
            LIMIT %d OFFSET %d",
            $args["number"], $args["offset"],
        )
    );

    return $items;

}

/**
 * Get the count
 *
 * @return int
 */
function oop_ac_addresses_count() {
    global $wpdb;

    return (int) $wpdb->get_var( "SELECT count(id) FROM {$wpdb->prefix}ac_addresses " );
}

/**
 * Fetch a single contact form DB
 *
 * @param int $id
 *
 * @return object
 */
function oop_ac_get_address( $id ) {
    global $wpdb; // Global WPDB class object

    return $wpdb->get_row(
        $wpdb->prepare(  // use prepare for avoid sql injection
            "SELECT  * FROM {$wpdb->prefix}ac_addresses WHERE id = %d", $id // select by id
        )
    );
}

/**
 * Delete an address
 *
 * @param int $id
 *
 * @return int|boolean
 */
function oop_ac_delete_address( $id ) {
    global $wpdb;

    return $wpdb->delete(
        $wpdb->prefix . 'ac_addresses',
        ['id' => $id],
        ['%d'],
    );
}
