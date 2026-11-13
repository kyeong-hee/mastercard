// gsap plugin
gsap.registerPlugin(CustomEase, CustomWiggle, ScrollTrigger, ScrollSmoother, ScrollToPlugin, DrawSVGPlugin, SplitText, Observer, MotionPathPlugin, TextPlugin);

// 모바일 감지
function mob(){
    if(	navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i) || navigator.maxTouchPoints == 5){
        return true;
    }else{
        return false;
    }
}

// smoother (pc 821px 이상, 풀페이지 아닐 때만)
let smoother;
if(mob()){
    $('html').addClass('mo');
}else{
    $('html').addClass('pc');
    if(window.innerWidth >= 821 && $('#fullpage').length == 0) {
        smoother = ScrollSmoother.create({
            smooth: 1.4,
            effects: true,
        });
    }
}

// 모바일 검색바로 인한 리프래시 방지(모바일에서만 작동)
ScrollTrigger.config({
    ignoreMobileResize: true,
});

// 검색바 고정시키기(카카오 인앱은 안됨, 고정시키면 푸터 잘림 사용X)
// ScrollTrigger.normalizeScroll(true);

// 카카오,사파리웹 감지
const UA = navigator.userAgent;
function webConfirm() {
    if (/KAKAOTALK/i.test(UA)) {
        $("html").addClass("kakaoWeb");
        return;
    }
    if (/Safari/i.test(UA) && /Version/i.test(UA) &&! /Chrome|CriOS|FxiOS|Edg/i.test(UA)) {
        $("html").addClass("safariWeb");
        return;
    }
}
webConfirm();

// vh 설정
function vh() {
    if(!mob()) return; // pc에서는 그냥 vh 사용하면됨
    let vh = window.innerHeight * 0.01;
    $("html").css("--vh", `${vh}px`);
}
vh();


// 페이드인 효과 공통
let fadeSet = {opacity:0,y:60,duration:1};
let triggerSet = {
    start:'top 90%',
    toggleActions:'play none none reverse',
}

$(window).on('load',function(){
    // 한개만 있을때
    if($('[fadeup]').length > 0){
        $('[fadeup]').each(function(i,e){
            gsap.from(e,{...fadeSet,
                scrollTrigger:{
                    trigger:e,
                    ...triggerSet,
                }
            })
        })
    }

    // 여러개일때
    // 1. delay="0.2" 이런식으로 딜레이 인라인으로 넣기
    // 2. 트리거 기준이될 태그에 trigger 속성 넣기
    if($('[delay]').length > 0){
        $('[delay]').each(function(i,e){
            gsap.timeline({
                scrollTrigger:{
                    trigger:$(e).closest('[trigger]'),
                    ...triggerSet,
                }
            })
            .from(e,{...fadeSet,},$(e).attr('delay'))
        })
    }
})

// 전역으로 사용할 윈도우 너비,높이
let ww = window.innerWidth;
let wh = window.innerHeight;

// 리사즈 0.2초후 다시 셋팅
let resizeClear = null;

if(!mob()){
    $(window).on('resize',function(){
        clearTimeout(resizeClear);
        resizeClear = setTimeout(function(){
            ww = window.innerWidth;
            wh = window.innerHeight;
        },200)
    })
}


// 햄버거 메뉴
$('.header .hamWrap').on('click',function(){
    $('.header').toggleClass('ham');
    const isOpen = $('.header').hasClass('ham');
    $(this).attr('aria-label', isOpen ? '전체메뉴 닫기' : '전체메뉴 열기');
    $('html').css('overflow', isOpen ? 'hidden' : '');
});
// 1024 초과로 리사이즈 시 모바일 메뉴 닫기
$(window).on('resize',function(){
    if(window.innerWidth > 1024 && $('.header').hasClass('ham')){
        $('.header').removeClass('ham');
        $('html').css('overflow','');
    }
});


// 맨 위로 / 앵커 이동 (ScrollSmoother 사용 여부 대응)
function scrollToTarget(target){
    const offset = $('.header').outerHeight() || 0;
    if(smoother){
        smoother.scrollTo(target === 0 ? 0 : target, true, target === 0 ? undefined : `top ${offset}px`);
    }else{
        const top = target === 0 ? 0 : $(target).offset().top - offset;
        $('html, body').stop().animate({scrollTop: top}, 600);
    }
}

// 같은 페이지 내 앵커(#id) 링크 부드럽게 이동
$(document).on('click','a[href*="#"]:not([href="#none"])',function(e){
    const url = new URL(this.href, location.href);
    if(url.pathname !== location.pathname || !url.hash) return;
    const $target = $(url.hash);
    if(!$target.length) return;
    e.preventDefault();
    $('.header').removeClass('ham');
    $('html').css('overflow','');
    scrollToTarget($target[0]);
});
$(document).on('click','a[href="#none"]',function(e){ e.preventDefault(); });


// 헤더: 스크롤 시 흰 배경
function headerScroll(){
    $('.header').toggleClass('scroll', $(window).scrollTop() > 10);
}
headerScroll();
$(window).on('scroll', headerScroll);


// 마우스 사용 환경(PC)인지: 오버로 플로팅 열기 / 터치는 클릭으로 열기
const canHover = window.matchMedia('(hover: hover) and (pointer: fine)');

