<?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/layout/_head.php"; // 공통 head
    include_once $_SERVER["DOCUMENT_ROOT"]."/comp/header.php"; // 공통 헤더 관리
?>

<!-- 메인 시안 폰트 (Noto Sans KR · Inter · 42dot Sans · IBM Plex Sans KR) -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=42dot+Sans:wght@400;500;600&family=IBM+Plex+Sans+KR:wght@400;500&family=Inter:wght@400&family=Noto+Sans+KR:wght@400;500;700&display=swap">
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
                    <!-- [모션] PC 빛 하이라이트 라인 드로잉 (참고 HTML lineDraw / lineGlow) - 1920x1080 이미지 좌표 기준 -->
                    <svg class="light_line pc_only" viewBox="0 0 1920 1080" preserveAspectRatio="none" focusable="false">
                        <defs>
                            <linearGradient id="lightLineGrad" x1="0" y1="0" x2="0" y2="1">
                                <stop offset="0" stop-color="#fff" stop-opacity=".2"/>
                                <stop offset=".5" stop-color="#fff"/>
                                <stop offset="1" stop-color="#b9c4ff" stop-opacity=".3"/>
                            </linearGradient>
                            <filter id="lightLineGlow" x="-50%" y="-10%" width="200%" height="120%">
                                <feGaussianBlur stdDeviation="4" result="b"/>
                                <feMerge><feMergeNode in="b"/><feMergeNode in="SourceGraphic"/></feMerge>
                            </filter>
                        </defs>
                        <path d="M1378 62 L1074 1012" stroke="url(#lightLineGrad)" filter="url(#lightLineGlow)" pathLength="100"/>
                    </svg>
                </div>
                <div class="lineup_light light2" aria-hidden="true">
                    <picture>
                        <source media="(max-width: 1024px)" srcset="/img/main/lineup_light2_mo.jpg">
                        <img src="/img/main/lineup_light2.jpg" alt="">
                    </picture>
                </div>
                <div class="lineup_light light3 pc_only" aria-hidden="true">
                    <img src="/img/main/lineup_light2.jpg" alt="">
                </div>

                <!-- 02. 혜택 라인업 -->
                <section class="m_lineup">
                    <div class="wrap lineup_inner" max="1600">
                        <div class="lineup_card mo_only">
                            <img src="/img/main/lineup_card1_mo.png" alt="The ACE Elite 카드 플레이트">
                            <img src="/img/main/lineup_card2_mo.png" alt="The ACE Elite 카드 플레이트">
                        </div>

                        <!-- PC : 타이틀·설명 고정 / 이미지만 스크롤 -->
                        <div class="lineup_fix">
                            <div class="lineup_fix_in">
                                <h2 class="lineup_tit">당신의 기준을 높이는,<br><b>하나의 카드</b></h2>
                                <p class="lineup_desc lineup_desc_l pc_only">비교할 수 없는 가치로 당신의 일상에 깊이를 더하는<br>신한 The ACE Elite만의 <b>독점적 혜택 라인업</b></p>
                            </div>
                        </div>

                        <!-- PC 카드 플레이트 (마이신한 포인트형 / 스카이패스형) + 설명 -->
                        <div class="lineup_card_pc pc_only">
                            <img src="/img/main/lineup_card01.png" alt="The ACE Elite 카드 플레이트 - 마이신한 포인트형">
                            <img src="/img/main/lineup_card02.png" alt="The ACE Elite 카드 플레이트 - 스카이패스형">
                        </div>
                        <p class="lineup_desc lineup_desc_r">비교할 수 없는 가치로 당신의 일상에 깊이를 더하는<br><span class="ko">신한 The ACE Elite만의 </span><b>독점적 혜택 라인업</b></p>

                        <ul class="lineup_list">
                            <li class="item item1">
                                <div class="img">
                                    <picture>
                                        <source media="(max-width: 1024px)" srcset="/img/main/lineup_gift_mo.jpg">
                                        <img src="/img/main/lineup_benefit01.jpg" alt="리본으로 포장된 선물 상자">
                                    </picture>
                                </div>
                                <div class="txt">
                                    <p class="tit">일상과 여행을 아우르는 프리미엄 혜택</p>
                                    <p class="desc"><span class="pc_only">최대 90만원의 기프트, 골프, 공항 라운지 등<br>프리미엄 라이프스타일에 딱 맞는 혜택</span><span class="mo_only">연간 기프트, 리워드, 골프 및 여행 혜택까지</span></p>
                                </div>
                            </li>
                            <li class="item item2">
                                <div class="img">
                                    <picture>
                                        <source media="(max-width: 1024px)" srcset="/img/main/lineup_desert_mo.jpg">
                                        <img src="/img/main/lineup_benefit02.jpg" alt="여행지 풍경">
                                    </picture>
                                </div>
                                <div class="txt">
                                    <p class="tit">Mastercard World Elite 특전</p>
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
                    <!-- MO 배경 빛 : 시안 03 'bg · light (PC 동일)' - PC 빛 이미지 1.3배 -->
                    <div class="lineup_light light_benefit mo_only" aria-hidden="true">
                        <img src="/img/main/lineup_light2.jpg" alt="">
                    </div>
                    <div class="wrap" max="1600">
                        <h2 class="sec_tit">The ACE Elite <b>상품 혜택</b></h2>

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
                                            <p>국내 일시불/할부 이용금액 1.3% 적립<br>해외 일시불 이용금액 2.5% 적립 </p>
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
                                    <li>헬스케어, 쇼핑/문화, 골프, 택시 영역 <br class="mo_only"> 5% 결제일 할인</li>
                                </ul>
                            </li>
                            <li class="box">
                                <p class="tit">Sweet Celebration 서비스</p>
                                <ul class="dot_list">
                                    <li>국내 제휴 특급호텔 베이커리 홀케이크 5만원 할인</li>
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
                                    <li>THE LOUNGE 전세계 공항라운지 무료 이용 (월 4회/연 20회)</li>
                                </ul>
                            </li>
                        </ul>

                        <p class="benefit_note">※ 전월 이용금액 기준/신한카드 The ACE Elite 서비스 적용 기준으로 <br class="mo_only">제공됩니다.</p>

                        <div class="btn_wrap">
                            <a href="#none" class="btn_more btn_fx">상품 혜택 확인하기 <i class="xi-angle-right-min" aria-hidden="true"></i></a>
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
                                        <img src="/img/main/we_dining.jpg" alt="파인다이닝 레스토랑 홀">
                                    </picture>
                                </div>
                                <div class="slide_txt">
                                    <p class="tit">다이닝 특전</p>
                                    <p class="desc">국내외 파인다이닝 레스토랑 할인 및 예약,<br class="mo_only"> 호텔 미식 혜택 제공</p>
                                    <div class="btns">
                                        <a href="#none" class="btn_line btn_fx">자세히 보기 <img src="/img/main/ico_chevron.svg" alt=""></a>
                                    </div>
                                </div>
                            </div>
                            <!-- 02~04 이미지 : 다이닝 이미지 기준(784×784) 크롭본 적용 / MO도 1:1 영역이라 동일 이미지 사용 -->
                            <div class="swiper-slide">
                                <div class="slide_img">
                                    <picture>
                                        <img src="/img/main/we_ent.jpg" alt="조명이 켜진 대형 공연장 무대와 관객석">
                                    </picture>
                                </div>
                                <div class="slide_txt">
                                    <p class="tit">프리미엄 엔터테인먼트 혜택</p>
                                    <p class="desc">최고의 공연, 스포츠 경기를 가장 빠르게,<br class="mo_only"> 누구보다 먼저</p>
                                    <div class="btns">
                                        <a href="#none" class="btn_line btn_fx">자세히 보기 <img src="/img/main/ico_chevron.svg" alt=""></a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="slide_img">
                                    <picture>
                                        <img src="/img/main/we_hotel.jpg" alt="야자수와 꽃 화단이 어우러진 리조트 호텔 정원">
                                    </picture>
                                </div>
                                <div class="slide_txt">
                                    <p class="tit">더 특별한 여정을 완성하는<br> 글로벌 호텔 혜택</p>
                                    <p class="desc">무료 숙박부터 글로벌 호텔 멤버십까지, <br/> World Elite 회원만의 프리미엄 혜택</p>
                                    <div class="btns">
                                        <a href="#none" class="btn_line btn_fx">자세히 보기 <img src="/img/main/ico_chevron.svg" alt=""></a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="slide_img">
                                    <picture>
                                        <img src="/img/main/we_outlet.jpg" alt="분수대가 있는 유럽풍 프리미엄 아울렛 거리">
                                    </picture>
                                </div>
                                <div class="slide_txt">
                                    <p class="tit">프리미엄 아울렛 혜택</p>
                                    <p class="desc">비스터 컬렉션·맥아더글렌 아울렛에서<br/> 누리는 World Elite 전용 할인 혜택 </p>
                                    <div class="btns">
                                        <a href="#none" class="btn_line btn_fx">자세히 보기 <img src="/img/main/ico_chevron.svg" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 이미지 하단 4분할 라인 (PC : 이미지 하단 / MO : 이미지 안쪽 하단) -->
                        <div class="we_bar">
                            <button type="button" class="on" aria-label="01 다이닝 보기"></button>
                            <button type="button" aria-label="02 엔터테인먼트 보기"></button>
                            <button type="button" aria-label="03 호텔 보기"></button>
                            <button type="button" aria-label="04 아울렛 보기"></button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 05. 시즈널 혜택 -->
            <section class="m_season" id="seasonal">
                <div class="wrap" max="1600">
                    <div class="season_top">
                        <h2 class="sec_tit">시즈널 혜택</h2>
                        <a href="#none" class="btn_more btn_fx pc_only">시즈널 혜택 확인하기 <i class="xi-angle-right-min" aria-hidden="true"></i></a>
                    </div>

                    <!-- 국내 다이닝 -->
                    <div class="season_head">
                        <p class="tit"><span class="mark">·•</span> 국내 다이닝 혜택</p>
                        <p class="desc dining"><span class="dim">신한ACE 프리미엄 고객을 위한 파인다이닝 레스토랑<span class="pc_only">&nbsp; | &nbsp;</span></span><br class="mo_only">프리미엄 다이닝 2인이상 코스 주문시 1인 무료</p>
                    </div>

                    <div class="dining_area">
                        <div class="swiper dining_swiper">
                            <ul class="swiper-wrapper">
                                <li class="swiper-slide">
                                    <div class="img"><picture><source media="(max-width: 1024px)" srcset="/img/main/dining04_mo.jpg"><img src="/img/main/dining04.jpg" alt="" draggable="false"></picture></div>
                                    <p class="name">알라프리마</p>
                                </li>
                                <li class="swiper-slide">
                                    <div class="img"><picture><source media="(max-width: 1024px)" srcset="/img/main/dining03_mo.jpg"><img src="/img/main/dining03.jpg" alt="" draggable="false"></picture></div>
                                    <p class="name">기가스</p>
                                </li>
                                <li class="swiper-slide">
                                    <div class="img"><picture><source media="(max-width: 1024px)" srcset="/img/main/dining05_mo.jpg"><img src="/img/main/dining05.jpg" alt="" draggable="false"></picture></div>
                                    <p class="name">라마띠에</p>
                                </li>
                                <li class="swiper-slide">
                                    <div class="img"><picture><source media="(max-width: 1024px)" srcset="/img/main/dining02_mo.jpg"><img src="/img/main/dining02.jpg" alt="" draggable="false"></picture></div>
                                    <p class="name">윌로뜨</p>
                                </li>
                                <li class="swiper-slide">
                                    <div class="img"><picture><source media="(max-width: 1024px)" srcset="/img/main/dining01_mo.jpg"><img src="/img/main/dining01.jpg" alt="" draggable="false"></picture></div>
                                    <p class="name">차이나룸 몬드리안호텔</p>
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
                        <span class="drag_cursor" aria-hidden="true"><span class="in">Drag</span></span>
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
                                <p class="tit">60타석 구매 시 30타석 추가 증정</p>
                                <div class="desc"><div><p class="strong">미사용분 잔여 타석 이월 가능</p></div></div>
                            </div>
                        </li>
                        <li class="golf3" tabindex="0">
                            <div class="img"><picture><source media="(max-width: 1024px)" srcset="/img/main/golf03_mo.jpg"><img src="/img/main/golf03.jpg" alt=""></picture></div>
                            <div class="txt">
                                <p class="tit">랩퍼터 피팅 시뮬레이션 제공</p>
                                <div class="desc"><div><p class="strong">전문가의 랩 퍼터 제공</p></div></div>
                            </div>
                        </li>
                    </ul>

                    <div class="btn_wrap mo_only">
                        <a href="#none" class="btn_more btn_fx">시즈널 혜택 확인하기 <i class="xi-angle-right-min" aria-hidden="true"></i></a>
                    </div>
                </div>
            </section>

            <!-- 06. 발급 -->
            <section class="m_issue" id="issue">
                <div class="issue_bg" aria-hidden="true"></div>
                <div class="wrap issue_inner" max="1600">
                    <h2 class="issue_tit">
                        <span class="pc_only">Live Beyond Ordinary.<br>The ACE Elite로 완성하는 특별한 일상</span>
                        <span class="mo_only">THE ACE Elite만의<br><b>특별한 혜택</b>과<br>프라이빗 라이프스타일을<br>소유할 시간.</span>
                    </h2>

                    <div class="issue_card">
                        <img src="/img/main/card_myshinhan.png" alt="The ACE Elite 메탈 플레이트 - 마이신한 포인트형" class="on" data-card="myshinhan">
                        <img src="/img/main/card_skypass.png" alt="The ACE Elite 메탈 플레이트 - 스카이패스형" data-card="skypass">
                        <span class="card_shine" aria-hidden="true"></span><!-- [모션] PC 마우스 오버 시 테두리 은색 빛 / 표면 반사광 -->
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
