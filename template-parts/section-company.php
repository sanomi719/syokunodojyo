<?php
/**
 * COMPANY（会社概要）
 *
 * @package rts
 */

$company = array(
	'会社名'   => 'RAMEN TOTAL SOLUTIONS 株式会社',
	'代表者'   => '代表取締役 秋本 翔太',
	'設立'    => '20XX年XX月（確定情報差し込み予定）',
	'資本金'   => 'XX,XXX,XXX円（確定情報差し込み予定）',
	'事業内容'  => '飲食人材教育、商品・食材開発、店舗設計・施工、海外展開支援',
	'本社'    => rts_config( 'address' ),
	'事業拠点'  => '食の道場 SCHOOL ／ LABO 開発拠点 ／ BUILD 施工拠点（各住所差し込み予定）',
	'主要取引先' => '株式会社マルゼン／株式会社マルサヤ／大和産業株式会社／株式会社羽田製麺／株式会社めんつう／株式会社品川麺機／有限会社大成機械工業／田邊工業株式会社',
);
?>
<section class="company" id="company">
	<div class="container">
		<header class="company__head js-fade">
			<p class="label-line label-line--red">COMPANY</p>
			<h2 class="company__title">会社概要</h2>
		</header>

		<dl class="company__table js-fade">
			<?php foreach ( $company as $dt => $dd ) : ?>
				<div class="company__row">
					<dt><?php echo esc_html( $dt ); ?></dt>
					<dd><?php echo esc_html( $dd ); ?></dd>
				</div>
			<?php endforeach; ?>
		</dl>
	</div>
</section>
