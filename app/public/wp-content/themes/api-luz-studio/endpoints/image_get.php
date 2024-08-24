<?php 
function api_imagem_get(WP_REST_Request $request) {
    $args = array(
        'post_type' => 'imagem',
        'posts_per_page' => -1,
    );

    $query = new WP_Query($args);
    $imagens = array();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $imagens[] = array(
                'id' => get_the_ID(),
                'title' => get_the_title(),
                'content' => get_the_content(),
                'thumbnail' => get_the_post_thumbnail_url(),
                'Image' => get_fields(),
            );
        }
    }

    return new WP_REST_Response($imagens, 200);
}

function registrar_api_imagem_get() {
    register_rest_route('api', '/imagem', array(
        array(
            'methods' => WP_REST_Server::READABLE,
            'callback' => 'api_imagem_get',
        ),
    ));
}

add_action('rest_api_init', 'registrar_api_imagem_get');