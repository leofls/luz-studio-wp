<?php 

function get_carousel_images(WP_REST_Request $request, $local=null) {
    if(!$local) {
        $local = $request->get_param('local');
    }

    $args = array(
        'post_type' => 'carousel',
        'posts_per_page' => 10,
    );
    if ($local) {
        $args['meta_key'] = 'local';
        $args['meta_value'] = $local;
    }

    $query = new WP_Query($args);
    $carousel_images = array();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $carousel_images[] = array(
                'id' => get_the_ID(),
                'title' => get_the_title(),
                // 'content' => get_the_content(),
                // 'image' => get_the_post_thumbnail_url(),
                'fields' => get_fields(),
            );
        }
        wp_reset_postdata(); // Reseta o post data
    }

    return new WP_REST_Response($carousel_images, 200);
}

function register_carousel_images_route() {
    register_rest_route('api', '/carousel/(?P<slug>[a-zA-Z0-9-]+)', array(
        array(
            'methods' => WP_REST_Server::READABLE,
            'callback' => 'get_carousel_images',
        ),
    ));
}


add_action('rest_api_init', 'register_carousel_images_route');