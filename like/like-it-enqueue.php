<?php add_action( 'wp_enqueue_scripts', 'pt_like_it_scripts' );
function pt_like_it_scripts() {
    if( is_single() ) {
 
        wp_enqueue_style( 'like-it', trailingslashit( plugin_dir_url( __FILE__ ) ).'css/like-it.css' );
         
        if (!wp_script_is( 'jquery', 'enqueued' )) {
            wp_enqueue_script( 'jquery' );// Comment this line if you theme has already loaded jQuery
        }
    wp_enqueue_script( 'like-it', trailingslashit( plugin_dir_url( __FILE__ ) ).'js/like-it.js', array('jquery'), '1.0', true );
 
        wp_localize_script( 'like-it', 'likeit', array(
            'ajax_url' => admin_url( 'admin-ajax.php' )
        ));
    }
}?>