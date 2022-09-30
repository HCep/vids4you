<?php add_action( 'wp_ajax_nopriv_pt_like_it', 'pt_like_it' );
add_action( 'wp_ajax_pt_like_it', 'pt_like_it' );
function pt_like_it() {
 
    if ( ! wp_verify_nonce( $_REQUEST['nonce'], 'pt_like_it_nonce' ) || ! isset( $_REQUEST['nonce'] ) ) {
        exit( "No naughty business please" );
    }
 
    $likes = get_post_meta( $_REQUEST['post_id'], '_pt_likes', true );
    $likes = ( empty( $likes ) ) ? 0 : $likes;
    $new_likes = $likes + 1;
 
    update_post_meta( $_REQUEST['post_id'], '_pt_likes', $new_likes );
 
    if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
        echo $new_likes;
        die();
    }
    else {
        wp_redirect( get_permalink( $_REQUEST['post_id'] ) );
        exit();
    }
}
?>