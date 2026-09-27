<?php
/**
 * OUR BUSINESSES
 *
 * @package rts
 */

$businesses = array(
	array(
		'num'   => '01',
		'name'  => '食の道場SCHOOL',
		'catch' => 'ミシュランを生む、「教える力」',
		'text'  => '開業に必要な技術と経営を、実践中心のカリキュラムで体系的に学べる専門スクール。<br>13年にわたり開業希望者へ調理技術と店舗運営ノウハウを伝え、数多くの繁盛店・ミシュラン掲載店を世に送り出してきました。<br>この実績こそが、ソリューションの土台です。',
		'tags'  => array( '卒業生1,500名超', 'ミシュラン掲載店輩出' ),
		'url'   => rts_config( 'site_school' ),
		'img'   => 'business-school.png',
		'alt'   => '厨房で調理指導を受ける受講生',
	),
	array(
		'num'   => '02',
		'name'  => '食の道場LABO',
		'catch' => '数字にコミットする、商品開発部',
		'text'  => 'スープ・麺・食材をオーダーメイド開発。小規模店舗から大規模導入まで伴走します。<br>商品開発を請け負う事業者は多数あります。<br>食の道場LABOは「開発できる」だけではなく、「売る」までサポートできるのが強みです。',
		'tags'  => array( '大規模導入実績', '継続的な品質管理' ),
		'url'   => rts_config( 'site_labo' ),
		'img'   => 'business-labo.png',
		'alt'   => 'ラーメンを試食しながら商品開発を行うスタッフ',
	),
	array(
		'num'   => '03',
		'name'  => '食の道場BUILD',
		'catch' => '飲食専門の施工で、ブランドを店舗の形にする',
		'text'  => '内装工事から厨房機器導入まで、現地調査・設計・施工を一気通貫。<br>窓口を一本化することで、価格低減とスピードを両立します。',
		'tags'  => array( '一気通貫支援', '年間約70プランナー' ),
		'url'   => rts_config( 'site_build' ),
		'img'   => 'business-build.png',
		'alt'   => 'ラーメン店の内装を施工する職人',
	),
	array(
		'num'   => '04',
		'name'  => 'GLOBAL INVESTMENT',
		'catch' => '日本の食の力を、世界の街へ。',
		'text'  => 'ラーメン店をはじめ、日本食の出店がまだ限られている中央アジアは、今後の市場拡大が期待されるエリアです。<br>自社出店で培った実践ノウハウをもとに、教育のアウトソーシングと食材供給を通じて、海外で日本食ビジネスの成長を支援。<br>現地に事業基盤がない企業の進出も後押しします。',
		'tags'  => array( '中央アジア展開', '教育・食材供給' ),
		'url'   => rts_config( 'site_global' ),
		'img'   => 'business-global.png',
		'alt'   => '海外のラーメン店で食事を楽しむ人々',
	),
);
?>
<section class="business" id="business">
	<div class="container">
		<header class="business__head js-fade">
			<p class="label-sans">OUR BUSINESSES</p>
			<h2 class="business__title">4つの事業で、<wbr>開業から世界展開までを支える。</h2>
			<p class="business__lead">なぜ潰れる店と、生き残る店があるのか。<wbr>その問いに向き合い続け、<wbr>学ぶ・創る・建てる・広げるをつなぐ、<wbr>4つの事業体制へ発展しました。</p>
		</header>

		<div class="business__list">
			<?php foreach ( $businesses as $i => $b ) : ?>
				<article class="biz<?php echo ( $i % 2 ) ? ' biz--reverse' : ''; ?> js-fade">
					<div class="biz__body">
						<p class="biz__num"><?php echo esc_html( $b['num'] ); ?></p>
						<h3 class="biz__name"><?php echo esc_html( $b['name'] ); ?></h3>
						<p class="biz__catch"><?php echo esc_html( $b['catch'] ); ?></p>
						<p class="biz__text"><?php echo wp_kses( $b['text'], array( 'br' => array() ) ); ?></p>
						<div class="biz__foot">
							<p class="biz__tags"><?php echo esc_html( implode( '｜', $b['tags'] ) ); ?></p>
							<a class="btn-red" href="<?php echo esc_url( $b['url'] ); ?>" target="_blank" rel="noopener">専門サイトへ<span class="arrow" aria-hidden="true">↗</span></a>
						</div>
					</div>
					<figure class="biz__img">
						<!-- 【画像差し替え】事業<?php echo esc_html( $b['num'] ); ?>：assets/images/<?php echo esc_html( $b['img'] ); ?>（推奨 1400×840px） -->
						<img src="<?php echo rts_img( $b['img'] ); ?>" alt="<?php echo esc_attr( $b['alt'] ); ?>" width="1400" height="840" loading="lazy">
					</figure>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
