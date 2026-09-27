<?php
/**
 * 最新情報一覧（「設定 > 表示設定」の投稿ページ）
 *
 * @package rts
 */

get_header();
?>
<main id="main" class="site-main page-main">
	<div class="container">
		<header class="news__head">
			<p class="label-serif label-serif--lg">NEWS</p>
			<h1 class="news__title">最新情報</h1>
		</header>
		<?php get_template_part( 'template-parts/content', 'news-list' ); ?>
	</div>
</main>
<?php
get_footer();
