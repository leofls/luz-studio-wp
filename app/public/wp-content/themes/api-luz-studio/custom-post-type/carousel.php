<?php
function register_cpt_carousel() {
    register_post_type('carousel', array(
        'labels' => array(
            'name' => __('Carrossels'),
            'singular_name' => __('Carrossel'),
            'add_new' => __('Adicionar novo'),
            'add_new_item' => __('Adicionar novo carrossel'),
            'edit_item' => __('Editar carrossel'),
            'new_item' => __('Nova carrossel'),
            'view_item' => __('Ver carrossel'),
            'search_items' => __('Procurar carrossels'),
            'not_found' => __('Nenhuma carrossel encontrada'),
            'not_found_in_trash' => __('Nenhuma carrossel encontrada na lixeira')
        ),
        'public' => true,
        'menu_icon' => 'dashicons-slides',
        'show_ui' => true,
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'carousel', 'with_front' => true),
        'query_var' => true,
        'supports' => array('custom-fields', 'title', ),
        'publicly_queryable' => true,
    ));
}

add_action('init', 'register_cpt_carousel');