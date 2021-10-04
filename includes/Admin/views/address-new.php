<div class="wrap">
    <h1 class="wp-heading-inline"><?php _e('Add Address', 'oop-academy'); ?></h1>

    <form action="" method="post">
        <table class="form-table">
            <tbody>
                <th>
                    <tr>
                        <th scope="row">
                            <label for="name"><?php _e('Name', 'oop-academy'); ?></label>
                        </th>
                        
                        <td>
                            <input type="text" name="name" id="name" class="regular-text" value="" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="address"><?php _e('Address', 'oop-academy'); ?></label>
                        </th>
                        
                        <td>
                            <textarea name="address" id="address" class="regular-text" value=""></textarea>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">
                            <label for="phone"><?php _e('Phone', 'oop-academy'); ?></label>
                        </th>
                        
                        <td>
                            <input type="text" name="phone" id="phone" class="regular-text" value="" />
                        </td>
                    </tr>
                </th>
            </tbody>
        </table>
        
        
        <?php 
        wp_nonce_field('new-address');
        submit_button( __('Add Address', 'oop-academy'), 'primary', 'submit_address'); ?>
    </form>
</div>