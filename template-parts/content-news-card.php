<?php
/**
 * 最新情報カード（一覧用）
 * ループ内で get_template_part( 'template-parts/content', 'news-card' ) で呼び出します。
 *
 * @package rts
 */
$label = rts_news_label();
?>
<a class="news-card" href="<?php the_permalink(); ?>">
	<figure class="news-card__img">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'rts-news', array( 'loading' => 'lazy' ) ); ?>
		<?php else : ?>
			<!-- 【画像差し替え】アイキャッチ未設定時の代替：assets/images/news-01.png -->
			<img src="<?php echo rts_img( 'news-01.png' ); ?>" alt="" width="600" height="520" loading="lazy">
		<?php endif; ?>
	</figure>
	<span class="news-tag news-tag--<?php echo esc_attr( $label['slug'] ); ?>"><?php echo esc_html( $label['name'] ); ?></span>
	<time class="news-card__date" datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></time>
	<p class="news-card__title"><?php the_title(); ?></p>
</a>
