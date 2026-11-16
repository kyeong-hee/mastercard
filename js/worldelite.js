/* =========================================================
	월드엘리트 혜택 (/worldelite/) 전용 스크립트
	- share.js 이후 로드 (gsap, ScrollTrigger, smoother, scrollToTarget 사용)
========================================================= */

/* ---------------------------------------------------------
	02. 큐레이션
	PC(1025~)
	  1) 섹션 진입 시 pin → 이너 사이즈 이미지가 화면 가득 확장 (scrub)
	  2) 확장 완료 후 스크롤 양(화면 높이 0.9배)마다 다음/이전 슬라이드로 페이드 전환 (스냅 없음)
	MO(~1024)
	  세로 나열 + 탭 상단 고정 + 스크롤 위치에 따라 탭 활성화
--------------------------------------------------------- */
(function(){
    const $cur = $('#curation');
    if(!$cur.length) return;

    const frame = $cur.find('.cur_frame')[0];
    const $slides = $cur.find('.cur_slide');
    const $tabs = $cur.find('.cur_tabs .tab');
    const total = $slides.length;
    let idx = 0;
    let moveTo = null; // 현재 화면 모드의 탭 이동 함수

    function setIndex(i){
        i = Math.max(0, Math.min(total - 1, i));
        idx = i;
        $slides.removeClass('on').eq(i).addClass('on');
        $tabs.removeClass('on').attr('aria-selected', false).eq(i).addClass('on').attr('aria-selected', true);
        frame.style.setProperty('--idx', i);
    }

    $tabs.on('click', function(){
        if(moveTo) moveTo($tabs.index(this));
    });

    const mm = gsap.matchMedia();

    /* ===== PC ===== */
    mm.add('(min-width: 1025px)', () => {
        const pin = $cur.find('.cur_pin')[0];
        const $intro = $cur.find('.cur_intro');
        const EXPAND = 1;     // 이미지 확장 구간 (화면 높이 배수)
        const STEP = 0.9;     // 슬라이드 1장당 스크롤 거리 (화면 높이 배수)
        const vh = () => window.innerHeight;

        // 이너 사이즈(1440 x 736) 기준 클립 영역
        function box(){
            const cw = document.documentElement.clientWidth;
            const w = Math.min(1440, cw * 0.95);
            const h = Math.min(736, w * 736 / 1440, vh() - 160);
            return {x: (cw - w) / 2, y: (vh() - h) / 2};
        }
        // 소개 텍스트 ~ 이미지 간격 69px 유지
        function setIntroGap(){
            $intro.css('margin-bottom', 69 - box().y);
        }
        setIntroGap();
        ScrollTrigger.addEventListener('refreshInit', setIntroGap);

        setIndex(0);

        let st;
        // 슬라이드 구간: 확장 구간 이후 STEP(화면 높이 배수)씩 1장 — 스크롤 양으로만 판단 (스냅·자동 이동 없음)
        const firstPos = () => st.start + vh() * EXPAND;
        const stepPx = () => vh() * STEP;

        function onUpdate(self){
            const y = self.scroll();
            const i = y < firstPos() ? 0 : Math.floor((y - firstPos()) / stepPx());
            const next = Math.max(0, Math.min(total - 1, i));
            if(next !== idx) setIndex(next);
        }

        // 탭 클릭: 해당 슬라이드 구간의 20% 지점으로 이동 (살짝 스크롤해도 바로 이전 슬라이드로 돌아가지 않도록)
        moveTo = i => {
            const y = firstPos() + stepPx() * (i + 0.2);
            if(smoother) smoother.scrollTo(y, true);
            else gsap.to(window, {scrollTo: {y: y, autoKill: true}, duration: .8, ease: 'power2.inOut'});
        };

        const tl = gsap.timeline({
            defaults: {ease: 'none'},
            scrollTrigger: {
                trigger: pin,
                start: 'top top',
                end: () => '+=' + (vh() * EXPAND + vh() * STEP * total),
                pin: true,
                scrub: true,
                invalidateOnRefresh: true,
                onUpdate: onUpdate,
                onRefresh: onUpdate,
            }
        });
        st = tl.scrollTrigger;

        // 1) 이너 사이즈 → 풀 화면 확장, 2) 딤·텍스트·탭 노출, 3) 슬라이드 구간 유지
        tl.fromTo(frame,
            {clipPath: () => { const b = box(); return `inset(${b.y}px ${b.x}px ${b.y}px ${b.x}px)`; }},
            {clipPath: 'inset(0px 0px 0px 0px)', duration: EXPAND * 0.75})
          .fromTo(frame, {'--ui': 0}, {'--ui': 1, duration: EXPAND * 0.25})
          .to({}, {duration: STEP * total});

        return () => {
            ScrollTrigger.removeEventListener('refreshInit', setIntroGap);
            $intro.css('margin-bottom', '');
            moveTo = null;
        };
    });

    /* ===== MO / TABLET ===== */
    mm.add('(max-width: 1024px)', () => {
        const tabs = $cur.find('.cur_tabs_pin')[0]; // pin은 래퍼에, 헤더 숨김 시 이동은 내부 .cur_tabs에 적용
        const slidesWrap = $cur.find('.cur_slides')[0];
        const hdH = () => $('.header').outerHeight() || 56;
        const offset = () => hdH() + tabs.offsetHeight;

        setIndex(0);

        // 탭: GNB 아래 고정
        ScrollTrigger.create({
            trigger: tabs,
            start: () => 'top ' + hdH(),
            endTrigger: slidesWrap,
            end: () => 'bottom ' + offset(),
            pin: true,
            pinSpacing: false,
            invalidateOnRefresh: true,
            // 고정 중일 때만 헤더 숨김(hd_hide)에 맞춰 탭을 화면 최상단으로 올림 (css: .cur_tabs.is-pinned)
            onToggle: self => tabs.classList.toggle('is-pinned', self.isActive),
        });

        // 스크롤 스파이
        const spies = $slides.map((i, el) => ScrollTrigger.create({
            trigger: el,
            start: () => 'top ' + (offset() + 1),
            end: () => 'bottom ' + (offset() + 1),
            onToggle: self => { if(self.isActive) setIndex(i); },
        })).get();

        moveTo = i => {
            // 헤더가 숨겨진 상태 기준: 슬라이드 상단이 고정 탭 바로 아래(헤더 오프셋 0)에 오도록
            const y = spies[i].start + hdH() + 2;
            if(smoother) smoother.scrollTo(y, true);
            else gsap.to(window, {scrollTo: {y: y, autoKill: false}, duration: .6, ease: 'power2.out'});
        };

        return () => { moveTo = null; };
    });
})();


