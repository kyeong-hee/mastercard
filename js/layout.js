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

$(window).on('load', function(){ // 페이지 로드 시 헤더노출 초기설정
    headerUp();
});
