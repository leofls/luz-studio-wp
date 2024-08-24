<?php 

function get_gallery(WP_REST_Request $request) {
    
    $args = array(
        'post_type' => 'gallery',
        'posts_per_page' => -1,
    );
    

    $query = new WP_Query($args);
    $carousel_images = array();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $carousel_images[] = array(
                'id' => get_the_ID(),
                'title' => get_the_title(),
                'slug' => get_post_field('post_name', get_post()),
                'fields' => get_fields(),
            );
        }
        wp_reset_postdata(); // Reseta o post data
    }

    return new WP_REST_Response($carousel_images, 200);
}

function register_gallery_route() {
    register_rest_route('api', '/gallery', array(
        array(
            'methods' => WP_REST_Server::READABLE,
            'callback' => 'get_gallery',
        ),
    ));
}


add_action('rest_api_init', 'register_gallery_route');