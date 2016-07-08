<?php




/**
 * アイキャッチ画像の機能を有効化します。
 */

add_theme_support( 'post-thumbnails' );





/**
 * カスタムメニューの機能を有効化します。
 */

if ( function_exists( 'register_nav_menu' ) ) {
	register_nav_menu( 'simplenav', 'Sample Corporationグローバルナビ' );
}





/**
 * ウィジェットエリアを定義します。
 */


if ( function_exists('register_sidebar') ) {

    register_sidebar(array(

		'name' => __('サイドバー') ,
		'id' => 'primary-widget-area',
		'description' => __( 'サイドバーに表示されるウィジェットエリアです。' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		
    ));
}