<?php
/**
 * Header
 *
 * @package rts
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main">本文へスキップ</a>

<header class="site-header<?php echo is_front_page() ? ' is-overlay' : ''; ?>" id="site-header">
	<div class="site-header__inner">
		<a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<!-- 【画像差し替え】ロゴ：assets/images/logo.png（54×54px表示・透過PNG / SVG可。高解像度用に2倍の108×108px以上推奨） -->
			<img class="site-logo__mark" src="<?php echo rts_img( 'logo.png' ); ?>" alt="RTS Inc." width="54" height="54">
			<span class="site-logo__text">RAMEN TOTAL<br class="sp-only"> SOLUTIONS.INC</span>
		</a>

		<button class="menu-toggle" id="menu-toggle" type="button" aria-controls="sp-menu" aria-expanded="false">
			<span class="menu-toggle__bar"></span>
			<span class="menu-toggle__bar"></span>
			<span class="menu-toggle__bar"></span>
			<span class="screen-reader-text">メニュー</span>
		</button>

		<nav class="global-nav" id="global-nav" aria-label="グローバルナビゲーション">
			<?php rts_nav( 'global', 'global-nav__list' ); ?>
			<a class="btn-header" href="<?php echo esc_url( rts_config( 'contact_url' ) ); ?>">
				お問い合わせ<span class="arrow" aria-hidden="true">↗</span>
			</a>
		</nav>
	</div>

	<?php
	// SPメニュー（1080px以下で表示）
	$rts_home = is_front_page() ? '' : home_url( '/' );
	$rts_sp_links = array(
		array( 'Philosophy', '理念・メッセージ', $rts_home . '#philosophy' ),
		array( 'Businesses', '事業紹介', $rts_home . '#business' ),
		array( 'Experience', '実績・事例', $rts_home . '#experience' ),
		array( 'News', '最新情報', $rts_home . '#news' ),
		array( 'Representative', '代表紹介', $rts_home . '#representative' ),
		array( 'Company', '会社概要', $rts_home . '#company' ),
	);
	$rts_sp_biz = array(
		array( 'SCHOOL', '学ぶ', rts_config( 'site_school' ) ),
		array( 'LABO', '創る', rts_config( 'site_labo' ) ),
		array( 'BUILD', '建てる', rts_config( 'site_build' ) ),
		array( 'GLOBAL', '広げる', rts_config( 'site_global' ) ),
	);
	?>
	<div class="sp-menu" id="sp-menu" role="dialog" aria-modal="true" aria-label="サイトメニュー" aria-hidden="true">
		<div class="sp-menu__head">
			<a class="sp-menu__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<img src="<?php echo rts_img( 'logo.png' ); ?>" alt="RTS Inc." width="54" height="54">
				<span>RAMEN TOTAL<br>SOLUTIONS.INC</span>
			</a>
			<button class="sp-menu__close" id="sp-menu-close" type="button" aria-label="メニューを閉じる">
				<svg viewBox="0 0 24 24" width="22" height="22" aria-hidden="true"><path d="M5 5l14 14M19 5L5 19" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
			</button>
		</div>

		<div class="sp-menu__body">
			<p class="sp-menu__label">MENU<span>サイトメニュー</span></p>
			<ul class="sp-menu__list">
				<?php foreach ( $rts_sp_links as $l ) : ?>
					<li><a href="<?php echo esc_url( $l[2] ); ?>"><span class="sp-menu__en"><?php echo esc_html( $l[0] ); ?></span><span class="sp-menu__ja"><?php echo esc_html( $l[1] ); ?></span><span class="sp-menu__arrow" aria-hidden="true">→</span></a></li>
				<?php endforeach; ?>
			</ul>

			<p class="sp-menu__label sp-menu__label--biz">OUR BUSINESSES</p>
			<ul class="sp-menu__biz">
				<?php foreach ( $rts_sp_biz as $l ) : ?>
					<li><a href="<?php echo esc_url( $l[2] ); ?>" target="_blank" rel="noopener"><span class="sp-menu__biz-en"><?php echo esc_html( $l[0] ); ?></span><span class="sp-menu__biz-ja">/ <?php echo esc_html( $l[1] ); ?></span><span class="sp-menu__arrow" aria-hidden="true">↗</span></a></li>
				<?php endforeach; ?>
			</ul>

			<a class="sp-menu__contact" href="<?php echo esc_url( rts_config( 'contact_url' ) ); ?>">
				<span><span class="sp-menu__contact-en">CONTACT</span><span class="sp-menu__contact-ja">お問い合わせ</span></span>
				<span class="sp-menu__arrow" aria-hidden="true">→</span>
			</a>
		</div>
	</div>
</header>
