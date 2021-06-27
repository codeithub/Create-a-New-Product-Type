add_filter( 'product_type_selector', 'codeithub_add_custom_product_type' );
 
function codeithub_add_custom_product_type( $types ){
    $types[ 'custom' ] = 'Custom product';
    return $types;
}

 
add_action( 'init', 'codeithub_create_custom_product_type' );
 
function codeithub_create_custom_product_type(){
    class WC_Product_Custom extends WC_Product {
      public function get_type() {
         return 'custom';
      }
    }
}
 
 
add_filter( 'woocommerce_product_class', 'codeithub_woocommerce_product_class', 10, 2 );
 
function codeithub_woocommerce_product_class( $classname, $product_type ) {
    if ( $product_type == 'custom' ) {
        $classname = 'WC_Product_Custom';
    }
    return $classname;
}