/* ---------------------------------------------------------
	멤버십 등급 매칭 팝업 (풀 화면)
--------------------------------------------------------- */
(function(){
    const $pop = $('#memPop');
    if(!$pop.length) return;
    let lastFocus = null;
    let closeTimer = null;

    function openPop(){
        clearTimeout(closeTimer);
        lastFocus = document.activeElement;
        $pop.prop('hidden', false).scrollTop(0);
        requestAnimationFrame(() => $pop.addClass('open'));
        $('html').css('overflow', 'hidden');
        if(smoother) smoother.paused(true);
        $pop.find('.pop_sheet').attr('tabindex', -1)[0].focus({preventScroll: true});
    }
    function closePop(){
        if($pop.prop('hidden')) return;
        $pop.removeClass('open');
        closeTimer = setTimeout(() => $pop.prop('hidden', true), 350);
        $('html').css('overflow', '');
        if(smoother) smoother.paused(false);
        if(lastFocus) lastFocus.focus({preventScroll: true});
    }

    $(document).on('click', '.btn_mem', function(e){
        e.preventDefault();
        openPop();
    });
    $pop.on('click', '.pop_close', closePop);
    // MO: 시트 바깥(딤) 클릭 시 닫기
    $pop.on('click', function(e){
        if(e.target === this && window.innerWidth <= 1024) closePop();
    });
    $(document).on('keydown', function(e){
        if(e.key === 'Escape') closePop();
    });
})();
