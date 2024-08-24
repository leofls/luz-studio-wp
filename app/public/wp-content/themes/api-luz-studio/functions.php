<?php 

$template_diretorio = get_template_directory();

/**
 * Register Custom Post Types
 */
require_once $template_diretorio . '/custom-post-type/imagem.php';
require_once $template_diretorio . '/custom-post-type/carousel.php';
require_once $template_diretorio . '/custom-post-type/galeria.php';

/**
 * Register the Endpoint
 */
require_once $template_diretorio . '/endpoints/image_get.php';
require_once $template_diretorio . '/endpoints/pages_get.php';
require_once $template_diretorio . '/endpoints/carousel_get.php';
require_once $template_diretorio . '/endpoints/gallery_get.php';


add_theme_support('post-thumbnails'); // Adiciona suporte a imagens destacadas aos posts

function remove_editor_from_page() {
    remove_post_type_support('page', 'editor');
}
add_action('init', 'remove_editor_from_page');