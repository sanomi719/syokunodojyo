<?php
/**
 * NEWS（最新情報）
 * 投稿の最新4件を表示。投稿が無い場合はデザイン通りのダミーを表示します。
 * ラベル色は投稿カテゴリのスラッグ（school / labo / build / global）で切り替わります。
 *
 * @package rts
 */

$news_query = new WP_Query(
	array(
		'post_type'           => 'post',
		'posts_per_page'      => 4,
		'ignore_sticky_posts' => true,
	)
);

// ダミー（投稿が0件のときのみ表示）
$dummy = array(
	array( 'school', 'SCHOOL', '2026.08.01', '繁盛ラーメン店・独立開業をめざす方向け無料見学会', 'news-01.png' ),
	array( 'labo', 'LABO', '2026.07.25', '地域に愛されるラーメン店の味を共同で開発しました', 'news-02.png' ),
	array( 'build', 'BUILD', '2026.06.30', '店舗の設計と施工を手掛けた新店がオープンしました', 'news-03.png' ),
	array( 'global', 'GLOBAL', '2026.05.15', '中央アジアでの人材育成プロジェクトが始動', 'news-04.png' ),
);
?>
<section class="news" id="news">
	<div class="container">
		<header class="news__head js-fade">
			<p class="label-serif label-serif--lg">NEWS</p>
			<h2 class="news__title">最新情報</h2>
			<a class="news__more" href="<?php echo esc_url( rts_news_archive_url() ); ?>">すべて見る <span aria-hidden="true">→</span></a>
		</header>

		<div class="news__list js-fade">
			<?php if ( $news_query->have_posts() ) : ?>
				<?php
				$i = 0;
				while ( $news_query->have_posts() ) :
					$news_query->the_post();
					$label = rts_news_label();
					$i++;
					?>
					<a class="news-card" href="<?php the_permalink(); ?>">
						<figure class="news-card__img">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'rts-news', array( 'loading' => 'lazy' ) ); ?>
							<?php else : ?>
								<!-- 【画像差し替え】アイキャッチ未設定時の代替：assets/images/news-0<?php echo (int) $i; ?>.png（推奨 600×520px） -->
								<img src="<?php echo rts_img( 'news-0' . min( $i, 4 ) . '.png' ); ?>" alt="" width="600" height="520" loading="lazy">
							<?php endif; ?>
						</figure>
						<span class="news-tag news-tag--<?php echo esc_attr( $label['slug'] ); ?>"><?php echo esc_html( $label['name'] ); ?></span>
						<time class="news-card__date" datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></time>
						<p class="news-card__title"><?php the_title(); ?></p>
					</a>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php else : ?>
				<?php foreach ( $dummy as $d ) : ?>
					<a class="news-card" href="<?php echo esc_url( rts_news_archive_url() ); ?>">
						<figure class="news-card__img">
							<!-- 【画像差し替え】最新情報：assets/images/<?php echo esc_html( $d[4] ); ?>（推奨 600×520px） -->
							<img src="<?php echo rts_img( $d[4] ); ?>" alt="" width="600" height="520" loading="lazy">
						</figure>
						<span class="news-tag news-tag--<?php echo esc_attr( $d[0] ); ?>"><?php echo esc_html( $d[1] ); ?></span>
						<time class="news-card__date"><?php echo esc_html( $d[2] ); ?></time>
						<p class="news-card__title"><?php echo esc_html( $d[3] ); ?></p>
					</a>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
