<?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/layout/_head.php"; // 공통 head
    include_once $_SERVER["DOCUMENT_ROOT"]."/comp/header.php"; // 공통 헤더 관리
?>

<!-- 월드엘리트 혜택 전용 CSS (메인 main.css와 분리) -->
<link rel="stylesheet" href="/css/worldelite.css">

<div id="smooth-wrapper">
    <div id="smooth-content">
        <main class="sub worldelite">

            <!-- 비주얼 -->
            <section class="we_visual" id="visual">
                <div class="visual_bg" aria-hidden="true"></div>
                <div class="wrap visual_inner" max="1440">
                    <div class="visual_txt">
                        <p class="visual_label">Mastercard World Elite</p>
                        <h2 class="visual_tit">
                            <span class="ln">World Elite</span>
                            <span class="ln grad">Benefits</span>
                        </h2>
                        <p class="visual_desc">마스터카드(Mastercard)의 최상위 프리미엄 카드 등급 중 하나로, <br class="max-500"><span class="nowrap">고소득·VVIP</span> <br class="min-501">고객의 라이프스타일과 취향에 맞춘 고급 프리미엄 서비스와 차별화된 국내외 혜택을 제공합니다.</p>
                    </div>

                    <ul class="visual_nav">
                        <li>
                            <a href="#curation">
                                <span class="num">01</span>
                                <span class="txt">
                                    <span class="eng">The Mastercard Curation</span>
                                    <span class="kor">다이닝 · 엔터테인먼트 · 호텔 · 아울렛</span>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#benefits">
                                <span class="num">02</span>
                                <span class="txt">
                                    <span class="eng">Benefits</span>
                                    <span class="kor">라이프 · 호텔 · 여행 · 공항 · 쇼핑 · 골프</span>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#guide">
                                <span class="num">03</span>
                                <span class="txt">
                                    <span class="eng">Service Guide</span>
                                    <span class="kor">공통 · 선택 서비스 안내</span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="visual_scroll" aria-hidden="true">
                    <span>SCROLL</span>
                    <i class="mouse"></i>
                </div>
            </section>

            <!--
                [순차 퍼블 예정]
                #curation  : The Mastercard Collection / Curation (다이닝 · 엔터테인먼트 · 호텔 · 아울렛)
                #benefits  : World Elite Benefits
                #guide     : 서비스 안내
            -->

            <!-- CTA / 페이지 이동 -->
            <section class="we_cta">
                <div class="cta_bg" aria-hidden="true"></div>
                <div class="wrap cta_inner" max="1440">
                    <div class="cta_txt">
                        <h2 class="cta_tit">Live Beyond Ordinary.<br>The ACE Elite<span class="semi">와 함께하는 <span class="br">프리미엄 라이프</span></span></h2>
                        <p class="cta_desc">카드를 신청하시기 전에 상품안내장 및 약관을 읽어보시기 바랍니다.<br>여신금융협회 심의필 제 2026-000-0000호 (2026.00.00)</p>
                        <a href="#none" class="btn_apply">카드 신청하기 <i class="xi-angle-right-min" aria-hidden="true"></i></a>
                    </div>

                    <nav class="page_nav" aria-label="이전/다음 페이지">
                        <a href="#none" class="prev">
                            <i class="xi-angle-left-min" aria-hidden="true"></i>
                            <span class="txt"><span class="lb">PREV</span><span class="tit">시즈널 혜택</span></span>
                        </a>
                        <a href="#none" class="next">
                            <span class="txt"><span class="lb">NEXT</span><span class="tit">상품 혜택</span></span>
                            <i class="xi-angle-right-min" aria-hidden="true"></i>
                        </a>
                    </nav>
                </div>
            </section>

        </main>

        <?php
            include_once $_SERVER["DOCUMENT_ROOT"]."/comp/footer.php"; // 공통 푸터 관리
        ?>
    </div>
</div>

<script src="/js/share.js"></script>

<?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/layout/_end.php";
?>
