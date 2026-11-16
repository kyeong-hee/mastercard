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

            <!-- 02. 큐레이션 (PC: pin + 이미지 확장 + 스크롤 1회당 슬라이드 전환 / MO: 세로 나열 + 탭 고정) -->
            <section class="we_curation we_sec" id="curation">
                <div class="wrap sec_head cur_intro" max="1440">
                    <p class="sec_label">The Mastercard Collection</p>
                    <h2 class="sec_tit">The Mastercard Curation</h2>
                    <p class="sec_desc">국내 마스터카드 최상위 등급인 World Elite 고객을 위해 엄선한 미식, <br class="min-501">문화예술, 호텔 혜택으로 한층 더 특별한 라이프스타일을 경험해 보세요.</p>
                </div>

                <div class="cur_pin">
                    <div class="cur_frame">

                        <!-- 탭 (PC: 하단 진행바 / MO: 상단 고정 + 스크롤 스파이) -->
                        <div class="cur_tabs_pin"><!-- MO: 고정(pin) 대상 래퍼 -->
                        <div class="cur_tabs">
                            <div class="wrap tabs_inner" max="1440" role="tablist" aria-label="큐레이션 카테고리">
                                <span class="tabs_bar" aria-hidden="true"><i></i></span>
                                <button type="button" class="tab on" role="tab" aria-selected="true">Dining</button>
                                <button type="button" class="tab" role="tab" aria-selected="false">Entertainment</button>
                                <button type="button" class="tab" role="tab" aria-selected="false">Hotel</button>
                                <button type="button" class="tab" role="tab" aria-selected="false">Premium Outlet</button>
                            </div>
                        </div>
                        </div>

                        <div class="cur_slides">
                            <!-- 01 Dining -->
                            <article class="cur_slide s_dining on" id="curDining">
                                <div class="cur_bg" aria-hidden="true"><img src="/img/worldelite/cur_dining.jpg" alt=""><i class="dim"></i></div>
                                <div class="cur_cont">
                                    <div class="wrap cur_inner" max="1440">
                                        <div class="cur_txt">
                                            <p class="cur_label">미쉐린, 블루리본, 아시아 50 베스트가 주목</p>
                                            <h3 class="cur_tit">미식의 무대에 특별한 <br>조건으로 초대합니다.</h3>
                                            <p class="cur_desc">전 세계 15개국 650여 개 레스토랑에서 $350 이상 이용 시 $100 할인</p>
                                            <div class="cur_btns">
                                                <a href="#none" class="btn_cur" target="_blank" rel="noopener" title="새창열림">다이닝 컬렉션 바로가기 <i class="xi-angle-right-min" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                        <div class="cur_box">
                                            <div class="box_item">
                                                <div class="box_info">
                                                    <p class="price">$100</p>
                                                    <p class="price_txt"><b>650개</b> 레스토랑에서 <strong>$350</strong> 이상 주문 시</p>
                                                </div>
                                                <div class="box_how">
                                                    <p class="how_tit">[이용방법]</p>
                                                    <ul class="how_list">
                                                        <li>https://specials.priceless.com/diningcollection</li>
                                                        <li>국가/도시 및 레스토랑 선택하여 예약</li>
                                                        <li>결제 시 대상카드 제시 <br>(카드번호 입력을 통한 대상카드여부 확인 필수)</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>

                            <!-- 02 Entertainment -->
                            <article class="cur_slide s_ent" id="curEnt">
                                <div class="cur_bg" aria-hidden="true"><img src="/img/worldelite/cur_ent.jpg" alt=""><i class="dim"></i></div>
                                <div class="cur_cont">
                                    <div class="wrap cur_inner" max="1440">
                                        <div class="cur_txt">
                                            <h3 class="cur_tit">최고의 공연과 스포츠 이벤트를 <br>누리는 특별한 기회</h3>
                                            <p class="cur_desc">전 세계 인기 공연과 주요 스포츠 이벤트를 선예매부터 우대 좌석, 티켓 할인, <br class="min-501">회원 지정 좌석까지, 특별한 엔터테인먼트 경험을 누려보세요.</p>
                                            <div class="cur_btns">
                                                <a href="#none" class="btn_cur" target="_blank" rel="noopener" title="새창열림">엔터테인먼트 컬렉션 바로가기 <i class="xi-angle-right-min" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                        <div class="cur_box">
                                            <div class="box_item">
                                                <div class="box_info">
                                                    <p class="box_tit">특별하게 즐기는 <br>프리미엄 티켓 혜택</p>
                                                    <ul class="ticket_grid">
                                                        <li><span>01</span>선예매</li>
                                                        <li><span>02</span>우대 좌석</li>
                                                        <li><span>03</span>티켓 할인</li>
                                                        <li><span>04</span>회원 지정 좌석</li>
                                                    </ul>
                                                </div>
                                                <div class="box_how">
                                                    <p class="how_tit">[이용방법]</p>
                                                    <ul class="how_list">
                                                        <li>priceless.com에서 공연 확인</li>
                                                        <li>티켓 판매처로 연결</li>
                                                        <li>Mastercard로 결제</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>

                            <!-- 03 Hotel -->
                            <article class="cur_slide s_hotel" id="curHotel">
                                <div class="cur_bg" aria-hidden="true"><img src="/img/worldelite/cur_hotel.jpg" alt=""><i class="dim"></i></div>
                                <div class="cur_cont">
                                    <div class="wrap cur_inner" max="1440">
                                        <div class="cur_txt">
                                            <h3 class="cur_tit">머무는 모든 순간을 <br>더 특별하게 만드는 호텔 혜택</h3>
                                            <p class="cur_desc">전 세계 참여 호텔의 1박 무료 혜택부터 글로벌 호텔 멤버십 등급 매칭까지, <br class="min-501">World Elite 회원만을 위한 호텔 혜택을 누려보세요.</p>
                                            <div class="cur_btns">
                                                <a href="#none" class="btn_cur" target="_blank" rel="noopener" title="새창열림">참여 호텔 자세히 보기 <i class="xi-angle-right-min" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                        <div class="cur_box">
                                            <div class="box_item">
                                                <div class="box_info">
                                                    <p class="box_tit">One Night Free</p>
                                                    <p class="box_copy">참여 호텔에 연속으로 묵으면 1박 무료</p>
                                                    <p class="box_sub">전 세계 호텔과 리조트에서 정해진 박수를 머무르면 1박을 무료로 제공</p>
                                                </div>
                                                <div class="box_how">
                                                    <p class="how_tit">[이용방법]</p>
                                                    <ul class="how_list">
                                                        <li>Priceless Specials에서 참여 호텔 및 숙박 조건 확인 후 <br>전용 링크를 통해 예약</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="box_item">
                                                <div class="box_info">
                                                    <p class="box_tit">Membership Matching</p>
                                                    <p class="box_copy">메리어트·하얏트·IHG 등 전세계 호텔 멤버십 혜택</p>
                                                    <p class="box_sub">객실 업그레이드 · 조식 · 호텔 크레딧 등 특별 제공</p>
                                                </div>
                                                <div class="box_how">
                                                    <p class="how_tit">[이용방법]</p>
                                                    <ul class="how_list">
                                                        <li>Priceless Specials에서 원하는 호텔 혜택을 선택하고, <br>프로그램별 이용 조건 및 예약</li>
                                                    </ul>
                                                </div>
                                                <button type="button" class="btn_mem" aria-haspopup="dialog" aria-controls="memPop">멤버십 혜택 확인하기 <i class="xi-angle-right-min" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>

                            <!-- 04 Premium Outlet -->
                            <article class="cur_slide s_outlet" id="curOutlet">
                                <div class="cur_bg" aria-hidden="true"><img src="/img/worldelite/cur_outlet.jpg" alt=""><i class="dim"></i></div>
                                <div class="cur_cont">
                                    <div class="wrap cur_inner" max="1440">
                                        <div class="cur_txt">
                                            <h3 class="cur_tit">여행의 품격을 완성하는 <br>유럽 럭셔리 쇼핑</h3>
                                            <p class="cur_desc">런던 근교의 비스터 빌리지를 비롯한 The Bicester Collection, 유럽 각지의 McArthurGlen 디자이너 아울렛. <br class="min-501">세계적인 하이엔드 브랜드를 여유롭게 둘러보는 쇼핑이 여정의 또 다른 즐거움이 됩니다.</p>
                                            <div class="cur_btns">
                                                <a href="#none" class="btn_cur" target="_blank" rel="noopener" title="새창열림">The Bicester Collection <i class="xi-angle-right-min" aria-hidden="true"></i></a>
                                                <a href="#none" class="btn_cur" target="_blank" rel="noopener" title="새창열림">McArthurGlen <i class="xi-angle-right-min" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>

                    </div>
                </div>
            </section>

            <!--
                [순차 퍼블 예정]
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

