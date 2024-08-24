<?php

use WpOrg\Requests\Capability;

function register_cpt_imagem() {
    register_post_type('imagem', array(
        'labels' => array(
            'name' => __('Imagens'),
            'singular_name' => __('Imagem'),
            'add_new' => __('Adicionar nova'),
            'add_new_item' => __('Adicionar nova imagem'),
            'edit_item' => __('Editar imagem'),
            'new_item' => __('Nova imagem'),
            'view_item' => __('Ver imagem'),
            'search_items' => __('Procurar imagens'),
            'not_found' => __('Nenhuma imagem encontrada'),
            'not_found_in_trash' => __('Nenhuma imagem encontrada na lixeira')
        ),
        'public' => true,
        'menu_icon' => 'dashicons-format-image',
        'show_ui' => true,
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'imagem', 'with_front' => true),
        'query_var' => true,
        'supports' => array('custom-fields', 'author', 'title', 'thumbnail',),
        'publicly_queryable' => true,
    ));
}

add_action('init', 'register_cpt_imagem');