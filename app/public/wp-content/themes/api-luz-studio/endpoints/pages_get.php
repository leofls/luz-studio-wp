<?php 

function api_pages_get(WP_REST_Request $request) {
    $args = array(
        'post_type' => 'page',
        'posts_per_page' => -1,
    );

    $query = new WP_Query($args);
    $imagens = array();
    $pages = array(
        'pages' => [],
    );

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            
            $slug = get_post_field('post_name', get_post());

            $pages['pages'][$slug] = array(
                'id' => get_the_ID(),
                'title' => get_the_title(),
                'slug' => get_post_field('post_name', get_post()),
                // 'content' => get_the_content(),
                // 'thumbnail' => get_the_post_thumbnail_url(),
                'fields' => [],
            );
            if ($slug == 'home') {
                $carousel = get_carousel_images($request, $slug);
                $pages['pages'][$slug]['carousel'] = $carousel->data;
            }

            if ($slug == 'gallery') {
                $categories = get_field('categories');
                
                $gallery = get_gallery($request);
                $pages['pages'][$slug]['fields']['categories'] = $gallery->data;
                
            }
        }
        wp_reset_postdata(); // Reseta o post data
    }

    

    return new WP_REST_Response($pages, 200);
}

function registrar_api_pages_get() {
    register_rest_route('api', '/pages', array(
        array(
            'methods' => WP_REST_Server::READABLE,
            'callback' => 'api_pages_get',
        ),
    ));
}

add_action('rest_api_init', 'registrar_api_pages_get');

function get_page_by_slug(WP_REST_Request $request) {
    $slug = $request->get_param('slug');

    $args = array(
        'name' => $slug,
        'post_type' => 'page',
        'post_status' => 'publish',
        'posts_per_page' => 1,
    );

    $query = new WP_Query($args);
    $page_data = array();

    if ($query->have_posts()) {
        $query->the_post();
        
        $slug = get_post_field('post_name', get_post());

        $page_data[$slug] = array(
            'id' => get_the_ID(),
            'title' => get_the_title(),
            'slug' => get_post_field('post_name', get_post()),
            // 'content' => get_the_content(),
            // 'thumbnail' => get_the_post_thumbnail_url(),
            'fields' => [],
        );
        if ($slug == 'home') {
            $carousel = get_carousel_images($request, $slug);
            $page_data[$slug]['carousel'] = $carousel->data;
        }

        if ($slug == 'gallery') {
            $categories = get_field('categories');
            
            $gallery = get_gallery($request);
            $page_data[$slug]['fields']['categories'] = $gallery->data;
            
        }
        wp_reset_postdata(); // Reseta o post data
    } else {
        return new WP_Error('no_page', 'Página não encontrada', array('status' => 404));
    }

    return new WP_REST_Response($page_data, 200);
}

function register_page_slug_route() {
    register_rest_route('api', '/pages/(?P<slug>[a-zA-Z0-9-]+)', array(
        'methods' => WP_REST_Server::READABLE,
        'callback' => 'get_page_by_slug',
        'permission_callback' => '__return_true',
    ));
}

add_action('rest_api_init', 'register_page_slug_route');
