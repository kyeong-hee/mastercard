<?php
    // GNB 활성화: 현재 경로가 해당 메뉴 경로로 시작하면 'on'
    $hdUri = $_SERVER['REQUEST_URI'] ?? '/';
    $hdOn = function ($path) use ($hdUri) {
        return ($path !== '' && strpos($hdUri, $path) === 0) ? ' on' : '';
    };

    // 메뉴 정의 (상품 혜택 / 시즈널 혜택 경로는 페이지 생성 후 연결)
    $gnbMenu = [
        [
            'name' => '상품 혜택', 'path' => '', 'href' => '#none',
            'sub'  => [
                ['name' => '카드 플레이트', 'href' => '#none'],
                ['name' => '혜택 자세히 보기', 'href' => '#none'],
            ],
        ],
        [
            'name' => '월드 엘리트 혜택', 'path' => '/worldelite/', 'href' => '/worldelite/',
            'sub'  => [
                ['name' => '마스터카드 큐레이션', 'href' => '/worldelite/#curation'],
                ['name' => '혜택 자세히 보기', 'href' => '/worldelite/#benefits'],
            ],
        ],
        [
            'name' => '시즈널 혜택', 'path' => '', 'href' => '#none',
            'sub'  => [
                ['name' => '프리미엄 파인다이닝', 'href' => '#none'],
                ['name' => 'JB 골프클럽', 'href' => '#none'],
            ],
        ],
    ];
    $applyUrl = '#none'; // 카드 신청하기 URL (확정 후 교체)
?>
<header class="header" id="header">
    <div class="wrap hd_inner" max="1440">
        <h1 class="hd_logo">
            <a href="/">
                <picture>
                    <source media="(max-width: 1024px)" srcset="/img/common/shinhan_logo_w.png">
                    <img src="/img/common/logo_shinhancard.svg" alt="Shinhan Card">
                </picture>
            </a>
        </h1>

        <nav class="gnb" aria-label="주메뉴">
            <ul class="gnb_list">
                <?php foreach ($gnbMenu as $m) { ?>
                <li class="gnb_item<?php echo $hdOn($m['path']); ?>">
                    <a href="<?php echo $m['href']; ?>" class="gnb_link"><?php echo $m['name']; ?></a>
                    <ul class="gnb_sub">
                        <?php foreach ($m['sub'] as $s) { ?>
                        <li><a href="<?php echo $s['href']; ?>"><?php echo $s['name']; ?></a></li>
                        <?php } ?>
                    </ul>
                </li>
                <?php } ?>
            </ul>
        </nav>

        <div class="hd_util">
            <div class="hd_inquiry">
                <button type="button" class="btn_line btn_inquiry" aria-expanded="false" aria-controls="hdInquiry">이용 문의</button>
                <div class="inquiry_layer" id="hdInquiry">
                    <div class="contact">
                        <p class="ct_tit">신한카드 고객 상담센터 | The ACE Elite 카드 문의</p>
                        <a href="tel:1566-8357" class="ct_num">1566-8357</a>
                    </div>
                    <div class="contact">
                        <p class="ct_tit">Mastercard 월드엘리트 컨시어지</p>
                        <a href="tel:080-908-0960" class="ct_num">080-908-0960 (국내)</a>
                        <p class="ct_desc"><a href="tel:+1-312-340-2494">+1-312-340-2494</a> (해외) · 24시간 연중무휴</p>
                    </div>
                </div>
            </div>
            <a href="<?php echo $applyUrl; ?>" class="btn_line">카드 신청하기</a>
        </div>

        <button type="button" class="hamWrap" aria-label="전체메뉴 열기" aria-controls="moMenu">
            <span></span><span></span><span></span>
        </button>
    </div>

    <!-- 모바일 전체메뉴 (1024px 이하) -->
    <div class="mo_menu" id="moMenu">
        <div class="mo_menu_inner">
            <ul class="mo_gnb">
                <?php foreach ($gnbMenu as $m) { ?>
                <li class="<?php echo trim($hdOn($m['path'])); ?>">
                    <a href="<?php echo $m['href']; ?>" class="mo_gnb_link"><?php echo $m['name']; ?></a>
                    <ul class="mo_gnb_sub">
                        <?php foreach ($m['sub'] as $s) { ?>
                        <li><a href="<?php echo $s['href']; ?>"><?php echo $s['name']; ?></a></li>
                        <?php } ?>
                    </ul>
                </li>
                <?php } ?>
            </ul>
            <div class="mo_menu_contact">
                <p class="mo_menu_tit">이용 문의</p>
                <a href="tel:1566-8357">신한카드 고객 상담센터 <b>1566-8357</b></a>
                <a href="tel:080-908-0960">Mastercard 월드엘리트 컨시어지 <b>080-908-0960</b></a>
            </div>
            <a href="<?php echo $applyUrl; ?>" class="mo_menu_apply">카드 신청하기 <i class="xi-angle-right-min"></i></a>
        </div>
    </div>
</header>

<!-- 우측 퀵메뉴 (smooth-wrapper 밖에 위치해야 fixed 정상 동작) -->
<div class="quick" id="quickMenu">
    <div class="qm_panel">
        <a href="<?php echo $applyUrl; ?>" class="qm_item">
            <img src="/img/common/ico_qm_card.svg" alt="">
            <span>발급하기</span>
        </a>
        <button type="button" class="qm_item qm_info" aria-expanded="false" aria-controls="qmPop">
            <img src="/img/common/ico_qm_info.svg" alt="">
            <span>이용정보</span>
        </button>
        <button type="button" class="qm_item qm_top">
            <img src="/img/common/ico_qm_top.svg" alt="">
            <span>TOP</span>
        </button>

        <div class="qm_pop" id="qmPop">
            <p class="pop_head">이용 문의</p>
            <div class="contact">
                <p class="ct_tit">신한카드 고객 상담센터 | The ACE Elite 카드 문의</p>
                <a href="tel:1566-8357" class="ct_num">1566-8357</a>
            </div>
            <div class="contact">
                <p class="ct_tit">Mastercard 월드엘리트 컨시어지</p>
                <a href="tel:080-908-0960" class="ct_num">080-908-0960 (국내)</a>
                <p class="ct_desc"><a href="tel:+1-312-340-2494">+1-312-340-2494</a> (해외) · 24시간 연중무휴</p>
            </div>
        </div>
    </div>
    <!-- 모바일 전용 열기/닫기 (+ / X) -->
    <button type="button" class="qm_toggle" aria-expanded="false" aria-label="퀵메뉴 열기">
        <img src="/img/common/ico_qm_close.svg" alt="">
    </button>
</div>

<!-- 공통 레이아웃 스크립트 (헤더 스크롤 숨김 등) -->
<script src="/js/layout.js"></script>
