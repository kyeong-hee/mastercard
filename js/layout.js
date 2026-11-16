/* =========================================================
	공통 레이아웃 스크립트 (header / footer)
	- comp/header.php 하단에서 로드 (모든 페이지 공통)
========================================================= */

// 헤더: 아래로 스크롤 시 위로 숨김, 위로 스크롤 시 다시 노출
function headerUp(){
    var $header = $('.header');
    var lastScroll = $(window).scrollTop();
    var gap = 5; // 미세한 스크롤(관성·떨림)은 무시

    $(window).on('scroll', function(){
        var ws = $(this).scrollTop();
        if(Math.abs(ws - lastScroll) <= gap) return;

        // 상단 근처 / 전체메뉴·이용문의 열림 상태에서는 항상 노출
        var keep = ws <= $header.outerHeight()
            || $header.hasClass('ham')
            || $header.find('.hd_inquiry').hasClass('open');

        if(!keep && ws > lastScroll){ // 스크롤 아래방향시 숨김
            $header.addClass('hide');
            $('html').addClass('hd_hide');
        }else if(ws < lastScroll || keep){ // 스크롤 위방향시 노출
            $header.removeClass('hide');
            $('html').removeClass('hd_hide');
        }
        lastScroll = ws;
    });
}

// [모션] 버튼 호버 원형 퍼짐 채움 (.btn_fx · css/layout.css)
//  - 커서가 들어온/나간 지점을 원의 중심으로, 원 지름은 그 지점에서 버튼 끝까지 덮는 크기(대각선 x 2)
function btnFx(){
    function setFx(e){
        var r = this.getBoundingClientRect();
        this.style.setProperty('--fx-x', (e.clientX - r.left) + 'px');
        this.style.setProperty('--fx-y', (e.clientY - r.top) + 'px');
        this.style.setProperty('--fx-d', (Math.hypot(r.width, r.height) * 2) + 'px');
    }
    $(document).on('mouseenter mouseleave', '.btn_fx', function(e){ setFx.call(this, e); });
    // 키보드 포커스 : 가운데에서 퍼짐
    $(document).on('focusin', '.btn_fx', function(){
        var r = this.getBoundingClientRect();
        if(this.matches(':hover')) return;
        this.style.setProperty('--fx-x', '50%');
        this.style.setProperty('--fx-y', '50%');
        this.style.setProperty('--fx-d', (Math.hypot(r.width, r.height) * 1.1) + 'px');
    });
}
btnFx();

$(window).on('load', function(){ // 페이지 로드 시 헤더노출 초기설정
    headerUp();
});
