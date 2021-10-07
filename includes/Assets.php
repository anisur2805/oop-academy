<?php
namespace OOP\Academy;

class Assets {
    public function __construct() {
        add_action( 'wp_enqueue_scripts', [$this, 'enqueue_assets'] );
        add_action( 'admin_enqueue_scripts', [$this, 'enqueue_assets'] );
    }

    public function get_scripts() {
        return [
            'academy-script' => [
                'src'     => OOP_ACADEMY_ASSETS . '/js/frontend.js',
                'version' => filemtime( OOP_ACADEMY_PATH . '/assets/js/frontend.js' ),
                'deps'    => ['jquery'],
            ],
            'enquiry-script' => [
                'src'     => OOP_ACADEMY_ASSETS . '/js/enquiry.js',
                'version' => filemtime( OOP_ACADEMY_PATH . '/assets/js/enquiry.js' ),
                'deps'    => ['jquery'],
            ],
        ];
    }

    public function get_styles() {
        return [
            'academy-style' => [
                'src'     => OOP_ACADEMY_ASSETS . '/css/frontend.css',
                'version' => filemtime( OOP_ACADEMY_PATH . '/assets/css/frontend.css' ),
            ],
            'admin-style'   => [
                'src'     => OOP_ACADEMY_ASSETS . '/css/admin.css',
                'version' => filemtime( OOP_ACADEMY_PATH . '/assets/css/admin.css' ),
            ],
            'enquiry-style' => [
                'src'     => OOP_ACADEMY_ASSETS . '/css/enquiry.css',
                'version' => filemtime( OOP_ACADEMY_PATH . '/assets/css/enquiry.css' ),
            ],
        ];
    }

    public function enqueue_assets() {
        $scripts = $this->get_scripts();

        foreach ( $scripts as $handle => $script ) {
            $deps = isset( $script['deps'] ) ? $script['deps'] : false;
            wp_register_script( $handle, $script['src'], $deps, $script['version'], true );
        }

        $styles = $this->get_styles();

        foreach ( $styles as $handle => $style ) {
            $deps = isset( $style['deps'] ) ? $style['deps'] : false;
            wp_register_style( $handle, $style['src'], $deps, $style['version'] );

        }

        wp_localize_script( 'enquiry-script', 'oopAcademy', [
            'ajaxUrl' => admin_url( 'admin-ajax.php' ),
            'error'   => __( 'Something went wrong', 'oop-academy' ),
        ] );

    }

}