// 오버 플로팅 공통
// $area 에 마우스가 올라가면 open, 벗어나면 close (버튼↔레이어 사이 빈틈 이동 대비 150ms 지연)
function hoverFloat($area, open, close, enable){
    let timer = null;
    $area.on('mouseenter', function(){
        if(!canHover.matches || (enable && !enable())) return;
        clearTimeout(timer);
        open();
    }).on('mouseleave', function(){
        if(!canHover.matches || (enable && !enable())) return;
        clearTimeout(timer);
        timer = setTimeout(close, 150);
    });
}


// 헤더: 이용 문의 플로팅
const $inquiry = $('.header .hd_inquiry');
function openInquiry(){
    $inquiry.addClass('open').find('.btn_inquiry').attr('aria-expanded', true);
}
function closeInquiry(){
    $inquiry.removeClass('open').find('.btn_inquiry').attr('aria-expanded', false);
}
hoverFloat($inquiry, openInquiry, closeInquiry);
// 클릭(터치·키보드): 토글 / 마우스 환경에서는 이미 오버로 열려 있으므로 닫지 않음
$inquiry.find('.btn_inquiry').on('click',function(e){
    e.stopPropagation();
    if(canHover.matches || !$inquiry.hasClass('open')) openInquiry();
    else closeInquiry();
});
// 키보드 포커스가 영역을 벗어나면 닫기
$inquiry.on('focusout',function(e){
    if(!$inquiry[0].contains(e.relatedTarget)) closeInquiry();
});


// 퀵메뉴
const $quick = $('#quickMenu');
// 모바일 + / X
$quick.find('.qm_toggle').on('click',function(e){
    e.stopPropagation();
    $quick.toggleClass('open');
    const isOpen = $quick.hasClass('open');
    $(this).attr({'aria-expanded': isOpen, 'aria-label': isOpen ? '퀵메뉴 닫기' : '퀵메뉴 열기'});
    if(!isOpen) closeQuickPop();
});
// 이용정보 플로팅
function openQuickPop(){
    $quick.addClass('pop_open');
    $quick.find('.qm_info').attr('aria-expanded', true);
}
function closeQuickPop(){
    $quick.removeClass('pop_open');
    $quick.find('.qm_info').attr('aria-expanded', false);
}
// PC(821 이상): 이용정보 버튼 + 플로팅 영역 오버 시 열림
hoverFloat($quick.find('.qm_info, .qm_pop'), openQuickPop, closeQuickPop, () => window.innerWidth > 820);
// 클릭(모바일·키보드): 토글
$quick.find('.qm_info').on('click',function(e){
    e.stopPropagation();
    if(canHover.matches && window.innerWidth > 820) openQuickPop();
    else $quick.hasClass('pop_open') ? closeQuickPop() : openQuickPop();
});
$quick.find('.qm_info, .qm_pop').on('focusout',function(e){
    if(!$(e.relatedTarget).closest('.qm_info, .qm_pop').length) closeQuickPop();
});
// TOP
$quick.find('.qm_top').on('click',function(){ scrollToTarget(0); });
$('.footer .ft_top_btn').on('click',function(){ scrollToTarget(0); });


// 푸터: 관련사이트 / 신한금융그룹 셀렉트
$('.footer .select_btn').on('click',function(e){
    e.stopPropagation();
    const $sel = $(this).closest('.select');
    $('.footer .select').not($sel).removeClass('open').find('.select_btn').attr('aria-expanded', false);
    $sel.toggleClass('open');
    $(this).attr('aria-expanded', $sel.hasClass('open'));
});


// 레이어 바깥 클릭 / ESC 시 닫기
$(document).on('click',function(e){
    if(!$(e.target).closest('.hd_inquiry').length){
        $('.hd_inquiry').removeClass('open').find('.btn_inquiry').attr('aria-expanded', false);
    }
    if(!$(e.target).closest('.qm_pop').length) closeQuickPop();
    if(!$(e.target).closest('.footer .select').length){
        $('.footer .select').removeClass('open').find('.select_btn').attr('aria-expanded', false);
    }
});
$(document).on('keydown',function(e){
    if(e.key !== 'Escape') return;
    $('.hd_inquiry').removeClass('open').find('.btn_inquiry').attr('aria-expanded', false);
    closeQuickPop();
    $('.footer .select').removeClass('open').find('.select_btn').attr('aria-expanded', false);
});





// resize refresh
/*
    윈도우 리사이즈 시 이전 크기 저장 후 비교하여
    크기가 변경되면 실행 시키고 싶을 때 사용
*/

// let saveWidth = window.innerWidth;
// let resizeTimeout;


// $(window).resize(function() {
//     clearTimeout(resizeTimeout);
//     if(window.innerWidth != saveWidth) {

//         resizeTimeout = setTimeout(() => {
//             location.reload();
//             saveWidth = window.innerWidth;
//             ScrollTrigger.refresh();
//         }, 50);

// 아래는 특정 사이즈 이상 or 이하로 변경될 때 실행 시키고 싶을 때 사용
//         // if(window.innerWidth <= 820 && saveWidth > 820) {
//         //     resizeTimeout = setTimeout(() => {
//         //         location.reload();
//         //         saveWidth = window.innerWidth;
//         //         ScrollTrigger.refresh();
//         //     }, 50);
//         // } else if(window.innerWidth > 820 && saveWidth <= 820) {
//         //     resizeTimeout = setTimeout(() => {
//         //         location.reload();
//         //         saveWidth = window.innerWidth;
//         //         ScrollTrigger.refresh();
//         //     }, 50);
//         // } else {
//         //     resizeTimeout = setTimeout(() => {
//         //         ScrollTrigger.refresh();
//         //         saveWidth = window.innerWidth;
//         //     }, 100);
//         // }
//     }
// });
