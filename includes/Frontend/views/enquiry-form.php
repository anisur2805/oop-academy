<div class="oop-academy-wrapper" id="oop-academy-wrapper">
    <?php
        function inputLabel( $for, $name ) {
            echo '<label for="' . $for . '">' . __( $name, 'oop-academy' ) . '</label>';
        }

        function input_field( $id, $value, $name, $type = "text", $class = "regular-text" ) {
            echo '<input id="' . $id . '" name="' . $name . '" value="" type="' . $type . '" class="' . $class . '" require />';
        }

    ?>
    <form action="" method="post">
        <div class="form-group-row">
            <?php 
                inputLabel( 'name', 'Name' );
                input_field( "name", "value", "name" );
            ?>
        </div>
        
        <div class="form-group-row">
            <?php 
                inputLabel( 'email', 'Email' );
                input_field( "email", "value", "email" );
            ?>
        </div>
        
        <div class="form-group-row">
            <?php 
                inputLabel( 'message', 'Message' );
                // input_field( "message", "value", "message" );
                printf("<textarea name='message' id='message' value='' class='regular-text'></textarea>", );
            ?>
        </div>
        
        <div class="form-group-row">
            <?php wp_nonce_field( 'enquiry-form' ); ?> 
            <input type="hidden" name="action" value="oop_ac_enquiry">    
            <input type="submit" name="send_enquiry" value="<?php esc_attr_e('Send Enquiry', 'oop-academy'); ?>" />
        </div>
    </form>
</div>