<!-- 멤버십 등급 매칭 팝업 (smooth-wrapper 밖에 위치해야 fixed 정상 동작) -->
<div class="mem_pop" id="memPop" role="dialog" aria-modal="true" aria-labelledby="memPopTit" hidden>
    <div class="pop_sheet">
        <div class="wrap pop_inner" max="1440">
            <div class="sec_head">
                <p class="sec_label">Global Hotel Membership</p>
                <h2 class="sec_tit" id="memPopTit">World Elite <br class="max-500">멤버십 등급 매칭</h2>
                <p class="sec_desc">메리어트, 하얏트, 포시즌스부터 일본의 전통 료칸까지, <br class="max-500">세계 최고급 호텔에서 World Elite만의 등급 대우를 누리세요.<span class="min-501">조식과 객실 업그레이드, 얼리 체크인과 레이트 체크아웃, 호텔 다이닝과 스파 크레딧까지 체류의 모든 순간이 한층 여유로워집니다.</span></p>
            </div>

            <div class="hm_table">
                <div class="hm_cols" aria-hidden="true">
                    <span class="c0">프로그램</span>
                    <span class="c1">World Elite 부여 등급</span>
                    <span class="c2">주요 혜택</span>
                    <span class="c3">프로모션 기한</span>
                </div>
                <ul class="hm_list">
                    <li class="hm_row">
                        <p class="c0">GHA DISCOVERY</p>
                        <p class="c1"><span class="grade">Titanium</span></p>
                        <p class="c2">회원 요금 10% 이상 할인, 투숙 금액 일부를 DISCOVERY Dollars(D$)로 적립, 다이닝·스파 할인, 투숙하지 않아도 호텔 시설 이용. 아난타라, 카펠라, 켐핀스키 등 1,000곳 이상 참여</p>
                        <p class="c3"><span class="lb">프로모션 기한</span><span class="date">2026.12.31</span></p>
                        <div class="c4"><a href="#none" class="btn_site" target="_blank" rel="noopener" title="새창열림">사이트 이동 <i class="xi-angle-right-min" aria-hidden="true"></i></a></div>
                    </li>
                    <li class="hm_row">
                        <p class="c0">Little Emperors</p>
                        <p class="c1"><span class="grade">Dynasty <b>1년 무료</b></span><span class="sub">£1,500 상당</span></p>
                        <p class="c2">럭셔리 호텔 5,000여 곳 최저가 보장, 조식·호텔 크레딧·객실 업그레이드 확정. 가족·지인에게 멤버십을 선물하고 대신 예약 가능</p>
                        <p class="c3"><span class="lb">프로모션 기한</span><span class="date">2026.12.31</span><span class="sub">선착순 1만 명</span></p>
                        <div class="c4"><a href="#none" class="btn_site" target="_blank" rel="noopener" title="새창열림">사이트 이동 <i class="xi-angle-right-min" aria-hidden="true"></i></a></div>
                    </li>
                    <li class="hm_row">
                        <p class="c0">Brilliant by Langham</p>
                        <p class="c1"><span class="grade">Ruby <b>12개월</b></span><span class="sub">최상위 등급</span></p>
                        <p class="c2">얼리 체크인·레이트 체크아웃, 회원 요금, 레스토랑·바 100여 곳 할인, 객실 업그레이드 바우처, 웰컴 어메니티</p>
                        <p class="c3"><span class="lb">프로모션 기한</span><span class="date">2027.12.31</span></p>
                        <div class="c4"><a href="#none" class="btn_site" target="_blank" rel="noopener" title="새창열림">사이트 이동 <i class="xi-angle-right-min" aria-hidden="true"></i></a></div>
                    </li>
                    <li class="hm_row">
                        <p class="c0">MyMillennium</p>
                        <p class="c1"><span class="grade">Prestige <b>12개월</b></span><span class="sub">최상위 등급</span></p>
                        <p class="c2">포인트 2배 적립, 객실 업그레이드, 클럽 라운지 이용, 다이닝 25% 할인, 웰컴 어메니티, 얼리 체크인·레이트 체크아웃</p>
                        <p class="c3"><span class="lb">프로모션 기한</span><span class="date">2026.12.31</span></p>
                        <div class="c4"><a href="#none" class="btn_site" target="_blank" rel="noopener" title="새창열림">사이트 이동 <i class="xi-angle-right-min" aria-hidden="true"></i></a></div>
                    </li>
                    <li class="hm_row">
                        <p class="c0">Wyndham Rewards</p>
                        <p class="c1"><span class="grade">Diamond</span></p>
                        <p class="c2">일부 호텔 스위트 업그레이드, 웰컴 어메니티, 포인트 20% 추가 적립</p>
                        <p class="c3"><span class="lb">프로모션 기한</span><span class="date">2026.12.31</span></p>
                        <div class="c4"><a href="#none" class="btn_site" target="_blank" rel="noopener" title="새창열림">사이트 이동 <i class="xi-angle-right-min" aria-hidden="true"></i></a></div>
                    </li>
                </ul>
            </div>

            <p class="pop_note">※ 혜택별 상세 내용은 Priceless Specials 공식 페이지로 연결됩니다. <br class="max-500">(체인별로 링크 상이)</p>

            <button type="button" class="pop_close" aria-label="멤버십 등급 매칭 팝업 닫기"><img src="/img/common/ico_pop_close.svg" alt=""></button>
        </div>
    </div>
</div>

<script src="/js/share.js"></script>
<script src="/js/worldelite.js"></script>

<?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/layout/_end.php";
?>
