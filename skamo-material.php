<?php
/**
 * Plugin Name: SkamoWall Material Calculating
 * Description: Calculate your material consumption for SkamoWall
 * Version: 1.0
 * Author: Kling
 * Author URI: https://freelancer.com
 * Text Domain: woocommerce
 *
 */

defined( 'ABSPATH' ) || exit;
if ( ! defined( 'SW_PLUGIN_FILE' ) ) {
	define( 'SW_PLUGIN_FILE', __FILE__ );
}
class SkamoWall{
    public static $skamowall_product_ids = array(
        'board_id' => 5823,  
        'plaster_structure_id' => 5777,  
        'plaster_smooth_id' => 5776,  
        'adhesive_id' => 5779,  
        'primer_id' => 5778,  
        'protox_id' => 5782,  
        'mesh_id' => 5837,  
        'wedge_id' => 5839,
        'corner_id' => 5841,
        'bore_id' => 5775,
        'pallet_id' => 5951,
    );

    /**
     * Hook in tabs.
     */
    public static function init() {
        add_shortcode( 'skamowallmaterial',__CLASS__.'::display');
        add_action('wp',array(__CLASS__,'add_shopping_cart'));
    }
    public static function display(){
        ob_start();
        include_once 'calculating.php';
        return ob_get_clean();
    }
    public static function add_shopping_cart(){
        if(isset($_POST['mass_shopping'])&&$_POST['mass_shopping']=="skamo"){
            if ( isset( $_POST['mass_shopping_action'] ) && wp_verify_nonce( $_POST['mass_shopping_action'], 'mass_shopping_action' ) ) {      
                //WC()->cart->empty_cart();      
                if(isset($_POST['products'])&&count($_POST['products'])>0){
                    foreach($_POST['products'] as $product){
                        if(isset($product['variation_id']))
                            WC()->cart->add_to_cart( $product['id'],$product['quantity'],$product['variation_id'] );
                        else
                            WC()->cart->add_to_cart( $product['id'],$product['quantity'] );
                    }
                }
            }        
        }
    }
}
SkamoWall::init();
//add_action('wp','testing');
function testing(){
}