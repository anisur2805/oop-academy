<div class="wrap">
    <h1 class="wp-heading-inline"><?php _e( 'Add Address', 'oop-academy' );?></h1>
    <?php

function inputLabel( $for, $name ) {
    echo '<label for="' . $for . '">' . __( $name, 'oop-academy' ) . '</label>';
}

function input_field( $id, $value, $name, $type = "text", $class = "regular-text" ) {
    echo '<input id="' . $id . '" name="' . $name . '" value="" type="' . $type . '" class="' . $class . '" />';
}

?>
    <form action="" method="post">
        <table class="form-table">
            <tbody>
                <th>
                    <tr class="row<?php echo $this->has_error( 'name' ) ? ' form-invalid' : ''; ?>">
                        <th scope="row">
                            <?php inputLabel( 'name', 'Name' );?>
                        </th>

                        <td>
                            <?php input_field( "name", "value", "name" );?>
                            <?php if ( $this->has_error( 'name' ) ) {?>
                                <p class="description error"> <?php echo $this->get_error( 'name' ); ?> </p>
                            <?php }?>

                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                             <?php inputLabel( 'address', 'Address' );?>
                        </th>

                        <td>
                            <textarea name="address" id="address" class="regular-text" value=""></textarea>
                        </td>
                    </tr>

                    <tr class="row<?php echo $this->has_error( 'name' ) ? ' form-invalid' : ''; ?>">
                        <th scope="row">
                            <?php inputLabel( 'phone', 'Phone' );?>
                        </th>

                        <td>
                             <?php input_field( "phone", 'phone', "phone" );?>
                            <?php if ( $this->has_error( 'phone' ) ) {?>
                                <p class="description error"> <?php echo $this->get_error( 'phone' ); ?> </p>
                            <?php }?>

                        </td>
                    </tr>
                </th>
            </tbody>
        </table>


        <?php
wp_nonce_field( 'new-address' );
submit_button( __( 'Add Address', 'oop-academy' ), 'primary', 'submit_address' );
?>
    </form>
</div>