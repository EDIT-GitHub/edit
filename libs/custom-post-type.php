<?php

/**
 * custom_post_type short summary.
 *
 * custom_post_type description.
 *
 * @version 1.0
 * @author nuno.ildefonso
 */

/////////////////////////////////////////
// Custom Post Types
////////////////////////////////////////

function register_cpt_slider() {

    $labels = array( 
        'name' => _x( 'Slider', 'slider' ),
        'singular_name' => _x( 'Slider item', 'slider' ),
        'add_new' => _x( 'Adicionar Slide', 'slider' ),
        'add_new_item' => _x( 'Adicionar Slide', 'slider' ),
        'edit_item' => _x( 'Editar Slide', 'slider' ),
        'new_item' => _x( 'Novo Slide', 'slider' ),
        'view_item' => _x( 'Ver Slide', 'slider' ),
        'search_items' => _x( 'Procurar Slide', 'slider' ),
        'not_found' => _x( 'Nenhum Slide encontrado', 'slider' ),
        'not_found_in_trash' => _x( 'Nenhum Slide encontrado no lixo', 'slider' ),
        'parent_item_colon' => _x( 'Slide Pai:', 'slider' ),
        'menu_name' => _x( 'Slider', 'slider' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'supports' => array('title', 'page-attributes', 'revisions'),
        'taxonomies' => array('category','post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'hierarchical' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'capability_type' => 'page'
    );

    register_post_type( 'slider', $args );
}

function register_cpt_noticias() {

    $labels = array( 
        'name' => _x( 'Noticias', 'noticias' ),
        'singular_name' => _x( 'Noticia', 'noticias' ),
        'add_new' => _x( 'Adicionar Noticia', 'noticias' ),
        'add_new_item' => _x( 'Adicionar Noticia', 'noticias' ),
        'edit_item' => _x( 'Editar Noticia', 'noticias' ),
        'new_item' => _x( 'Nova Noticia', 'noticias' ),
        'view_item' => _x( 'Ver Noticia', 'noticias' ),
        'search_items' => _x( 'Procurar Noticia', 'noticias' ),
        'not_found' => _x( 'Nenhuma Noticia encontrado', 'noticias' ),
        'not_found_in_trash' => _x( 'Nenhuma Noticia encontrada no lixo', 'noticias' ),
        'parent_item_colon' => _x( 'Noticia Pai:', 'noticias' ),
        'menu_name' => _x( 'Noticias', 'noticias' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'supports' => array('title', 'page-attributes', 'revisions'),
        'taxonomies' => array('category','post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'hierarchical' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'capability_type' => 'page'
    );

    register_post_type( 'noticias', $args );
}

function register_cpt_formacao() {
    $labels = array( 
        'name' => _x( 'Formações', 'formacao' ),
        'singular_name' => _x( 'Formação', 'formacao' ),
        'add_new' => _x( 'Adicionar Formação', 'formacao' ),
        'add_new_item' => _x( 'Adicionar Formação', 'formacao' ),
        'edit_item' => _x( 'Editar Formação', 'formacao' ),
        'new_item' => _x( 'Nova Formação', 'formacao' ),
        'view_item' => _x( 'Ver Formação', 'formacao' ),
        'search_items' => _x( 'Procurar Formação', 'formacao' ),
        'not_found' => _x( 'Nenhuma Formação encontrado', 'formacao' ),
        'not_found_in_trash' => _x( 'Nenhuma Formação encontrada no lixo', 'formacao' ),
        'parent_item_colon' => _x( 'Formação Pai:', 'formacao' ),
        'menu_name' => _x( 'Formações', 'formacao' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'supports' => array('title', 'page-attributes', 'revisions'),
        'taxonomies' => array('category','post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'hierarchical' => true,
        'show_in_nav_menus' => true,
        //'rewrite' => array( 'slug' => 'cursos-e-workshops' ),
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'capability_type' => 'page'
    );

    register_post_type( 'formacao', $args );
}

function register_cpt_formacao_tipo() {

    $labels = array( 
        'name' => _x( 'Tipo Formações', 'formacao_tipo' ),
        'singular_name' => _x( 'Tipo Formação', 'formacao_tipo' ),
        'add_new' => _x( 'Adicionar Tipo Formação', 'formacao_tipo' ),
        'add_new_item' => _x( 'Adicionar Tipo Formação', 'formacao_tipo' ),
        'edit_item' => _x( 'Editar Tipo Formação', 'formacao_tipo' ),
        'new_item' => _x( 'Novo Tipo Formação', 'formacao_tipo' ),
        'view_item' => _x( 'Ver Tipo Formação', 'formacao_tipo' ),
        'search_items' => _x( 'Procurar Tipo Formação', 'formacao_tipo' ),
        'not_found' => _x( 'Nenhum Tipo Formação encontrado', 'formacao_tipo' ),
        'not_found_in_trash' => _x( 'Nenhum Tipo Formação encontrada no lixo', 'formacao_tipo' ),
        'parent_item_colon' => _x( 'Tipo Formação Pai:', 'formacao_tipo' ),
        'menu_name' => _x( 'Tipo Formações', 'formacao_tipo' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'supports' => array('title', 'page-attributes', 'revisions'),
        'taxonomies' => array('category','post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'hierarchical' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'capability_type' => 'page'
    );

    register_post_type( 'formacao_tipo', $args );
}

function register_cpt_formacao_horarios() {

    $labels = array( 
        'name' => _x( 'Horários Formações', 'formacao_horarios' ),
        'singular_name' => _x( 'Horário Formação', 'formacao_horarios' ),
        'add_new' => _x( 'Adicionar Horário Formação', 'formacao_horarios' ),
        'add_new_item' => _x( 'Adicionar Horário Formação', 'formacao_horarios' ),
        'edit_item' => _x( 'Editar Horário Formação', 'formacao_horarios' ),
        'new_item' => _x( 'Novo Horário Formação', 'formacao_horarios' ),
        'view_item' => _x( 'Ver Horário Formação', 'formacao_horarios' ),
        'search_items' => _x( 'Procurar Horário Formação', 'formacao_horarios' ),
        'not_found' => _x( 'Nenhum Horário Formação encontrado', 'formacao_horarios' ),
        'not_found_in_trash' => _x( 'Nenhum Horário Formação encontrada no lixo', 'formacao_horarios' ),
        'parent_item_colon' => _x( 'Horário Formação Pai:', 'formacao_horarios' ),
        'menu_name' => _x( 'Horários Formações', 'formacao_horarios' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'supports' => array('title', 'page-attributes', 'revisions'),
        'taxonomies' => array('category','post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'hierarchical' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'capability_type' => 'page'
    );

    register_post_type( 'formacao_horarios', $args );
}

function register_cpt_formacao_area() {

    $labels = array( 
        'name' => _x( 'Áreas Formações', 'formacao_area' ),
        'singular_name' => _x( 'Área Formação', 'formacao_area' ),
        'add_new' => _x( 'Adicionar Área Formação', 'formacao_area' ),
        'add_new_item' => _x( 'Adicionar Área Formação', 'formacao_area' ),
        'edit_item' => _x( 'Editar Área Formação', 'formacao_area' ),
        'new_item' => _x( 'Nova Área Formação', 'formacao_area' ),
        'view_item' => _x( 'Ver Área Formação', 'formacao_area' ),
        'search_items' => _x( 'Procurar Área Formação', 'formacao_area' ),
        'not_found' => _x( 'Nenhuma Área Formação encontrado', 'formacao_area' ),
        'not_found_in_trash' => _x( 'Nenhuma Área Formação encontrada no lixo', 'formacao_area' ),
        'parent_item_colon' => _x( 'Área Formação Pai:', 'formacao_area' ),
        'menu_name' => _x( 'Áreas Formações', 'formacao_area' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'supports' => array('title', 'page-attributes', 'revisions'),
        'taxonomies' => array('category','post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'hierarchical' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'capability_type' => 'page'
    );

    register_post_type( 'formacao_area', $args );
}

function register_cpt_equipa() {

    $labels = array( 
        'name' => _x( 'Equipa', 'equipa' ),
        'singular_name' => _x( 'Elemento da equipa', 'equipa' ),
        'add_new' => _x( 'Adicionar Elemento da equipa', 'equipa' ),
        'add_new_item' => _x( 'Adicionar Elemento da equipa', 'equipa' ),
        'edit_item' => _x( 'Editar Elemento da equipa', 'equipa' ),
        'new_item' => _x( 'Novo Elemento da equipa', 'equipa' ),
        'view_item' => _x( 'Ver Elemento da equipa', 'equipa' ),
        'search_items' => _x( 'Procurar Elemento da equipa', 'equipa' ),
        'not_found' => _x( 'Nenhum Elemento da equipa encontrado', 'equipa' ),
        'not_found_in_trash' => _x( 'Nenhum Elemento da equipa encontrada no lixo', 'equipa' ),
        'parent_item_colon' => _x( 'Elemento da equipa Pai:', 'equipa' ),
        'menu_name' => _x( 'Equipa', 'equipa' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'supports' => array('title', 'page-attributes', 'revisions'),
        'taxonomies' => array('category','post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'hierarchical' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'capability_type' => 'page'
    );

    register_post_type( 'equipa', $args );
}

function register_cpt_localizacoes() {

    $labels = array( 
        'name' => _x( 'Localizações', 'localizacoes' ),
        'singular_name' => _x( 'Localização', 'localizacoes' ),
        'add_new' => _x( 'Adicionar Localização', 'localizacoes' ),
        'add_new_item' => _x( 'Adicionar Localização', 'localizacoes' ),
        'edit_item' => _x( 'Editar Localização', 'localizacoes' ),
        'new_item' => _x( 'Nova Localização', 'localizacoes' ),
        'view_item' => _x( 'Ver Localização', 'localizacoes' ),
        'search_items' => _x( 'Procurar Localização', 'localizacoes' ),
        'not_found' => _x( 'Nenhuma Localização', 'localizacoes' ),
        'not_found_in_trash' => _x( 'Nenhuma Localização encontrada no lixo', 'localizacoes' ),
        'parent_item_colon' => _x( 'Localização Pai:', 'localizacoes' ),
        'menu_name' => _x( 'Localizações', 'localizacoes' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'supports' => array('title', 'page-attributes', 'revisions'),
        'taxonomies' => array('category','post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'hierarchical' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'capability_type' => 'page'
    );

    register_post_type( 'localizacoes', $args );
}

function register_cpt_entrevistas() {

    $labels = array( 
        'name' => _x( 'Entrevistas', 'entrevistas' ),
        'singular_name' => _x( 'Entrevista', 'entrevistas' ),
        'add_new' => _x( 'Adicionar Entrevista', 'entrevistas' ),
        'add_new_item' => _x( 'Adicionar Entrevista', 'entrevistas' ),
        'edit_item' => _x( 'Editar Entrevista', 'entrevistas' ),
        'new_item' => _x( 'Nova Entrevista', 'entrevistas' ),
        'view_item' => _x( 'Ver Entrevista', 'entrevistas' ),
        'search_items' => _x( 'Procurar Entrevista', 'entrevistas' ),
        'not_found' => _x( 'Nenhuma Entrevista encontrada', 'entrevistas' ),
        'not_found_in_trash' => _x( 'Nenhuma Entrevista encontrada no lixo', 'entrevistas' ),
        'parent_item_colon' => _x( 'Entrevista Pai:', 'entrevistas' ),
        'menu_name' => _x( 'Entrevistas', 'entrevistas' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'supports' => array('title', 'page-attributes', 'revisions'),
        'taxonomies' => array('category','post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'hierarchical' => true,
        'rewrite' => array( 'slug' => 'entrevistas-videos' ),
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'capability_type' => 'page'
    );

    register_post_type( 'entrevista', $args );
}

function register_cpt_entrevistas_tipo() {

    $labels = array( 
        'name' => _x( 'Tipos Entrevistas', 'entrevistas_tipo' ),
        'singular_name' => _x( 'Tipo Entrevista', 'entrevistas_tipo' ),
        'add_new' => _x( 'Adicionar Tipo Entrevista', 'entrevistas_tipo' ),
        'add_new_item' => _x( 'Adicionar Tipo Entrevista', 'entrevistas_tipo' ),
        'edit_item' => _x( 'Editar Tipo Entrevista', 'entrevistas_tipo' ),
        'new_item' => _x( 'Novo Tipo Entrevista', 'entrevistas_tipo' ),
        'view_item' => _x( 'Ver Tipo Entrevista', 'entrevistas_tipo' ),
        'search_items' => _x( 'Procurar Tipo Entrevista', 'entrevistas_tipo' ),
        'not_found' => _x( 'Nenhum Tipo Entrevista encontrada', 'entrevistas_tipo' ),
        'not_found_in_trash' => _x( 'Nenhum Tipo Entrevista encontrada no lixo', 'entrevistas_tipo' ),
        'parent_item_colon' => _x( 'Tipo Entrevista Pai:', 'entrevistas_tipo' ),
        'menu_name' => _x( 'Tipos Entrevistas', 'entrevistas_tipo' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'supports' => array('title', 'page-attributes', 'revisions'),
        'taxonomies' => array('category','post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'hierarchical' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'capability_type' => 'page'
    );

    register_post_type( 'entrevistas_tipo', $args );
}

function register_cpt_eventos() {

    $labels = array( 
        'name' => _x( 'Eventos', 'eventos' ),
        'singular_name' => _x( 'Evento', 'eventos' ),
        'add_new' => _x( 'Adicionar Evento', 'eventos' ),
        'add_new_item' => _x( 'Adicionar Evento', 'eventos' ),
        'edit_item' => _x( 'Editar Evento', 'eventos' ),
        'new_item' => _x( 'Novo Evento', 'eventos' ),
        'view_item' => _x( 'Ver Evento', 'eventos' ),
        'search_items' => _x( 'Procurar Evento', 'eventos' ),
        'not_found' => _x( 'Nenhum Evento encontrado', 'eventos' ),
        'not_found_in_trash' => _x( 'Nenhum Evento encontrado no lixo', 'eventos' ),
        'parent_item_colon' => _x( 'Evento Pai:', 'eventos' ),
        'menu_name' => _x( 'Eventos', 'eventos' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'supports' => array('title', 'page-attributes', 'revisions'),
        'taxonomies' => array('category','post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'hierarchical' => true,
        'rewrite' => array( 'slug' => 'eventos' ),
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'capability_type' => 'page'
    );

    register_post_type( 'eventos', $args );
}

function register_cpt_projectos360() {

    $labels = array( 
        'name' => _x( 'Projectos 360', 'projectos360' ),
        'singular_name' => _x( 'Projecto 360', 'projectos360' ),
        'add_new' => _x( 'Adicionar Projecto 360', 'projectos360' ),
        'add_new_item' => _x( 'Adicionar Projecto 360', 'projectos360' ),
        'edit_item' => _x( 'Editar Projecto 360', 'projectos360' ),
        'new_item' => _x( 'Novo Projecto 360', 'projectos360' ),
        'view_item' => _x( 'Ver Projecto 360', 'projectos360' ),
        'search_items' => _x( 'Procurar Projecto 360', 'projectos360' ),
        'not_found' => _x( 'Nenhum Projecto 360 encontrado', 'projectos360' ),
        'not_found_in_trash' => _x( 'Nenhum Projecto 360 encontrado no lixo', 'projectos360' ),
        'parent_item_colon' => _x( 'Projecto 360 Pai:', 'projectos360' ),
        'menu_name' => _x( 'Projectos 360', 'projectos360' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'supports' => array('title', 'page-attributes', 'revisions'),
        'taxonomies' => array('category','post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'hierarchical' => true,
        'rewrite' => array( 'slug' => 'projeto-trabalho-digital-final-360-alunos' ),
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'capability_type' => 'page'
    );

    register_post_type( 'projectos360', $args );
}


function register_cpt_profissoes() {

    $labels = array( 
        'name' => _x( 'Profissões', 'profissoes' ),
        'singular_name' => _x( 'Profissão', 'profissoes' ),
        'add_new' => _x( 'Adicionar Profissão', 'profissoes' ),
        'add_new_item' => _x( 'Adicionar Profissão', 'profissoes' ),
        'edit_item' => _x( 'Editar Profissão', 'profissoes' ),
        'new_item' => _x( 'Nova Profissão', 'profissoes' ),
        'view_item' => _x( 'Ver Profissão', 'profissoes' ),
        'search_items' => _x( 'Procurar Profissão', 'profissoes' ),
        'not_found' => _x( 'Nenhum Profissão encontrado', 'profissoes' ),
        'not_found_in_trash' => _x( 'Nenhum Profissão encontrado no lixo', 'profissoes' ),
        'parent_item_colon' => _x( 'Profissão Pai:', 'profissoes' ),
        'menu_name' => _x( 'Profissões', 'profissoes' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'supports' => array('title', 'page-attributes', 'revisions'),
        'taxonomies' => array('category','post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'hierarchical' => true,
        'rewrite' => array( 'slug' => 'profissoes' ),
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'capability_type' => 'page'
    );

    register_post_type( 'profissoes', $args );
}

function register_cpt_clients360() {

    $labels = array( 
        'name' => _x( 'Clientes 360', 'clientes360' ),
        'singular_name' => _x( 'Cliente 360', 'clientes360' ),
        'add_new' => _x( 'Adicionar Cliente 360', 'clientes360' ),
        'add_new_item' => _x( 'Adicionar Cliente 360', 'clientes360' ),
        'edit_item' => _x( 'Editar Cliente 360', 'clientes360' ),
        'new_item' => _x( 'Novo Cliente 360', 'clientes360' ),
        'view_item' => _x( 'Ver Cliente 360', 'clientes360' ),
        'search_items' => _x( 'Procurar Cliente 360', 'clientes360' ),
        'not_found' => _x( 'Nenhum Cliente 360 encontrado', 'clientes360' ),
        'not_found_in_trash' => _x( 'Nenhum Cliente 360 encontrado no lixo', 'clientes360' ),
        'parent_item_colon' => _x( 'Cliente 360 Pai:', 'clientes360' ),
        'menu_name' => _x( 'Clientes 360', 'clientes360' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'supports' => array('title', 'page-attributes', 'revisions'),
        'taxonomies' => array('category','post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'hierarchical' => true,
        'rewrite' => array( 'slug' => 'clientes360' ),
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'capability_type' => 'page'
    );

    register_post_type( 'clientes360', $args );
}

function register_cpt_homeblocks() {

    $labels = array( 
        'name' => _x( 'Blocos', 'homeblocks' ),
        'singular_name' => _x( 'Bloco', 'homeblocks' ),
        'add_new' => _x( 'Adicionar Bloco', 'homeblocks' ),
        'add_new_item' => _x( 'Adicionar Bloco', 'homeblocks' ),
        'edit_item' => _x( 'Editar Bloco', 'homeblocks' ),
        'new_item' => _x( 'Nova Bloco', 'homeblocks' ),
        'view_item' => _x( 'Ver Bloco', 'homeblocks' ),
        'search_items' => _x( 'Procurar Bloco', 'homeblocks' ),
        'not_found' => _x( 'Nenhum Bloco encontrado', 'homeblocks' ),
        'not_found_in_trash' => _x( 'Nenhum Bloco encontrado no lixo', 'homeblocks' ),
        'parent_item_colon' => _x( 'Bloco Pai:', 'homeblocks' ),
        'menu_name' => _x( 'Blocos Homepage', 'homeblocks' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'supports' => array('title', 'page-attributes', 'revisions'),
        'taxonomies' => array('category','post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'hierarchical' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'capability_type' => 'page'
    );

    register_post_type( 'homeblocks', $args );
}

function register_cpt_homenews() {

    $labels = array( 
        'name' => _x( 'Noticias', 'homenews' ),
        'singular_name' => _x( 'Noticia', 'homenews' ),
        'add_new' => _x( 'Adicionar Noticia', 'homenews' ),
        'add_new_item' => _x( 'Adicionar Noticia', 'homenews' ),
        'edit_item' => _x( 'Editar Noticia', 'homenews' ),
        'new_item' => _x( 'Nova Noticia', 'homenews' ),
        'view_item' => _x( 'Ver Noticia', 'homenews' ),
        'search_items' => _x( 'Procurar Noticia', 'homenews' ),
        'not_found' => _x( 'Nenhuma Noticia encontrada', 'homenews' ),
        'not_found_in_trash' => _x( 'Nenhuma Noticia encontrada no lixo', 'homenews' ),
        'parent_item_colon' => _x( 'Noticia Pai:', 'homenews' ),
        'menu_name' => _x( 'Noticias Homepage', 'homenews' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'supports' => array('title', 'page-attributes', 'revisions'),
        'taxonomies' => array('category','post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'hierarchical' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'capability_type' => 'page'
    );

    register_post_type( 'homenews', $args );
}

function register_cpt_blog() {

    $labels = array( 
        'name' => _x( 'Blog Posts', 'blog' ),
        'singular_name' => _x( 'Blog Post', 'blog' ),
        'add_new' => _x( 'Adicionar Blog Post', 'blog' ),
        'add_new_item' => _x( 'Adicionar Blog Post', 'blog' ),
        'edit_item' => _x( 'Editar Blog Post', 'blog' ),
        'new_item' => _x( 'Novo Blog Post', 'blog' ),
        'view_item' => _x( 'Ver Blog Post', 'blog' ),
        'search_items' => _x( 'Procurar Blog Post', 'blog' ),
        'not_found' => _x( 'Nenhuma Blog Post encontrado', 'blog' ),
        'not_found_in_trash' => _x( 'Nenhuma Blog Post encontrada no lixo', 'blog' ),
        'parent_item_colon' => _x( 'Blog Post Pai:', 'blog' ),
        'menu_name' => _x( 'Blog Posts', 'blog' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'supports' => array('title', 'page-attributes', 'revisions', 'comments'),
        'taxonomies' => array('category','post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'hierarchical' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'capability_type' => 'page'
    );

    register_post_type( 'blog', $args );
}

function register_cpt_categorias_blog() {

    $labels = array( 
        'name' => _x( 'Categoria Blog Posts', 'categorias_blog' ),
        'singular_name' => _x( 'Categoria Blog Post', 'categorias_blog' ),
        'add_new' => _x( 'Adicionar Categoria Blog Post', 'categorias_blog' ),
        'add_new_item' => _x( 'Adicionar Categoria Blog Post', 'categorias_blog' ),
        'edit_item' => _x( 'Editar Categoria Blog Post', 'categorias_blog' ),
        'new_item' => _x( 'Novo Categoria Blog Post', 'categorias_blog' ),
        'view_item' => _x( 'Ver Categoria Blog Post', 'categorias_blog' ),
        'search_items' => _x( 'Procurar Categoria Blog Post', 'categorias_blog' ),
        'not_found' => _x( 'Nenhuma Categoria Blog Post encontrado', 'categorias_blog' ),
        'not_found_in_trash' => _x( 'Nenhuma Categoria Blog Post encontrada no lixo', 'categorias_blog' ),
        'parent_item_colon' => _x( 'Categoria Blog Post Pai:', 'categorias_blog' ),
        'menu_name' => _x( 'Categorias Blog Posts', 'categorias_blog' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'supports' => array('title', 'page-attributes', 'revisions'),
        'taxonomies' => array('category','post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'hierarchical' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'capability_type' => 'page'
    );

    register_post_type( 'categorias_blog', $args );
}

function register_cpt_recrutamento() {

    $labels = array( 
        'name' => _x( 'Recrutamentos', 'recrutamento' ),
        'singular_name' => _x( 'Recrutamento', 'recrutamento' ),
        'add_new' => _x( 'Adicionar Recrutamento', 'recrutamento' ),
        'add_new_item' => _x( 'Adicionar Recrutamento', 'recrutamento' ),
        'edit_item' => _x( 'Editar Recrutamento', 'recrutamento' ),
        'new_item' => _x( 'Novo Recrutamento', 'recrutamento' ),
        'view_item' => _x( 'Ver Recrutamento', 'recrutamento' ),
        'search_items' => _x( 'Procurar Recrutamento', 'recrutamento' ),
        'not_found' => _x( 'Nenhum Recrutamento encontrado', 'recrutamento' ),
        'not_found_in_trash' => _x( 'Nenhuma Recrutamento encontrado no lixo', 'recrutamento' ),
        'parent_item_colon' => _x( 'Recrutamento Pai:', 'recrutamento' ),
        'menu_name' => _x( 'Recrutamento', 'recrutamento' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'supports' => array('title', 'page-attributes', 'revisions'),
        'taxonomies' => array('category','post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'hierarchical' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'capability_type' => 'page'
    );

    register_post_type( 'recrutamento', $args );
}

function register_cpt_empresa_recrutamento() {

    $labels = array( 
        'name' => _x( 'Empresas Recrutamento', 'empresa_recrutamento' ),
        'singular_name' => _x( 'Empresa Recrutamento', 'empresa_recrutamento' ),
        'add_new' => _x( 'Adicionar Empresa Recrutamento', 'empresa_recrutamento' ),
        'add_new_item' => _x( 'Adicionar Empresa Recrutamento', 'empresa_recrutamento' ),
        'edit_item' => _x( 'Editar Empresa Recrutamento', 'empresa_recrutamento' ),
        'new_item' => _x( 'Nova Empresa Recrutamento', 'empresa_recrutamento' ),
        'view_item' => _x( 'Ver Empresa Recrutamento', 'empresa_recrutamento' ),
        'search_items' => _x( 'Procurar Empresa Recrutamento', 'empresa_recrutamento' ),
        'not_found' => _x( 'Nenhuma Empresa Recrutamento encontrado', 'empresa_recrutamento' ),
        'not_found_in_trash' => _x( 'Nenhuma Empresa Recrutamento encontrado no lixo', 'empresa_recrutamento' ),
        'parent_item_colon' => _x( 'Empresa Recrutamento Pai:', 'empresa_recrutamento' ),
        'menu_name' => _x( 'Empresa Recrutamento', 'empresa_recrutamento' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'supports' => array('title', 'page-attributes', 'revisions'),
        'taxonomies' => array('category','post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'hierarchical' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'capability_type' => 'page'
    );

    register_post_type( 'empresa_recrutamento', $args );
}

function register_custom_post_types() {
    register_cpt_slider();
    register_cpt_noticias();

    
    register_cpt_formacao();
    register_cpt_formacao_tipo();
    register_cpt_formacao_horarios();
    register_cpt_formacao_area();
    
    register_cpt_equipa();
    
    register_cpt_entrevistas();
    
    register_cpt_profissoes();

    register_cpt_projectos360();
    register_cpt_clients360();
    
    register_cpt_eventos();
    
    //Blog
    register_cpt_blog();
    register_cpt_categorias_blog();
    
    register_cpt_homeblocks();
    register_cpt_localizacoes();
    
    //Recrutamento
    register_cpt_recrutamento();
    register_cpt_empresa_recrutamento();
}

add_action( 'init', 'register_custom_post_types' );