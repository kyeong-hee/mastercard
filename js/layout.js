/* =========================================================
	공통 레이아웃 스크립트 (header / footer)
	- comp/header.php 하단에서 로드 (모든 페이지 공통)
========================================================= */

// 헤더: 아래로 스크롤 시 위로 숨김, 위로 스크롤 시 다시 노출
// - PC(1025px 이상)에서만 동작. 모바일(1024px 이하)은 항상 고정 노출
//   (iOS 사파리 주소창 수축·바운스 스크롤과 충돌하는 문제로 비활성화)
function headerUp(){
    var $header = $('.header');
    var $html = $('html');
    var mqMo = window.matchMedia('(max-width:1024px)');
    var lastScroll = $(window).scrollTop();
    var gap = 5; // 미세한 스크롤(관성·떨림)은 무시

    function showHeader(){
        $header.removeClass('hide');
        $html.removeClass('hd_hide');
    }

    $(window).on('scroll', function(){
        var ws = $(this).scrollTop();

        if(mqMo.matches){ // 모바일: 숨김 기능 없음
            showHeader();
            lastScroll = ws;
            return;
        }

        if(Math.abs(ws - lastScroll) <= gap) return;

        // 상단 근처 / 전체메뉴·이용문의 열림 상태에서는 항상 노출
        var keep = ws <= $header.outerHeight()
            || $header.hasClass('ham')
            || $header.find('.hd_inquiry').hasClass('open');

        if(!keep && ws > lastScroll){ // 스크롤 아래방향시 숨김
            $header.addClass('hide');
            $html.addClass('hd_hide');
        }else if(ws < lastScroll || keep){ // 스크롤 위방향시 노출
            showHeader();
        }
        lastScroll = ws;
    });

    // PC → 모바일로 화면이 바뀌면 숨김 상태 해제
    var onMqChange = function(e){ if(e.matches) showHeader(); };
    if(mqMo.addEventListener) mqMo.addEventListener('change', onMqChange);
    else if(mqMo.addListener) mqMo.addListener(onMqChange); // 구형 사파리
}

// [공통 모션] 버튼 호버 원형 퍼짐 채움 (.btn_fx · css/layout.css)
//  - class="btn_fx" 가 있는 버튼에만 동작 (위임 방식이라 나중에 추가된 버튼도 적용)
//  - 커서가 들어온/나간 지점을 원의 중심으로, 지름은 그 지점에서 버튼 끝까지 덮는 크기(대각선 x 2)
//  - 키보드 포커스 : 가운데에서 퍼짐
function btnFx(){
    $(document).on('mouseenter mouseleave', '.btn_fx', function(e){
        var r = this.getBoundingClientRect();
        this.style.setProperty('--fx-x', (e.clientX - r.left) + 'px');
        this.style.setProperty('--fx-y', (e.clientY - r.top) + 'px');
        this.style.setProperty('--fx-d', (Math.hypot(r.width, r.height) * 2) + 'px');
    }).on('focusin', '.btn_fx', function(){
        if(this.matches(':hover')) return;
        var r = this.getBoundingClientRect();
        this.style.setProperty('--fx-x', '50%');
        this.style.setProperty('--fx-y', '50%');
        this.style.setProperty('--fx-d', (Math.hypot(r.width, r.height) * 1.1) + 'px');
    });
}
btnFx();

$(window).on('load', function(){ // 페이지 로드 시 헤더노출 초기설정
    headerUp();
});
