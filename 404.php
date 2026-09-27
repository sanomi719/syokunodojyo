<?php
/**
 * 404（ページが見つからない）
 *
 * @package rts
 */

get_header();
?>
<main id="main" class="site-main page-main">
	<div class="container">
		<article class="entry">
			<header class="entry__head">
				<p class="label-serif label-serif--lg">404 NOT FOUND</p>
				<h1 class="entry__title">お探しのページは見つかりませんでした。</h1>
			</header>
			<div class="entry__content">
				<p>URLが変更されたか、ページが削除された可能性があります。</p>
				<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップページへ戻る</a></p>
			</div>
		</article>
	</div>
</main>
<?php
get_footer();
