<?php
/**
 * EXPERIENCE（実績）
 *
 * @package rts
 */

$row1 = array(
	array( '20年', '飲食店づくりに向き合った期間' ),
	array( '4,500軒', '立ち上げに関わった飲食店' ),
	array( '1,200軒', 'うち、ラーメン店' ),
);
$row2 = array(
	array( '13年', '創業' ),
	array( '1,500名超', '卒業生' ),
	array( '8店舗', 'ミシュラン掲載' ),
	array( '4,500軒', '立ち上げ関与' ),
);
?>
<section class="experience" id="experience">
	<div class="container">
		<header class="experience__head js-fade">
			<p class="label-serif label-serif--lg">EXPERIENCE</p>
			<h2 class="experience__title">私たちの実績</h2>
		</header>

		<div class="stats stats--row1 js-fade">
			<?php foreach ( $row1 as $s ) : ?>
				<div class="stat">
					<p class="stat__num"><?php echo esc_html( $s[0] ); ?></p>
					<p class="stat__label"><?php echo esc_html( $s[1] ); ?></p>
				</div>
			<?php endforeach; ?>
			<p class="stats__text">現場で積み重ねた経験は、店づくりだけでなく、開業後の運営や人材、商品づくりへと広がってきました。</p>
		</div>

		<div class="stats stats--row2 js-fade">
			<?php foreach ( $row2 as $s ) : ?>
				<div class="stat">
					<p class="stat__num"><?php echo esc_html( $s[0] ); ?></p>
					<p class="stat__label"><?php echo esc_html( $s[1] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
