<?php

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Rejestracja Custom Post Type: Szkolenia
add_action('init', function () {
    $labels = array(
        'name'                  => __('Szkolenia', 'avsec'),
        'singular_name'         => __('Szkolenie', 'avsec'),
        'menu_name'             => __('Szkolenia', 'avsec'),
        'name_admin_bar'        => __('Szkolenie', 'avsec'),
        'add_new'               => __('Dodaj nowe', 'avsec'),
        'add_new_item'          => __('Dodaj nowe szkolenie', 'avsec'),
        'new_item'              => __('Nowe szkolenie', 'avsec'),
        'edit_item'             => __('Edytuj szkolenie', 'avsec'),
        'view_item'             => __('Zobacz szkolenie', 'avsec'),
        'all_items'             => __('Wszystkie szkolenia', 'avsec'),
        'search_items'          => __('Szukaj szkoleń', 'avsec'),
        'parent_item_colon'     => __('Nadrzędne szkolenie:', 'avsec'),
        'not_found'             => __('Nie znaleziono szkoleń', 'avsec'),
        'not_found_in_trash'    => __('Brak szkoleń w koszu', 'avsec'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'szkolenia'),
        'show_in_rest'       => true,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-welcome-learn-more',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'revisions'),
        'hierarchical'       => false,
        'publicly_queryable' => true,
    );

    register_post_type('szkolenia', $args);

    // Taksonomia do kategoryzacji szkoleń
    $tax_labels = array(
        'name'              => __('Kategorie szkoleń', 'avsec'),
        'singular_name'     => __('Kategoria szkoleń', 'avsec'),
        'search_items'      => __('Szukaj kategorii', 'avsec'),
        'all_items'         => __('Wszystkie kategorie', 'avsec'),
        'parent_item'       => __('Kategoria nadrzędna', 'avsec'),
        'parent_item_colon' => __('Kategoria nadrzędna:', 'avsec'),
        'edit_item'         => __('Edytuj kategorię', 'avsec'),
        'update_item'       => __('Zaktualizuj kategorię', 'avsec'),
        'add_new_item'      => __('Dodaj nową kategorię', 'avsec'),
        'new_item_name'     => __('Nazwa nowej kategorii', 'avsec'),
        'menu_name'         => __('Kategorie', 'avsec'),
    );

    $tax_args = array(
        'hierarchical'      => true,
        'labels'            => $tax_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'kategoria-szkolen'),
        'show_in_rest'      => true,
    );

    register_taxonomy('szkolenia_kategoria', array('szkolenia'), $tax_args);
    register_taxonomy_for_object_type('szkolenia_kategoria', 'szkolenia');
});

// Rejestracja Custom Post Type: Zespół
add_action('init', function () {
    $labels = array(
        'name'                  => __('Zespół', 'avsec'),
        'singular_name'         => __('Członek zespołu', 'avsec'),
        'menu_name'             => __('Zespół', 'avsec'),
        'name_admin_bar'        => __('Członek zespołu', 'avsec'),
        'add_new'               => __('Dodaj nowego', 'avsec'),
        'add_new_item'          => __('Dodaj nowego członka zespołu', 'avsec'),
        'new_item'              => __('Nowy członek zespołu', 'avsec'),
        'edit_item'             => __('Edytuj członka zespołu', 'avsec'),
        'view_item'             => __('Zobacz członka zespołu', 'avsec'),
        'all_items'             => __('Wszyscy członkowie zespołu', 'avsec'),
        'search_items'          => __('Szukaj członków zespołu', 'avsec'),
        'parent_item_colon'     => __('Nadrzędny członek zespołu:', 'avsec'),
        'not_found'             => __('Nie znaleziono członków zespołu', 'avsec'),
        'not_found_in_trash'    => __('Brak członków zespołu w koszu', 'avsec'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => false,
        'rewrite'            => array('slug' => 'zespol'),
        'show_in_rest'       => true,
        'menu_position'      => 21,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'revisions'),
        'hierarchical'       => false,
        'publicly_queryable' => true,
    );

    register_post_type('zespol', $args);
});
