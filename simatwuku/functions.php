<?php
// Enqueue main script and pass theme URL to JavaScript
function simatwuku_scripts() {
    wp_enqueue_script(
        'main-js',
        get_template_directory_uri() . '/script.js',
        array(),
        false,
        true
    );

    wp_localize_script('main-js', 'themeVars', array(
        'themeUrl' => get_template_directory_uri(),
    ));
}
add_action('wp_enqueue_scripts', 'simatwuku_scripts');

// Optional: enqueue main stylesheet if needed
function simatwuku_styles() {
    wp_enqueue_style('main-style', get_template_directory_uri() . '/css/style.css');
}
add_action('wp_enqueue_scripts', 'simatwuku_styles');

//サムネイル機能
function simatwuku_theme_setup() {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('html5', array('search-form'));
}
add_action('after_setup_theme', 'simatwuku_theme_setup');

// コメント機能を完全に無効化
function disable_comments_post_types_support() {
    remove_post_type_support('post', 'comments');
    remove_post_type_support('post', 'trackbacks');
}
add_action('init', 'disable_comments_post_types_support');

add_filter('body_class', function ($classes) {
    if (is_page()) {
        global $post;
        $classes[] = 'page-' . $post->post_name;
    }
    return $classes;
});

// 投稿からカテゴリー・タグ機能を削除
function remove_post_taxonomies() {
    unregister_taxonomy_for_object_type('category', 'post');
    unregister_taxonomy_for_object_type('post_tag', 'post');
}
add_action('init', 'remove_post_taxonomies');