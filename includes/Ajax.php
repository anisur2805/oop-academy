<?php
namespace OOP\Academy;

class Ajax {
    public function __construct() {
        add_action( 'wp_ajax_oop_ac_enquiry', [$this, 'submit_enquiry'] );
    }

    public function submit_enquiry() {
        // wp_send_json_success([
        //     'message' => 'submit done!'
        // ]);
        
        if ( ! wp_verify_nonce( $_REQUEST['_wpnonce'], 'oop_ac_enquiry' ) ) {
            wp_send_json_error([
                'message' => 'Nonce verify failed!'
            ]); 
        }
        
        wp_send_json_error([
            'message' => 'submit failed!'
        ]);
    }

}
