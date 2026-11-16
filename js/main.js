// =========================================================
// MAIN (/index.php)
// =========================================================

$(function(){

    // ---------------------------------------------------------
    // 02. 혜택 라인업 MOTION (참고 : mastercard_main_C_1.html 라인업 섹션 모션)
    //  ※ 디자인(위치·크기·이미지)은 피그마 시안 그대로, 모션만 적용
    //  - 배경 빛 : PC 02 ~ 03 스크롤 동안 화면 고정(광선 연속) → 03 끝에서 고정 해제
    //  - 빛 스윕 : 섹션 진입 직후 마스크가 열리며 퍼짐 (최종 상태 = 시안 이미지)
    //  - 타이틀·설명 : PC 화면 고정, 이미지만 스크롤 → 섹션 끝나면 페이드아웃
    //  - 혜택 이미지 : 스크롤 등장
    //  - prefers-reduced-motion : reduce 인 경우 미적용
    // ---------------------------------------------------------
    const mm = gsap.matchMedia();

    mm.add({
        isPC: '(min-width: 1025px)',
        motion: '(prefers-reduced-motion: no-preference)',
    }, function(ctx){
        if(!ctx.conditions.motion) return;
        const isPC = ctx.conditions.isPC;

        const wrap = document.querySelector('.m_lineup_wrap');
        const lineup = wrap.querySelector('.m_lineup');
        const light1 = wrap.querySelector('.light1');
        const light2 = wrap.querySelector('.light2');
        const light3 = wrap.querySelector('.light3');

        if(isPC){
            // 배경 빛 고정 : 02 시작 ~ 03 끝까지 light1 하나를 계속 고정해 광선이 끊기지 않고 03 까지 이어지게 함
            //               light1 하단이 공통 배경(.m_lineup_wrap) 하단에 닿는 지점에서 고정 해제 → 03 과 함께 자연스럽게 스크롤 아웃
            //               (light2 · light3 은 동일 이미지라 고정 중에는 숨기고 light1 이 그 자리를 대신함 / 03 시점 배치 ≒ 시안 light3 위치)
            //               시안 opacity : light1 50% → light2 100% 이므로 light2 위치까지 50% → 100% 로 전환(스크롤 연동), 이후 100% 유지 = 시안 그대로
            gsap.set([light2, light3], { autoAlpha: 0 });
            ScrollTrigger.create({
                trigger: wrap, start: 'top top',
                end: function(){ return '+=' + Math.max(0, wrap.offsetHeight - light1.offsetHeight); },
                pin: light1, pinSpacing: false, invalidateOnRefresh: true,
            });
            gsap.fromTo(light1, { opacity: .5 }, {
                opacity: 1, ease: 'none',
                scrollTrigger: { trigger: wrap, start: 'top top', end: function(){ return '+=' + light2.offsetTop; }, scrub: true, invalidateOnRefresh: true },
            });
            // 타이틀·설명 고정 / 이미지만 스크롤 → 라인업 끝나면 페이드아웃
            ScrollTrigger.create({ trigger: lineup, start: 'top top', end: 'bottom bottom', pin: '.lineup_fix', pinSpacing: false });
            ScrollTrigger.create({
                trigger: lineup, start: 'bottom 90%', end: 'max',
                onEnter: function(){ lineup.classList.add('is_out'); },
                onLeaveBack: function(){ lineup.classList.remove('is_out'); },
            });
            // 고정 타이틀·설명 ↔ 좌측 리스트(item1·item3) 겹침 방지
            // item1 이미지 상단이 설명 하단 +260px 에 오면 페이드 시작 → 설명 하단 +20px 도달 시 완전히 사라짐 (스크롤 연동, 역스크롤 시 복귀)
            // .lineup_fix 는 is_out 용 CSS transition 이 있어 충돌 방지를 위해 자식 요소에 적용
            const fixTxt = lineup.querySelectorAll('.lineup_tit, .lineup_desc_l');
            const item1 = lineup.querySelector('.item1');
            const descL = lineup.querySelector('.lineup_desc_l');
            const item1Top = function(){ // 섹션 기준 item1 위치 (등장 모션 transform 영향 없도록 offsetTop 사용)
                let el = item1, top = 0;
                while(el && el !== lineup){ top += el.offsetTop; el = el.offsetParent; }
                return top;
            };
            const fadeAt = function(gap){ return 'top ' + (descL.offsetTop + descL.offsetHeight + gap - item1Top()) + 'px'; };
            gsap.to(fixTxt, {
                autoAlpha: 0, y: -40, ease: 'none',
                scrollTrigger: {
                    trigger: lineup, scrub: true, invalidateOnRefresh: true,
                    start: function(){ return fadeAt(260); },
                    end: function(){ return fadeAt(20); },
                },
            });
        }

        // 참고 HTML 이징 : --ease cubic-bezier(.22,.61,.36,1)
        const easeHtml = CustomEase.create('lineupEase', '.22,.61,.36,1');

        // 배경 빛 : 사선 라인 드로잉(1s) → 라인에서 광선이 오른쪽으로 펼쳐짐(2.2s) → 라인 글로우 반복 / 섹션 진입 시 1회
        //          ※ 모션 타이밍만 조정, 밝기·위치 등 디자인은 시안 그대로
        //          광선 마스크 경계(--draw)는 사선 라인 위치(약 .62)에서 시작해 이미지 끝(1.15)까지 열림
        //          PC 는 02 섹션이 화면 하단 20% 들어왔을 때 바로 시작 (기존 37% 노출 시점 → 초반 배경이 허전해 앞당김)
        const lightImgs = isPC ? [light1.querySelector('img')] : gsap.utils.toArray('.lineup_light img', wrap);
        const lightLine = light1.querySelector('.light_line path');
        lightImgs.forEach(function(img){
            gsap.set(img, { '--draw': isPC ? .62 : .6 });
            const tl = gsap.timeline({
                scrollTrigger: {
                    trigger: isPC ? wrap : img.closest('.lineup_light'), once: true,
                    start: isPC ? 'top 80%' : 'top 75%',
                },
            });
            if(isPC){
                tl.fromTo(lightLine, { strokeDashoffset: 100 }, { strokeDashoffset: 0, duration: 1, ease: easeHtml }, 0)
                  .add(function(){
                      ctx.add(function(){ // 반복 tween 도 matchMedia 해제 시 함께 정리
                          gsap.fromTo(lightLine, { opacity: .9 }, { opacity: .35, duration: 2, ease: 'sine.inOut', repeat: -1, yoyo: true });
                      });
                  }, 2.9);
            }
            // 라인이 거의 그려진 시점(.7s)부터 광선이 라인에서 자연스럽게 퍼져 나감
            tl.to(img, { '--draw': 1.15, duration: isPC ? 2.2 : 2.6, ease: 'sine.inOut' }, isPC ? .7 : 0);
        });

        // 혜택 이미지 스크롤 등장 (translateY 80 → 0 / opacity 1s, transform 1.2s)
        gsap.utils.toArray('.item', lineup).forEach(function(item){
            // 참고 HTML : 이미지 20% 노출 시 (threshold .2)
            gsap.timeline({ scrollTrigger: { trigger: item, once: true, start: 'top bottom-=' + Math.round(item.offsetHeight * .2) } })
                .from(item, { opacity: 0, duration: 1, ease: easeHtml }, 0)
                .from(item, { y: 80, duration: 1.2, ease: easeHtml }, 0);
        });

        // 섹션 진입 시 타이틀(좌) · 카드 플레이트(우) 페이드인 / 1회
        //  - PC : 타이틀·설명 먼저 → 카드 플레이트 .2s 뒤 / MO : 카드 플레이트(상단) 먼저 → 타이틀
        //  - 타이틀은 겹침 방지 스크롤 페이드(.lineup_tit · .lineup_desc_l)와 충돌하지 않도록 래퍼(.lineup_fix_in)에 적용
        const introTit = lineup.querySelector('.lineup_fix_in');
        const introCard = lineup.querySelector(isPC ? '.lineup_card_pc' : '.lineup_card');
        gsap.timeline({ scrollTrigger: { trigger: lineup, once: true, start: isPC ? 'top 60%' : 'top 75%' } })
            .from(isPC ? introTit : introCard, { opacity: 0, duration: 1, ease: easeHtml }, 0)
            .from(isPC ? introTit : introCard, { y: 60, duration: 1.2, ease: easeHtml }, 0)
            .from(isPC ? introCard : introTit, { opacity: 0, duration: 1, ease: easeHtml }, .2)
            .from(isPC ? introCard : introTit, { y: 60, duration: 1.2, ease: easeHtml }, .2);

        return function(){
            lineup.classList.remove('is_out');
            gsap.set(light1, { clearProps: 'opacity' });
        };
    });


    // ---------------------------------------------------------
    // 04. World Elite 큐레이션 롤링
    //     01 다이닝 → 02 엔터테인먼트 → 03 호텔 → 04 아울렛
    //     이미지와 텍스트가 함께 롤링 (시안 설명 반영)
    // ---------------------------------------------------------
    const $weBar = $('.m_we .we_bar button');

    const weSwiper = new Swiper('.we_swiper', {
        effect: 'fade',
        fadeEffect: { crossFade: true },
        loop: true,
        speed: 800,
        autoplay: { delay: 4000, disableOnInteraction: false },
        on: {
            slideChange: function(){
                $weBar.removeClass('on').eq(this.realIndex).addClass('on');
            },
        },
    });
    $weBar.on('click', function(){
        weSwiper.slideToLoop($(this).index());
    });


    // ---------------------------------------------------------
    // 05. 시즈널 혜택 - 국내 다이닝 드래그 리스트
    //     - 자동 롤링 : 3초마다 1칸씩 이동(loop), 드래그 후에도 자동 롤링 유지
    //     - PC 마우스 오버 중에는 일시정지 (DRAG 커서로 직접 넘겨보는 동안)
    //     - 화면에 보일 때만 롤링, 동작 줄이기(prefers-reduced-motion) 설정 시 자동 롤링 안 함
    // ---------------------------------------------------------
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const diningSwiper = new Swiper('.dining_swiper', {
        slidesPerView: 'auto',
        spaceBetween: 12,
        loop: true,
        speed: 900,
        autoplay: reduceMotion ? false : {
            delay: 3000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },
        breakpoints: {
            1025: { spaceBetween: 20 },
        },
    });
    if(diningSwiper.autoplay && !reduceMotion){
        diningSwiper.autoplay.stop();
        ScrollTrigger.create({
            trigger: '.dining_area',
            start: 'top bottom',
            end: 'bottom top',
            onToggle: function(self){
                self.isActive ? diningSwiper.autoplay.start() : diningSwiper.autoplay.stop();
            },
        });
    }

    // DRAG 커서 (PC 마우스 환경)
    //  - 마우스 좌표만 기록하고, 위치 계산·이동은 gsap.ticker 1곳에서 프레임당 1회 처리
    //  - 매 프레임 영역 위치를 다시 읽어 ScrollSmoother 스크롤 중에도 커서가 마우스에 붙어 있음
    const diningArea = document.querySelector('.dining_area');
    const dragCursor = diningArea && diningArea.querySelector('.drag_cursor');
    if(dragCursor && window.matchMedia('(hover: hover) and (pointer: fine)').matches){
        const FOLLOW = .35; // 60fps 기준 프레임당 따라붙는 비율 (1 = 즉시)
        let mouseX = 0, mouseY = 0, curX = 0, curY = 0, active = false;

        const render = function(){
            const r = diningArea.getBoundingClientRect();
            const tx = mouseX - r.left;
            const ty = mouseY - r.top;
            const k = 1 - Math.pow(1 - FOLLOW, gsap.ticker.deltaRatio()); // 주사율과 무관하게 같은 속도
            curX += (tx - curX) * k;
            curY += (ty - curY) * k;
            dragCursor.style.transform = 'translate3d(' + curX + 'px,' + curY + 'px,0)';
            // 커서가 사라진 뒤 목표 지점에 도착하면 ticker 해제
            if(!active && Math.abs(tx - curX) < .1 && Math.abs(ty - curY) < .1) gsap.ticker.remove(render);
        };

        const swiperEl = diningArea.querySelector('.dining_swiper');
        swiperEl.addEventListener('mouseenter', function(e){
            const r = diningArea.getBoundingClientRect();
            mouseX = e.clientX; mouseY = e.clientY;
            curX = mouseX - r.left; curY = mouseY - r.top; // 진입 지점에서 바로 시작
            active = true;
            gsap.ticker.add(render);
            diningArea.classList.add('drag_on');
        });
        swiperEl.addEventListener('mousemove', function(e){
            mouseX = e.clientX; mouseY = e.clientY;
        }, { passive: true });
        swiperEl.addEventListener('mouseleave', function(){
            active = false;
            diningArea.classList.remove('drag_on');
        });
    }


    // ---------------------------------------------------------
    // 06. 발급 - 신청하기 버튼 마우스 따라다니기 (PC 마우스 환경)
    //  - 기본 : 시안 위치
    //  - 따라다니는 영역 : 섹션 전체 (토글 버튼 + 주변 16px 제외)
    //  - 토글(마이신한 포인트 / 스카이패스) 보호 : 토글 위에서는 따라다니지 않고, 버튼도 토글을 피해 바깥으로 비켜감 (겹치지 않음)
    //  - 영역을 벗어나면 제자리로 부드럽게 복귀 (거리에 따라 .8 ~ 1.2s, ease inOut)
    //  - 따라다니는 동안 영역 클릭 = 신청하기 링크 클릭 (a·button 은 기존 동작 유지)
    //  - 링크 : $applyUrl (comp/header.php, 신청 페이지 확정 후 교체)
    // ---------------------------------------------------------
    const issue = document.querySelector('.m_issue');
    const issueInner = issue.querySelector('.issue_inner');
    const issueCard = issue.querySelector('.issue_card');
    const issueToggle = issue.querySelector('.issue_toggle');
    const applyBtn = issue.querySelector('.issue_apply');

    mm.add('(min-width: 1025px) and (hover: hover) and (pointer: fine) and (prefers-reduced-motion: no-preference)', function(){
        const TOGGLE_GAP = 16;   // 토글과 띄울 간격 (커서 제외 영역 / 버튼 간격 모두)
        const FOLLOW = .12;      // 따라가는 부드러움 (작을수록 느긋하게 따라옴)
        const setX = gsap.quickSetter(applyBtn, 'x', 'px');
        const setY = gsap.quickSetter(applyBtn, 'y', 'px');
        const pos = { x: 0, y: 0 };
        let mx = -1, my = -1, inside = false, moving = false, back = null;

        function update(){
            const sr = issue.getBoundingClientRect();
            const ir = issueInner.getBoundingClientRect();
            const tr = issueToggle.getBoundingClientRect();
            const inSection = mx >= sr.left && mx <= sr.right && my >= sr.top && my <= sr.bottom;
            const onToggle = mx >= tr.left - TOGGLE_GAP && mx <= tr.right + TOGGLE_GAP && my >= tr.top - TOGGLE_GAP && my <= tr.bottom + TOGGLE_GAP;
            const now = inSection && !onToggle;

            if(now !== inside){
                inside = now;
                issue.classList.toggle('apply_follow', inside);
                if(inside){
                    if(back){ back.kill(); back = null; }
                }else{
                    // 제자리 복귀 : 이동 거리에 비례한 시간으로 부드럽게
                    const dist = Math.hypot(pos.x, pos.y);
                    back = gsap.to(pos, { x: 0, y: 0, duration: gsap.utils.clamp(.8, 1.2, dist / 500), ease: 'power2.inOut', onComplete: function(){ back = null; } });
                }
            }

            if(inside){
                // 버튼 원래 위치(transform 제외) 중심 → 커서 (섹션 밖으로 나가지 않게 제한)
                const w = applyBtn.offsetWidth, h = applyBtn.offsetHeight;
                const ox = ir.left + applyBtn.offsetLeft + w / 2;
                const oy = ir.top + applyBtn.offsetTop + h / 2;
                let cx = gsap.utils.clamp(sr.left + w / 2, sr.right - w / 2, mx);
                let cy = gsap.utils.clamp(sr.top + h / 2, sr.bottom - h / 2, my);
                // 버튼이 토글과 겹치게 되면 가장 가까운 바깥쪽(상/하/좌/우)으로 밀어냄
                const el = tr.left - TOGGLE_GAP - w / 2, er = tr.right + TOGGLE_GAP + w / 2;
                const et = tr.top - TOGGLE_GAP - h / 2, eb = tr.bottom + TOGGLE_GAP + h / 2;
                if(cx > el && cx < er && cy > et && cy < eb){
                    const d = { l: cx - el, r: er - cx, t: cy - et, b: eb - cy };
                    const m = Math.min(d.l, d.r, d.t, d.b);
                    if(m === d.t) cy = et; else if(m === d.b) cy = eb; else if(m === d.l) cx = el; else cx = er;
                }
                const k = 1 - Math.pow(1 - FOLLOW, gsap.ticker.deltaRatio());   // 프레임레이트 무관
                pos.x += (cx - ox - pos.x) * k;
                pos.y += (cy - oy - pos.y) * k;
            }
            setX(pos.x);
            setY(pos.y);

            // 따라다니는 중 + 제자리로 복귀하는 중에는 버튼 클릭 막음
            const away = inside || back !== null || Math.abs(pos.x) > 1 || Math.abs(pos.y) > 1;
            if(away !== moving){
                moving = away;
                applyBtn.classList.toggle('is_moving', moving);
            }
        }
        function onMove(e){
            if(e.pointerType && e.pointerType !== 'mouse') return;
            mx = e.clientX; my = e.clientY;
        }
        function onLeave(){ mx = my = -1; }
        function onClick(e){
            if(!inside || e.target.closest('a, button')) return;
            applyBtn.click();
        }

        window.addEventListener('pointermove', onMove, { passive: true });
        document.documentElement.addEventListener('pointerleave', onLeave);
        issue.addEventListener('click', onClick);
        gsap.ticker.add(update); // 스크롤 중에도 커서 기준 위치 갱신

        return function(){
            window.removeEventListener('pointermove', onMove);
            document.documentElement.removeEventListener('pointerleave', onLeave);
            issue.removeEventListener('click', onClick);
            gsap.ticker.remove(update);
            if(back) back.kill();
            issue.classList.remove('apply_follow');
            applyBtn.classList.remove('is_moving');
            gsap.set(applyBtn, { clearProps: 'transform' });
        };
    });


    // ---------------------------------------------------------
    // 06. 발급 - 카드 마우스 오버 틸트 (PC 마우스 환경)
    //  - 커서 위치에 따라 카드가 3D 로 기울어짐 (최대 ±12deg) + 살짝 확대
    //  - 테두리 은색 빛이 커서 방향을 따라 돌고, 표면 반사광이 커서 위치를 따라감
    // ---------------------------------------------------------
    mm.add('(min-width: 1025px) and (hover: hover) and (pointer: fine) and (prefers-reduced-motion: no-preference)', function(){
        const TILT = 12;
        gsap.set(issueCard, { transformPerspective: 900 });
        const rotX = gsap.quickTo(issueCard, 'rotationX', { duration: .6, ease: 'power3' });
        const rotY = gsap.quickTo(issueCard, 'rotationY', { duration: .6, ease: 'power3' });

        function onEnter(){
            issueCard.classList.add('is_tilt');
            gsap.to(issueCard, { scale: 1.04, duration: .6, ease: 'power3.out', overwrite: 'auto' });
        }
        function onMove(e){
            const r = issueCard.getBoundingClientRect();
            const px = Math.min(Math.max((e.clientX - r.left) / r.width, 0), 1);   // 0 ~ 1
            const py = Math.min(Math.max((e.clientY - r.top) / r.height, 0), 1);
            rotY((px - .5) * TILT * 2);
            rotX((.5 - py) * TILT * 2);
            // 테두리 빛 : 카드 중심 → 커서 방향 (conic 0deg = 위쪽 기준), 하이라이트(28deg)가 커서 쪽에 오도록 보정
            const angle = Math.atan2(py - .5, px - .5) * 180 / Math.PI + 90 - 28;
            issueCard.style.setProperty('--shine-angle', angle.toFixed(1) + 'deg');
            issueCard.style.setProperty('--shine-x', (px * 100).toFixed(1) + '%');
            issueCard.style.setProperty('--shine-y', (py * 100).toFixed(1) + '%');
        }
        function onLeave(){
            issueCard.classList.remove('is_tilt');
            rotX(0);
            rotY(0);
            gsap.to(issueCard, { scale: 1, duration: .6, ease: 'power3.out', overwrite: 'auto' });
        }

        issueCard.addEventListener('pointerenter', onEnter);
        issueCard.addEventListener('pointermove', onMove);
        issueCard.addEventListener('pointerleave', onLeave);

        return function(){
            issueCard.removeEventListener('pointerenter', onEnter);
            issueCard.removeEventListener('pointermove', onMove);
            issueCard.removeEventListener('pointerleave', onLeave);
            issueCard.classList.remove('is_tilt');
            gsap.set(issueCard, { clearProps: 'transform' });
        };
    });


    // ---------------------------------------------------------
    // 06. 발급 - 카드 플레이트 토글 (마이신한 포인트 / 스카이패스)
    // ---------------------------------------------------------
    $('.issue_toggle button').on('click', function(){
        const card = $(this).data('card');
        $(this).addClass('on').attr('aria-pressed', true)
            .siblings().removeClass('on').attr('aria-pressed', false);
        $('.issue_card img').removeClass('on').filter('[data-card="' + card + '"]').addClass('on');
    });

});
