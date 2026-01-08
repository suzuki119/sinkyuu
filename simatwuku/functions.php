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

// OGP / meta description 用の共通取得関数
function simatwuku_get_ogp_data() {
    $site_name = get_bloginfo('name');
    $site_description = get_bloginfo('description');
    $theme_url = get_template_directory_uri();

    $data = array(
        'title' => $site_name,
        'description' => $site_description,
        'url' => home_url('/'),
        'image' => $theme_url . '/img/ogp.jpg',
        'type' => 'website',
        'site_name' => $site_name,
    );

    if (is_front_page()) {
        $data['title'] = '日間賀島を巡る観光フォトサービス｜島トゥク';
        $data['description'] = '日間賀島をトゥクトゥクで巡る観光フォトサービス「島トゥク」。潮風を感じながら、島の人気スポットで思い出に残る写真を撮影できます。';
    }

    if (is_single() || is_page()) {
        $data['title'] = get_the_title();
        $data['description'] = get_the_excerpt() ?: $site_description;
        $data['url'] = get_permalink();
        $data['type'] = 'article';

        if (has_post_thumbnail()) {
            $data['image'] = get_the_post_thumbnail_url(null, 'large');
        }
    }

    return $data;
}

/**
 * カスタマイザーに料金設定を追加
 */
function shimatuku_customize_register( $wp_customize ) {
    // 1. セクション（まとまり）を作る
    $wp_customize->add_section( 'shimatuku_price_section', array(
        'title'    => '料金・数値設定', // 管理画面に表示される名前
        'priority' => 100,
    ));
    // 料金の設定
    $wp_customize->add_setting( 'price_min', array(
        'default'   => '2000', // 初期値
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'price_min', array(
        'label'    => '４名までの料金（単位なしで入力してください）',
        'section'  => 'shimatuku_price_section',
        'settings' => 'price_min',
        'type'     => 'text',
    ));

    $wp_customize->add_setting( 'price_middle', array(
    'default'   => '2500', // 初期値
    'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'price_middle', array(
        'label'    => '5名の料金（単位なしで入力してください）',
        'section'  => 'shimatuku_price_section',
        'settings' => 'price_middle',
        'type'     => 'text',
    ));

    $wp_customize->add_setting( 'price_max', array(
    'default'   => '3000', // 初期値
    'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'price_max', array(
        'label'    => '6名の料金（単位なしで入力してください）',
        'section'  => 'shimatuku_price_section',
        'settings' => 'price_max',
        'type'     => 'text',
    ));
}
add_action( 'customize_register', 'shimatuku_customize_register' );