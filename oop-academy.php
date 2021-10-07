<?Php
/**
 * Plugin Name: OOP Academy
 * Description: An OOP based Plugin.
 * Plugin URI:  #
 * Version:     1.0.0
 * Author:      Anisur Rahman
 * Author URI:  https:github.com/anisur2805
 * Text Domain: oop-academy
 * License:     GPL v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

use OOP\Academy\Ajax;
use OOP\Academy\Assets;
use OOP\Academy\Installer;

defined( 'ABSPATH' ) or die( 'No Cheating!' );

require_once __DIR__ . "/vendor/autoload.php";

/**
 * The main plugin class
 */
final class OOP_Academy {
    /**
     * plugin version
     */
    const version = '1.0';

    /**
     * class constructor
     */
    private function __construct() {
        $this->define_constants();

        register_activation_hook( __FILE__, [$this, 'activate'] );
        
        add_action( 'plugins_loaded', [$this, 'init_plugin'] );

    }

    /**
     * Initialize a singleton instance
     *
     * @return \OOP_Academy
     */
    public static function init() {
        static $instance = false;
        if ( !$instance ) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * define plugin require constants
     *
     * @return void
     */
    public function define_constants() {
        define( 'OOP_ACADEMY_VERSION', self::version );
        define( 'OOP_ACADEMY_FILE', __FILE__ );
        define( 'OOP_ACADEMY_PATH', __DIR__ );
        define( 'OOP_ACADEMY_URL', plugins_url( '', OOP_ACADEMY_FILE ) );
        define( 'OOP_ACADEMY_ASSETS', OOP_ACADEMY_URL . '/assets' );
        define( 'OOP_ACADEMY_INCLUDES', OOP_ACADEMY_URL . '/includes' );
    }

    /**
     * Do staff upon plugin activation
     *
     * @return void
     */
    public function activate() {
        $installer = new Installer();
        $installer->run();
    }
    
    public function init_plugin(  ) {
        
        new OOP\Academy\Assets();
        
        if( defined( 'DOING_AJAX') && DOING_AJAX ) {
            new Ajax();
        }
        
        if( is_admin()) {
            new \OOP\Academy\Admin();
        } else {
            new \OOP\Academy\Frontend();
        }
    }
    

}

/**
 * Initialize the main plugin
 *
 * @return \OOP_Academy
 */
function oop_academy() {
    return OOP_Academy::init();
}

oop_academy();
