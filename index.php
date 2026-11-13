<?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/layout/_head.php"; // 공통 head
    include_once $_SERVER["DOCUMENT_ROOT"]."/comp/header.php"; // 공통 헤더 관리
?>

<!-- 메인 시안 폰트 (Noto Sans KR · Afacad · 42dot Sans · IBM Plex Sans KR) -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=42dot+Sans:wght@400;500;600&family=Afacad:wght@400;500;600&family=IBM+Plex+Sans+KR:wght@400;500&family=Noto+Sans+KR:wght@400;500;700&display=swap">
<link rel="stylesheet" href="/css/main.css">

<div id="smooth-wrapper">
    <div id="smooth-content">
        <main class="main">

            <!-- 01. 비주얼 (영상 영역 : 영상 수급 전 시안 이미지로 노출) -->
            <section class="m_vis" id="visual">
                <div class="vis_media" aria-hidden="true">
                    <!--
                        [영상 교체] 영상 수급 시 아래 img 를 video 로 교체
                        <video src="/img/main/vis.mp4" poster="/img/main/vis_bg.jpg" autoplay muted loop playsinline></video>
                    -->
                    <img src="/img/main/vis_bg.jpg" alt="">
                </div>
                <div class="vis_shade mo_only" aria-hidden="true"></div>
                <h2 class="vis_tit">
                    <span class="ln pc_only">경험이 깊어질수록,</span>
                    <span class="ln">선택은 분명해진다</span>
                </h2>
            </section>

            <!-- 02~03. 혜택 라인업 + 프리미엄 혜택 (배경 공유) -->
            <div class="m_lineup_wrap">
                <div class="lineup_light light1" aria-hidden="true">
                    <picture>
                        <source media="(max-width: 1024px)" srcset="/img/main/lineup_light1_mo.jpg">
                        <img src="/img/main/lineup_light1.jpg" alt="">
                    </picture>
                </div>
                <div class="lineup_light light2" aria-hidden="true">
                    <picture>
                        <source media="(max-width: 1024px)" srcset="/img/main/lineup_light2_mo.jpg">
                        <img src="/img/main/lineup_light2.jpg" alt="">
                    </picture>
                </div>

                <!-- 02. 혜택 라인업 -->
                <section class="m_lineup">
                    <div class="wrap lineup_inner" max="1600">
                        <div class="lineup_card mo_only">
                            <img src="/img/main/lineup_card1_mo.png" alt="The ACE Elite 카드 플레이트">
                            <img src="/img/main/lineup_card2_mo.png" alt="The ACE Elite 카드 플레이트">
                        </div>

                        <h2 class="lineup_tit">당신의 기준을 높이는,<br><b>하나의 카드</b></h2>
                        <p class="lineup_desc">비교할 수 없는 가치로 당신의 일상에 깊이를 더하는<br><span class="ko">신한 The ACE Elite만의 </span><b>독점적 혜택 라인업</b></p>

                        <ul class="lineup_list">
                            <li class="item item1">
                                <div class="img">
                                    <picture>
                                        <source media="(max-width: 1024px)" srcset="/img/main/lineup_gift_mo.jpg">
                                        <img src="/img/main/lineup_benefit01.jpg" alt="리본으로 포장된 선물 상자">
                                    </picture>
                                </div>
                                <div class="txt">
                                    <p class="tit"><span class="pc_only">일상과 여행을 폭넓게 누리는 카드 혜택</span><span class="mo_only">일상과 여행을 아우르는 프리미엄 혜택</span></p>
                                    <p class="desc"><span class="pc_only">최대 90만원의 기프트, 골프, 공항 라운지 등 프리미엄 라이프스타일에 딱 맞는 혜택</span><span class="mo_only">연간 기프트, 리워드, 골프 및 여행 혜택까지</span></p>
                                </div>
                            </li>
                            <li class="item item2">
                                <div class="img">
                                    <picture>
                                        <source media="(max-width: 1024px)" srcset="/img/main/lineup_plane_mo.jpg">
                                        <img src="/img/main/lineup_benefit02.jpg" alt="여행지 풍경">
                                    </picture>
                                </div>
                                <div class="txt">
                                    <p class="tit"><span class="pc_only"><span class="en">Mastercard World Elite </span>특전</span><span class="mo_only">Mastercard World Elite 특전</span></p>
                                    <p class="desc"><span class="pc_only">세계 곳곳에서 누리는 프리미엄 라이프스타일<br>글로벌 다이닝, 공연, 호텔 혜택 및 숙박 우대 혜택</span><span class="mo_only">World Elite 고객만 누리는 여행, 호텔, 다이닝,<br>쇼핑영역 글로벌 혜택</span></p>
                                </div>
                            </li>
                            <li class="item item3">
                                <div class="img">
                                    <picture>
                                        <source media="(max-width: 1024px)" srcset="/img/main/lineup_golf_mo.jpg">
                                        <img src="/img/main/lineup_benefit03.jpg" alt="그린 위 골프공과 퍼터">
                                    </picture>
                                </div>
                                <div class="txt">
                                    <p class="tit"><span class="pc_only">최고급 파인다이닝 &amp; 하이엔드 골프 경험</span><span class="mo_only">시즌마다 새롭게 만나는 파인다이닝과<br>하이엔드 골프 경험</span></p>
                                    <p class="desc pc_only">프리미엄 다이닝 1인무료와 JB 골프 클럽 혜택까지</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </section>

                <!-- 03. 프리미엄 혜택 -->
                <section class="m_benefit" id="benefit">
                    <div class="wrap" max="1600">
                        <h2 class="sec_tit">
                            <span class="pc_only"><span class="ko">The ACE Elite </span>가 준비한 프리미엄 혜택</span>
                            <span class="mo_only">The ACE Elite <b>상품 혜택</b></span>
                        </h2>

                        <ul class="benefit_list">
                            <li class="box">
                                <p class="tit">Annual Gift 서비스 (연 1회 / 택 1)</p>
                                <ul class="dot_list">
                                    <li>해외 럭셔리 호텔 90만원 이용권</li>
                                    <li>국내 특급 호텔 뷔페 30만원 이용권 3매</li>
                                    <li class="lh14">대한항공 마일리지 3만 마일 + 마이신한포인트 15만 포인트</li>
                                    <li>제휴 골프장 80만원 이용권</li>
                                </ul>
                            </li>
                            <li class="box">
                                <p class="tit">리워드 서비스</p>
                                <ul class="dot_list">
                                    <li>
                                        마이신한 포인트형
                                        <div class="sub">
                                            <p>국내 일시불/할부 이용금액 1.3% 적립<br>해외 일시불 이용금액 2.5% 적립</p>
                                        </div>
                                    </li>
                                    <li>
                                        스카이패스형
                                        <div class="sub lh14">
                                            <p>국내 일시불/할부 및 해외 일시불 이용금액 1,500원 당<br>대한항공 마일리지 1마일 적립</p>
                                            <p>해외 일시불 이용금액 1,500원 당 대한항공 마일리지 <br class="mo_only">1마일 추가 적립</p>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="box">
                                <p class="tit">VIP Life Style 결제일 할인 서비스</p>
                                <ul class="dot_list">
                                    <li>헬스케어, 쇼핑/문화, 골프, 택시 영역 5% 결제일 할인</li>
                                </ul>
                            </li>
                            <li class="box">
                                <p class="tit">Sweet Celebration 서비스</p>
                                <ul class="dot_list">
                                    <li>국내 제휴 특급호텔 베이커리 Cake 5만원 현장 할인</li>
                                </ul>
                            </li>
                            <li class="box">
                                <p class="tit">Golf 서비스</p>
                                <ul class="dot_list">
                                    <li>제휴 골프장 주중 우대 혜택 제공</li>
                                    <li>골프 홀인원 축하금 300만원 제공</li>
                                </ul>
                            </li>
                            <li class="box">
                                <p class="tit">공항라운지 서비스</p>
                                <ul class="dot_list">
                                    <li>THE LOUNGE (공항라운지) 서비스 무료 이용</li>
                                </ul>
                            </li>
                        </ul>

                        <p class="benefit_note">※ 전월 이용금액 기준/신한카드 The ACE Elite 서비스 적용 기준으로 <br class="mo_only">제공됩니다.</p>

                        <div class="btn_wrap mo_only">
                            <a href="#none" class="btn_more">상품 혜택 확인하기 <i class="xi-angle-right-min" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </section>
            </div>

            <!-- 04. World Elite 등급 혜택 (큐레이션 롤링 : 01 다이닝 → 02 엔터테인먼트 → 03 호텔 → 04 아울렛) -->
            <section class="m_we" id="worldelite">
                <div class="wrap we_inner" max="1600">
                    <div class="we_fix">
                        <p class="tit">World elite 등급 혜택</p>
                        <p class="desc">마스터카드(Mastercard)의 최상위 프리미엄 카드 등급 중 하나로, <br class="pc_only">고소득·VVIP 고객의 라이프스타일과 취향에 맞춘 고급 프리미엄 서비스와 <br class="pc_only">차별화된 국내외 혜택을 제공합니다</p>
                    </div>

                    <div class="swiper we_swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="slide_img">
                                    <picture>
                                        <source media="(max-width: 1024px)" srcset="/img/main/we_dining_mo.jpg">
                                        <img src="/img/main/we_dining.jpg" alt="파인다이닝 레스토랑 홀">
                                    </picture>
                                </div>
                                <div class="slide_txt">
                                    <p class="count mo_only">01 / 04</p>
                                    <p class="tit">다이닝 특전</p>
                                    <p class="desc"><span class="pc_only">국경없이 즐기는 혜택</span><span class="mo_only">국내외 파인다이닝 레스토랑 할인 및 예약,<br>호텔 미식 혜택 제공</span></p>
                                    <div class="btns">
                                        <a href="#none" class="btn_line pc_only">자세히 보기 <i class="xi-plus-circle" aria-hidden="true"></i></a>
                                        <a href="#none" class="btn_pill on mo_only">공통서비스</a>
                                        <a href="#none" class="btn_pill mo_only">선택서비스</a>
                                    </div>
                                </div>
                            </div>
                            <!-- [자료 수급 필요] 02~04 이미지·설명 문구 메인시안 미제공 → 구조만 구성, 이미지는 임시(다이닝) -->
                            <div class="swiper-slide">
                                <div class="slide_img">
                                    <picture>
                                        <source media="(max-width: 1024px)" srcset="/img/main/we_dining_mo.jpg">
                                        <img src="/img/main/we_dining.jpg" alt="">
                                    </picture>
                                </div>
                                <div class="slide_txt">
                                    <p class="count mo_only">02 / 04</p>
                                    <p class="tit">엔터테인먼트 특전</p>
                                    <p class="desc"></p>
                                    <div class="btns">
                                        <a href="#none" class="btn_line pc_only">자세히 보기 <i class="xi-plus-circle" aria-hidden="true"></i></a>
                                        <a href="#none" class="btn_pill on mo_only">공통서비스</a>
                                        <a href="#none" class="btn_pill mo_only">선택서비스</a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="slide_img">
                                    <picture>
                                        <source media="(max-width: 1024px)" srcset="/img/main/we_dining_mo.jpg">
                                        <img src="/img/main/we_dining.jpg" alt="">
                                    </picture>
                                </div>
                                <div class="slide_txt">
                                    <p class="count mo_only">03 / 04</p>
                                    <p class="tit">호텔 특전</p>
                                    <p class="desc"></p>
                                    <div class="btns">
                                        <a href="#none" class="btn_line pc_only">자세히 보기 <i class="xi-plus-circle" aria-hidden="true"></i></a>
                                        <a href="#none" class="btn_pill on mo_only">공통서비스</a>
                                        <a href="#none" class="btn_pill mo_only">선택서비스</a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="slide_img">
                                    <picture>
                                        <source media="(max-width: 1024px)" srcset="/img/main/we_dining_mo.jpg">
                                        <img src="/img/main/we_dining.jpg" alt="">
                                    </picture>
                                </div>
                                <div class="slide_txt">
                                    <p class="count mo_only">04 / 04</p>
                                    <p class="tit">아울렛 특전</p>
                                    <p class="desc"></p>
                                    <div class="btns">
                                        <a href="#none" class="btn_line pc_only">자세히 보기 <i class="xi-plus-circle" aria-hidden="true"></i></a>
                                        <a href="#none" class="btn_pill on mo_only">공통서비스</a>
                                        <a href="#none" class="btn_pill mo_only">선택서비스</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- PC 카운트 / 하단 4분할 라인 -->
                    <p class="we_count pc_only" aria-hidden="true"><span>01</span> / <span>02</span> / <span>03</span> / <span>04</span></p>
                    <div class="we_bar pc_only">
                        <button type="button" class="on" aria-label="01 다이닝 보기"></button>
                        <button type="button" aria-label="02 엔터테인먼트 보기"></button>
                        <button type="button" aria-label="03 호텔 보기"></button>
                        <button type="button" aria-label="04 아울렛 보기"></button>
                    </div>
                </div>
            </section>

            <!-- 05. 시즈널 혜택 -->
            <section class="m_season" id="seasonal">
                <div class="wrap" max="1600">
                    <h2 class="sec_tit">시즈널 혜택</h2>

                    <!-- 국내 다이닝 -->
                    <div class="season_head">
                        <p class="tit"><span class="mark">·•</span> 국내 다이닝 혜택</p>
                        <p class="desc dining"><span class="pc_only">신한카드가 선정한 파인다이닝 대상 | 2인 코스 주문시 1인 무료</span><span class="mo_only"><span class="dim">신한ACE 프리미엄 고객을 위한 파인다이닝 레스토랑</span><br>프리미엄 다이닝 1+1 제공 (런치 및 석식)</span></p>
                    </div>

                    <div class="dining_area">
                        <div class="swiper dining_swiper">
                            <ul class="swiper-wrapper">
                                <li class="swiper-slide">
                                    <div class="img"><picture><source media="(max-width: 1024px)" srcset="/img/main/dining01_mo.jpg"><img src="/img/main/dining01.jpg" alt="" draggable="false"></picture></div>
                                    <p class="name">차이나룸 몬드리안호텔</p>
                                </li>
                                <li class="swiper-slide">
                                    <div class="img"><picture><source media="(max-width: 1024px)" srcset="/img/main/dining02_mo.jpg"><img src="/img/main/dining02.jpg" alt="" draggable="false"></picture></div>
                                    <p class="name">윌로뜨</p>
                                </li>
                                <li class="swiper-slide">
                                    <div class="img"><picture><source media="(max-width: 1024px)" srcset="/img/main/dining03_mo.jpg"><img src="/img/main/dining03.jpg" alt="" draggable="false"></picture></div>
                                    <p class="name">기가스</p>
                                </li>
                                <li class="swiper-slide">
                                    <div class="img"><picture><source media="(max-width: 1024px)" srcset="/img/main/dining04_mo.jpg"><img src="/img/main/dining04.jpg" alt="" draggable="false"></picture></div>
                                    <p class="name">알라프리마</p>
                                </li>
                                <li class="swiper-slide">
                                    <div class="img"><picture><source media="(max-width: 1024px)" srcset="/img/main/dining05_mo.jpg"><img src="/img/main/dining05.jpg" alt="" draggable="false"></picture></div>
                                    <p class="name">라마띠에</p>
                                </li>
                                <li class="swiper-slide">
                                    <div class="img"><img src="/img/main/dining06.jpg" alt="" draggable="false"></div>
                                    <p class="name">볼트스테이크하우스</p>
                                </li>
                                <li class="swiper-slide">
                                    <div class="img"><img src="/img/main/dining07.jpg" alt="" draggable="false"></div>
                                    <p class="name">팔레트</p>
                                </li>
                                <li class="swiper-slide">
                                    <div class="img"><img src="/img/main/dining08.jpg" alt="" draggable="false"></div>
                                    <p class="name">소공간다이닝</p>
                                </li>
                            </ul>
                        </div>
                        <span class="drag_cursor" aria-hidden="true"><img src="/img/main/drag.png" alt=""></span>
                    </div>

                    <hr class="season_line">

                    <!-- 골프 -->
                    <div class="season_head">
                        <p class="tit"><span class="mark">·•</span> 골프 혜택</p>
                        <p class="desc">JB 골프와 함께하는 프리미엄 골프 경험</p>
                    </div>

                    <ul class="golf_list">
                        <li class="golf1" tabindex="0">
                            <div class="img"><picture><source media="(max-width: 1024px)" srcset="/img/main/golf01_mo.jpg"><img src="/img/main/golf01.jpg" alt=""></picture></div>
                            <div class="txt">
                                <p class="tit">원포인트 레슨 이용권</p>
                                <div class="desc"><div><p class="strong">프라이빗 룸에서 즐기는 원포인트 레슨</p><p class="dim">(30분 원포인트 레슨 + 30분 연습 이용권)</p></div></div>
                            </div>
                        </li>
                        <li class="golf2" tabindex="0">
                            <div class="img"><picture><source media="(max-width: 1024px)" srcset="/img/main/golf02_mo.jpg"><img src="/img/main/golf02.jpg" alt=""></picture></div>
                            <div class="txt">
                                <p class="tit"><span class="pc_only">연습 타석 추가 증정</span><span class="mo_only">60타석 구매 시 30타석 추가 증정</span></p>
                                <div class="desc"><div><p class="strong pc_only">60타석 구매 시 30타석 추가 증정</p><p class="dim">미사용분 잔여 타석 이월 가능</p></div></div>
                            </div>
                        </li>
                        <li class="golf3" tabindex="0">
                            <div class="img"><picture><source media="(max-width: 1024px)" srcset="/img/main/golf03_mo.jpg"><img src="/img/main/golf03.jpg" alt=""></picture></div>
                            <div class="txt">
                                <p class="tit"><span class="pc_only">랩퍼터 피팅 시뮬레이션</span><span class="mo_only">랩퍼터 피팅 시 시뮬레이션 제공</span></p>
                                <div class="desc"><div><p class="strong"><span class="pc_only">전문가의 랩 퍼터 피팅</span><span class="mo_only">전문가의 랩 퍼터 제공</span></p></div></div>
                            </div>
                        </li>
                    </ul>

                    <div class="btn_wrap mo_only">
                        <a href="#none" class="btn_more">시즈널 혜택 확인하기 <i class="xi-angle-right-min" aria-hidden="true"></i></a>
                    </div>
                </div>
            </section>

            <!-- 06. 발급 -->
            <section class="m_issue" id="issue">
                <div class="issue_bg" aria-hidden="true"></div>
                <div class="wrap issue_inner" max="1600">
                    <h2 class="issue_tit">
                        <span class="pc_only">THE ACE Elite만의 <b>특별한 혜택</b>과<br>프라이빗 라이프스타일을 소유할 시간.</span>
                        <span class="mo_only">THE ACE Elite만의<br><b>특별한 혜택</b>과<br>프라이빗 라이프스타일을<br>소유할 시간.</span>
                    </h2>

                    <div class="issue_card">
                        <img src="/img/main/card_myshinhan.png" alt="The ACE Elite 메탈 플레이트 - 마이신한 포인트형" class="on" data-card="myshinhan">
                        <img src="/img/main/card_skypass.png" alt="The ACE Elite 메탈 플레이트 - 스카이패스형" data-card="skypass">
                    </div>

                    <div class="issue_toggle" role="group" aria-label="카드 플레이트 선택">
                        <button type="button" class="on" data-card="myshinhan" aria-pressed="true">마이신한 포인트</button>
                        <button type="button" data-card="skypass" aria-pressed="false">스카이패스</button>
                    </div>

                    <a href="<?php echo $applyUrl; ?>" class="issue_apply"><span><span class="s">The Ace Elite</span><br>신청하기</span></a>

                    <div class="issue_info">
                        <ul>
                            <li>최초 발급 시 1회 무료로 제공됩니다. 이후 추가 발급, 재발급 <br class="mo_only">신청 및 갱신 시 발급 수수료 12만원이 별도 부과됩니다.
                                <p class="sub"><span class="mo_only">- </span>메탈카드로 변경 발급하는 경우에도 메탈카드 최초 발급 건에 <br class="mo_only">대해서는 발급수수료가 부과되지 않습니다.</p>
                            </li>
                            <li>메탈 플레이트의 경우 해외겸용(Mastercard) 브랜드의 후불 <br class="mo_only">교통 기능이 있는 카드로만 신청 가능합니다.</li>
                            <li>메탈 소재 특성 상 발급 시간이 소요될 수 있으며, 일부 ATM <br class="mo_only">기기에서 이용이 불가하오니 서비스 이용 전 신한카드 고객센터(1544-7000)에 문의하시기 바랍니다.</li>
                            <li>메탈 플레이트 신청 후 단순 변심으로 인한 취소가 불가하며, <br class="mo_only">카드 제작이 진행 중인 경우에는 발급 수수료가 청구되므로 <br class="mo_only">신청 전 참고바랍니다.</li>
                        </ul>
                    </div>
                </div>
            </section>

        </main>

        <?php
            include_once $_SERVER["DOCUMENT_ROOT"]."/comp/footer.php"; // 공통 푸터 관리
        ?>
    </div>
</div>

<script src="/js/share.js"></script>
<script src="/js/main.js"></script>

<?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/layout/_end.php";
?>
