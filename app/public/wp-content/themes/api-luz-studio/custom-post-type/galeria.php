<?php

use WpOrg\Requests\Capability;

function register_cpt_gallery() {
    register_post_type('gallery', array(
        'labels' => array(
            'name' => __('Galeria'),
            'singular_name' => __('Galeria'),
            'add_new' => __('Adicionar nova'),
            'add_new_item' => __('Adicionar nova galeria'),
            'edit_item' => __('Editar galeria'),
            'new_item' => __('Nova galeria'),
            'view_item' => __('Ver galeria'),
            'search_items' => __('Procurar imagens'),
            'not_found' => __('Nenhuma galeria encontrada'),
            'not_found_in_trash' => __('Nenhuma galeria encontrada na lixeira')
        ),
        'public' => true,
        'menu_icon' => 'dashicons-format-gallery',
        'show_ui' => true,
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'galeria', 'with_front' => true),
        'query_var' => true,
        'supports' => array('custom-fields', 'title',),
        'publicly_queryable' => true,
    ));
}

add_action('init', 'register_cpt_gallery');