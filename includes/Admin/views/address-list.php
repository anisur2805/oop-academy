<?php
use OOP\Academy\Admin\Address_List;
?>
<div class="wrap">
    <h1 class="wp-heading-inline">
        <?php _e( 'Address Book', 'oop-academy' );?>
    </h1>
    
    <a href="<?php echo admin_url( 'admin.php?page=oop-academy&action=new' ) ?>" class="page-title-action">
        <?php _e( 'Add New', 'oop-academy' );?>
    </a>
    
    <?php 
        if( isset( $_GET['inserted'] ) ) {
            printf('<div class="notice notice-success"><p>' .__('Address added successfully!', 'oop-academy') . '</p></div>');
        }
    ?>
    <form action="" method="post">
        <?php
            $table = new Address_List();
            $table->prepare_items();
            $table->display();
        ?>
    </form>
</div>