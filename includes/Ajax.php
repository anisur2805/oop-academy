<?php
namespace OOP\Academy;

class Ajax {
 public function __construct() {
  add_action( 'wp_ajax_oop_ac_enquiry', [$this, 'submit_enquiry'] );
  add_action( 'wp_ajax_nopriv_oop_ac_enquiry', [$this, 'submit_enquiry'] );
  add_action( 'wp_ajax_oop-ac-contact-delete', [$this, 'delete_contact'] );
  add_action( 'wp_ajax_oop-ac-contact-delete', [$this, 'delete_contact'] );
 }

 public function submit_enquiry() {
  if ( !wp_verify_nonce( $_REQUEST['_wpnonce'], 'enquiry-form' ) ) {
   wp_send_json_error( [
    'message' => 'Nonce verify failed!',
   ] );
  }
  wp_send_json_success( [
   'message' => 'submit done!',
  ] );

  // wp_send_json_error([
  //     'message' => 'submit failed!'
  // ]);
 }

 public function delete_contact() {
  wp_send_json_success();
 }

}
