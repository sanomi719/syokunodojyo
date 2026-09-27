/* RAMEN TOTAL SOLUTIONS Corporate - main.js */
(function () {
	'use strict';
	document.documentElement.classList.add('js');

	var header = document.getElementById('site-header');
	var toggle = document.getElementById('menu-toggle');

	/* ヘッダー：スクロールで背景色 */
	function onScroll() {
		if (!header) return;
		header.classList.toggle('is-scrolled', window.scrollY > 40);
	}
	window.addEventListener('scroll', onScroll, { passive: true });
	onScroll();

	/* SPメニュー */
	var spMenu = document.getElementById('sp-menu');
	var spClose = document.getElementById('sp-menu-close');
	function openMenu() {
		header.classList.add('is-menu-open');
		document.body.classList.add('is-menu-locked');
		toggle.setAttribute('aria-expanded', 'true');
		spMenu.setAttribute('aria-hidden', 'false');
		if (spClose) spClose.focus();
	}
	function closeMenu() {
		header.classList.remove('is-menu-open');
		document.body.classList.remove('is-menu-locked');
		toggle.setAttribute('aria-expanded', 'false');
		spMenu.setAttribute('aria-hidden', 'true');
	}
	if (toggle && spMenu) {
		toggle.addEventListener('click', function () {
			header.classList.contains('is-menu-open') ? closeMenu() : openMenu();
		});
		if (spClose) spClose.addEventListener('click', function () { closeMenu(); toggle.focus(); });
		spMenu.addEventListener('click', function (e) {
			if (e.target.closest('a')) closeMenu();
		});
		document.addEventListener('keydown', function (e) {
			if (e.key === 'Escape' && header.classList.contains('is-menu-open')) { closeMenu(); toggle.focus(); }
		});
	}

	/* フェードイン */
	var targets = document.querySelectorAll('.js-fade');
	if ('IntersectionObserver' in window) {
		var io = new IntersectionObserver(function (entries) {
			entries.forEach(function (entry) {
				if (entry.isIntersecting) {
					entry.target.classList.add('is-inview');
					io.unobserve(entry.target);
				}
			});
		}, { rootMargin: '0px 0px -10% 0px' });
		targets.forEach(function (el) { io.observe(el); });
	} else {
		targets.forEach(function (el) { el.classList.add('is-inview'); });
	}

	/* SP：サイクル図の拡大表示 */
	var zoomOpen = document.getElementById('cycle-zoom-open');
	var zoomModal = document.getElementById('cycle-modal');
	var zoomClose = document.getElementById('cycle-zoom-close');
	var zoomScroll = document.getElementById('cycle-modal-scroll');
	if (zoomOpen && zoomModal && typeof zoomModal.showModal === 'function') {
		zoomOpen.addEventListener('click', function () {
			zoomModal.showModal();
			document.body.classList.add('is-modal-open');
			// 図の中央から表示
			requestAnimationFrame(function () {
				zoomScroll.scrollLeft = (zoomScroll.scrollWidth - zoomScroll.clientWidth) / 2;
			});
		});
		zoomClose.addEventListener('click', function () { zoomModal.close(); });
		zoomModal.addEventListener('close', function () {
			document.body.classList.remove('is-modal-open');
			zoomOpen.focus();
		});
	}
})();
