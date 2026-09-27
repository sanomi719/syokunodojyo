<?php
/**
 * BUSINESS CYCLE
 * 図は画像で表示（PC：cycle_pc.png / SP：cycle_sp.png）
 *
 * @package rts
 */
?>
<section class="cycle" id="cycle">
	<div class="container">
		<header class="cycle__head js-fade">
			<p class="label-serif label-serif--red">BUSINESS CYCLE</p>
			<h2 class="cycle__title">4つの事業がつながり合い、<wbr>事業の可能性を広げる。</h2>
		</header>

		<figure class="cycle__figure js-fade">
			<!-- 【画像差し替え】サイクル図 PC：assets/images/cycle_pc.png（1280×943px） / SP：assets/images/cycle_sp.png（2560×1886px） -->
			<picture>
				<source media="(max-width: 767px)" srcset="<?php echo rts_img( 'cycle_sp.png' ); ?>" width="2560" height="1886">
				<img src="<?php echo rts_img( 'cycle_pc.png' ); ?>" alt="4つの事業の循環図：中心のRAMEN TOTAL SOLUTIONSと、LEARN（食の道場SCHOOL）・MAKE（食の道場LABO）・BUILD（食の道場BUILD）・GLOBAL（海外展開支援）がつながり循環する" width="1280" height="943" loading="lazy">
			</picture>
		</figure>

		<!-- SPのみ表示：図の拡大ボタン -->
		<button class="cycle__zoom" type="button" id="cycle-zoom-open" aria-haspopup="dialog" aria-controls="cycle-modal">
			<svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true"><circle cx="10.5" cy="10.5" r="6.5" fill="none" stroke="currentColor" stroke-width="2.4"/><path d="M15.5 15.5 20.5 20.5" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"/></svg>
			<span>クリックして拡大</span>
		</button>

		<p class="cycle__caption js-fade">学ぶ、創る、建てる、広げる。<br>4つのプロフェッショナルが中心でつながり、<wbr>開業から世界展開までを一体で支えます。</p>
	</div>

	<!-- SP：サイクル図の拡大表示 -->
	<dialog class="cycle-modal" id="cycle-modal" aria-label="BUSINESS CYCLE 図の拡大表示">
		<div class="cycle-modal__bar">
			<p class="cycle-modal__hint">左右にスクロールしてご覧ください</p>
			<button class="cycle-modal__close" type="button" id="cycle-zoom-close" aria-label="閉じる">
				<svg viewBox="0 0 24 24" width="22" height="22" aria-hidden="true"><path d="M5 5l14 14M19 5L5 19" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
			</button>
		</div>
		<div class="cycle-modal__scroll" id="cycle-modal-scroll">
			<img src="<?php echo rts_img( 'cycle_sp.png' ); ?>" alt="4つの事業の循環図（拡大）" width="2560" height="1886" loading="lazy">
		</div>
	</dialog>
</section>
