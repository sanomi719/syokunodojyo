<?php
/**
 * Footer（お問い合わせCTA + フッター）
 *
 * @package rts
 */
$tel = rts_config( 'tel' );
?>

<section class="cta" id="contact">
	<div class="container cta__inner">
		<div class="cta__text">
			<h2 class="cta__title">食に挑む、<wbr>その一歩を。</h2>
			<p class="cta__lead">開業のこと、商品開発のこと、店舗づくりのこと。<br>食の道場は、あなたの挑戦に合わせて最適な支援を考えます。</p>
		</div>
		<div class="cta__actions">
			<a class="cta-tel" href="tel:<?php echo esc_attr( str_replace( '-', '', $tel ) ); ?>">
				<svg class="cta-tel__icon" viewBox="0 0 24 24" width="24" height="24" aria-hidden="true"><path fill="none" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" d="M5 3.5h3.2l1.6 4-2 1.3a11 11 0 0 0 5.4 5.4l1.3-2 4 1.6V17a3 3 0 0 1-3 3A15.5 15.5 0 0 1 2 6.5a3 3 0 0 1 3-3Z"/></svg>
				<span>
					<span class="cta-tel__num"><?php echo esc_html( $tel ); ?></span>
					<span class="cta-tel__hours"><?php echo esc_html( rts_config( 'tel_hours' ) ); ?></span>
				</span>
			</a>
			<a class="cta-mail" href="<?php echo esc_url( rts_config( 'contact_url' ) ); ?>">
				メール／お問い合わせフォーム<span class="arrow" aria-hidden="true">↗</span>
			</a>
		</div>
	</div>
</section>

<footer class="site-footer">
	<div class="container">
		<div class="site-footer__top">
			<div class="site-footer__brand">
				<!-- 【画像差し替え】ロゴ：assets/images/logo.png -->
				<img class="site-footer__logo" src="<?php echo rts_img( 'logo.png' ); ?>" alt="RTS Inc." width="54" height="54" loading="lazy">
				<p class="site-footer__name">RAMEN TOTAL SOLUTIONS.INC</p>
				<p class="site-footer__sub">RAMEN TOTAL SOLUTIONS.INC</p>
				<p class="site-footer__desc">学ぶ・創る・建てる・広げる。飲食店の開業と運営を、ひとつの輪で支える。</p>
				<p class="site-footer__address"><?php echo esc_html( rts_config( 'address' ) ); ?></p>
			</div>
			<div class="site-footer__navs">
				<nav class="footer-nav" aria-label="サイトナビゲーション">
					<p class="footer-nav__title">SITE NAVIGATION</p>
					<?php rts_nav( 'footer_site', 'footer-nav__list', true ); ?>
				</nav>
				<nav class="footer-nav" aria-label="事業サイト">
					<p class="footer-nav__title">OUR BUSINESSES</p>
					<?php rts_nav( 'footer_business', 'footer-nav__list', true ); ?>
				</nav>
			</div>
		</div>
		<div class="site-footer__bottom">
			<p class="site-footer__copy">&copy; RAMEN TOTAL SOLUTIONS .inc ALL RIGHTS RESERVED.</p>
			<a class="site-footer__privacy" href="<?php echo esc_url( rts_config( 'privacy_url' ) ); ?>">PRIVACY POLICY</a>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
