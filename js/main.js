// =========================================================
// MAIN (/index.php)
// =========================================================

$(function(){

    // ---------------------------------------------------------
    // 04. World Elite 큐레이션 롤링
    //     01 다이닝 → 02 엔터테인먼트 → 03 호텔 → 04 아울렛
    //     이미지와 텍스트가 함께 롤링 (시안 설명 반영)
    // ---------------------------------------------------------
    const $we = $('.m_we');
    const $weCount = $we.find('.we_count span');
    const $weBar = $we.find('.we_bar button');

    const weSwiper = new Swiper('.we_swiper', {
        effect: 'fade',
        fadeEffect: { crossFade: true },
        loop: true,
        speed: 800,
        autoplay: { delay: 4000, disableOnInteraction: false },
        on: {
            slideChange: function(){
                const idx = this.realIndex;
                $weCount.removeClass('on').eq(idx).addClass('on');
                $weBar.removeClass('on').eq(idx).addClass('on');
            },
        },
    });
    $weCount.eq(0).addClass('on');
    $weBar.on('click', function(){
        weSwiper.slideToLoop($(this).index());
    });


    // ---------------------------------------------------------
    // 05. 시즈널 혜택 - 국내 다이닝 드래그 리스트
    // ---------------------------------------------------------
    new Swiper('.dining_swiper', {
        slidesPerView: 'auto',
        spaceBetween: 12,
        breakpoints: {
            1025: { spaceBetween: 20 },
        },
    });

    // DRAG 커서 (PC 마우스 환경)
    const $diningArea = $('.dining_area');
    const $dragCursor = $diningArea.find('.drag_cursor');
    if(window.matchMedia('(hover: hover) and (pointer: fine)').matches){
        const moveX = gsap.quickTo($dragCursor[0], 'x', { duration: .35, ease: 'power3' });
        const moveY = gsap.quickTo($dragCursor[0], 'y', { duration: .35, ease: 'power3' });
        $diningArea.find('.dining_swiper').on('mouseenter', function(e){
            const r = $diningArea[0].getBoundingClientRect();
            gsap.set($dragCursor[0], { x: e.clientX - r.left, y: e.clientY - r.top });
            $diningArea.addClass('drag_on');
        }).on('mousemove', function(e){
            const r = $diningArea[0].getBoundingClientRect();
            moveX(e.clientX - r.left);
            moveY(e.clientY - r.top);
        }).on('mouseleave', function(){
            $diningArea.removeClass('drag_on');
        });
    }


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
