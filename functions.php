<?php
/**
 * RAMEN TOTAL SOLUTIONS Corporate - functions
 *
 * @package rts
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'RTS_VERSION', '1.0.0' );

/* ------------------------------------------------------------
 * サイト共通設定（URL・電話番号など）
 * 必要に応じてここを書き換えてください。
 * ---------------------------------------------------------- */
function rts_config( $key ) {
	$config = array(
		'tel'         => '0120-13-3324',
		'tel_hours'   => '平日 9:00-18:00',
		'contact_url' => home_url( '/contact/' ),
		'privacy_url' => home_url( '/privacy-policy/' ),
		'address'     => '〒276-0015 千葉県八千代市米本2168-16',
		// 各事業の専門サイトURL（確定後に差し替え）
		'site_school' => '#',
		'site_labo'   => '#',
		'site_build'  => '#',
		'site_global' => '#',
	);
	return isset( $config[ $key ] ) ? $config[ $key ] : '';
}

/* ------------------------------------------------------------
 * テーマセットアップ
 * ---------------------------------------------------------- */
function rts_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	add_image_size( 'rts-news', 600, 520, true );

	register_nav_menus(
		array(
			'global'          => 'グローバルナビ（ヘッダー）',
			'footer_site'     => 'フッター：SITE NAVIGATION',
			'footer_business' => 'フッター：OUR BUSINESSES',
		)
	);
}
add_action( 'after_setup_theme', 'rts_setup' );

/* ------------------------------------------------------------
 * CSS / JS 読み込み
 * ---------------------------------------------------------- */
function rts_enqueue() {
	wp_enqueue_style(
		'rts-fonts',
		'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600&family=Inter:wght@400;500;600;700&family=Noto+Sans+JP:wght@400;500;700&family=Noto+Serif+JP:wght@400;500;600;700&display=swap',
		array(),
		null
	);
	wp_enqueue_style( 'rts-main', get_template_directory_uri() . '/assets/css/main.css', array( 'rts-fonts' ), RTS_VERSION );
	wp_enqueue_script( 'rts-main', get_template_directory_uri() . '/assets/js/main.js', array(), RTS_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'rts_enqueue' );

function rts_preconnect( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = 'https://fonts.googleapis.com';
		$urls[] = array(
			'href'        => 'https://fonts.gstatic.com',
			'crossorigin' => 'anonymous',
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'rts_preconnect', 10, 2 );

/* ------------------------------------------------------------
 * 画像ヘルパー
 * 差し替え用画像はすべて assets/images/ に置いています。
 * 同じファイル名で上書きすれば差し替え完了です。
 * ---------------------------------------------------------- */
function rts_img( $file ) {
	return esc_url( get_template_directory_uri() . '/assets/images/' . $file );
}

/* ------------------------------------------------------------
 * 最新情報：カテゴリ → ラベル色
 * 投稿カテゴリのスラッグを school / labo / build / global にすると
 * デザイン通りのラベル色になります。
 * ---------------------------------------------------------- */
function rts_news_label( $post_id = null ) {
	$cats = get_the_category( $post_id );
	if ( empty( $cats ) ) {
		return array(
			'slug' => 'default',
			'name' => 'NEWS',
		);
	}
	$cat = $cats[0];
	return array(
		'slug' => sanitize_html_class( $cat->slug ),
		'name' => strtoupper( $cat->name ),
	);
}

/* 投稿一覧（最新情報一覧）のURL */
function rts_news_archive_url() {
	$page_for_posts = (int) get_option( 'page_for_posts' );
	return $page_for_posts ? get_permalink( $page_for_posts ) : home_url( '/news/' );
}

/* ------------------------------------------------------------
 * メニュー未設定時のフォールバック
 * ---------------------------------------------------------- */
function rts_menu_items( $location ) {
	$home = is_front_page() ? '' : home_url( '/' );
	$menus = array(
		'global'          => array(
			array( '私たちについて', $home . '#about' ),
			array( '事業紹介', $home . '#business' ),
			array( '実績', $home . '#experience' ),
			array( '最新情報', $home . '#news' ),
			array( '会社概要', $home . '#company' ),
		),
		'footer_site'     => array(
			array( '理念・メッセージ', $home . '#philosophy' ),
			array( '事業紹介', $home . '#business' ),
			array( '実績・事例', $home . '#experience' ),
			array( '最新情報', $home . '#news' ),
			array( '代表紹介', $home . '#representative' ),
			array( '会社概要', $home . '#company' ),
			array( 'お問い合わせ', rts_config( 'contact_url' ) ),
		),
		'footer_business' => array(
			array( 'SCHOOL / 学ぶ', rts_config( 'site_school' ) ),
			array( 'LABO / 創る', rts_config( 'site_labo' ) ),
			array( 'BUILD / 建てる', rts_config( 'site_build' ) ),
			array( 'GLOBAL / 広げる', rts_config( 'site_global' ) ),
		),
	);
	return isset( $menus[ $location ] ) ? $menus[ $location ] : array();
}

/**
 * メニュー出力（管理画面でメニューが設定されていればそちらを優先）
 *
 * @param string $location メニュー位置.
 * @param string $class    ul のクラス.
 * @param bool   $arrow    ↗ を付けるか.
 */
function rts_nav( $location, $class, $arrow = false ) {
	if ( has_nav_menu( $location ) ) {
		wp_nav_menu(
			array(
				'theme_location' => $location,
				'container'      => false,
				'menu_class'     => $class,
				'depth'          => 1,
				'link_after'     => $arrow ? ' <span class="arrow" aria-hidden="true">↗</span>' : '',
			)
		);
		return;
	}
	echo '<ul class="' . esc_attr( $class ) . '">';
	foreach ( rts_menu_items( $location ) as $item ) {
		printf(
			'<li><a href="%s">%s%s</a></li>',
			esc_url( $item[1] ),
			esc_html( $item[0] ),
			$arrow ? ' <span class="arrow" aria-hidden="true">↗</span>' : ''
		);
	}
	echo '</ul>';
}

/* JS有効判定（フェードインのチラつき防止のため head で付与） */
function rts_js_class() {
	echo "<script>document.documentElement.classList.add('js');</script>\n";
}
add_action( 'wp_head', 'rts_js_class', 1 );
