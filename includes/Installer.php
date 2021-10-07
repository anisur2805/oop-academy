<?php
namespace OOP\Academy;

/**
 * Installer class
 */
class Installer {
    public function run() {
        $this->add_version();
        $this->create_tables();
    }

    public function add_version() {
        $installed = get_option( 'oop_academy_installed' );
        if ( !$installed ) {
            update_option( 'oop_academy_installed', time() );
        }

        update_option( 'oop_academy_version', OOP_ACADEMY_VERSION );
    }

    public function create_tables() {
        global $wpdb;

        $charset_collate = $wpdb->get_charset_collate();

        $schema = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}ac_addresses`(
            id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
            name varchar(100) NOT NULL DEFAULT '',
            phone varchar(30) DEFAULT NULL,
            address varchar(255) DEFAULT NULL,
            created_at DATETIME NOT NULL,
            created_by BIGINT(20) UNSIGNED NOT NULL,
            PRIMARY KEY (`id`)
        ) $charset_collate";

        if ( !function_exists( 'dbDelta' ) ) {
            require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        }

        dbDelta( $schema );
    }

}
