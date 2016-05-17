<?php

function fhm_posts() {

    $cpt_args = array(
        'label'   => 'Popups',
        'show_ui' => true,
        'supports' => array( 'title', 'thumbnail', 'editor' ),
    );
    register_post_type( 'fhm_popup', $cpt_args );

    $tax_args = array(
        'label'   => 'Popup Tags',
    );
    register_taxonomy( 'fhm_popup_tag', 'fhm_popup', $tax_args );

}
add_action( 'init', 'fhm_posts' );

function fhm_popup_endpoint() {

    add_rewrite_tag( '%fhm_popup%', '([^&]+)' );
    add_rewrite_rule( 'popups/([^&]+)/?', 'index.php?fhm_popup=$matches[1]', 'top' );

}
add_action( 'init', 'fhm_popup_endpoint' );

function fhm_popup_endpoint_data() {

    global $wp_query;

    $popup_tag = $wp_query->get( 'fhm_popup' );

    if ( ! $popup_tag ) {
        return;
    }

    $popup_data = array();

    $args = array(
        'post_type'      => 'fhm_popup',
        'posts_per_page' => 100,
        'fhm_popup_tag'    => esc_attr( $popup_tag ),
    );
    $popup_query = new WP_Query( $args );
    if ( $popup_query->have_posts() ) : while ( $popup_query->have_posts() ) : $popup_query->the_post();
        $img_id = get_post_thumbnail_id();
        $img = wp_get_attachment_image_src( $img_id, 'full' );
        $popup_data[] = array(
            'link'  => esc_url( $img[0] ),
            'title' => get_the_title(),
            'content' => get_the_content('Read more'),
        );
    endwhile; wp_reset_postdata(); endif;

    wp_send_json( $popup_data );

}
add_action( 'template_redirect', 'fhm_popup_endpoint_data' );

?>