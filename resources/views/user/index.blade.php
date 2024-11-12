@extends('user.layout')

@section('main')
    <main id="main" class="">
        <div id="content" role="main" class="content-area">
            <section class="section" id="section_1715500297">
                <div class="bg section-bg fill bg-fill bg-loaded bg-loaded"></div>
                <div class="ux-shape-divider ux-shape-divider--top ux-shape-divider--style-triangle-invert">
                    <svg viewBox="0 0 1000 100" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                        <path class="ux-shape-fill" d="M500 95.6L0 0V100H1000V0L500 95.6Z"></path>
                    </svg>
                </div>
                <div class="section-content relative">
                    <div class="row" id="row-1106265959">
                        <div id="col-1243466738" class="col small-12 large-12">
                            <div class="col-inner">
                                <div id="text-3451515497" class="text title">
                                    <h2><strong>SẢN PHẨM</strong> BÁN CHẠY</h2>
                                    <style>
                                        #text-3451515497 {
                                            text-align: center;
                                        }

                                        @media (min-width:550px) {
                                            #text-3451515497 {
                                                text-align: center;
                                            }
                                        }

                                        @media (min-width:850px) {
                                            #text-3451515497 {
                                                text-align: center;
                                            }
                                        }
                                    </style>
                                </div>
                                <div class="woocommerce columns-4 ">
                                    <div class="products row row-small large-columns-4 medium-columns-2 small-columns-2">
                                        @foreach ($bestSellers as $product)
                                            @include('user.components.cards.productCard', [
                                                'product' => $product,
                                            ])
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <style>
                    #section_1715500297 {
                        padding-top: 30px;
                        padding-bottom: 30px;
                    }

                    #section_1715500297 .ux-shape-divider--top svg {
                        height: 150px;
                        --divider-top-width: 100%;
                    }
                </style>
            </section>
            <div id="text-74213677" class="text title">
                <h2><strong>Sản phẩm</strong> mới</h2>
                <style>
                    #text-74213677 {
                        text-align: center;
                    }

                    @media (min-width:550px) {
                        #text-74213677 {
                            text-align: center;
                        }
                    }

                    @media (min-width:850px) {
                        #text-74213677 {
                            text-align: center;
                        }
                    }
                </style>
            </div>
            <div class="woocommerce columns-4 ">
                <div class="products row row-small large-columns-4 medium-columns-2 small-columns-2">
                    @foreach ($newProducts as $product)
                        @include('user.components.cards.productCard', ['product' => $product])
                    @endforeach
                </div>
            </div>
            <div class="is-divider divider clearfix"></div>
            <section class="section" id="section_1098061527">
                <div class="bg section-bg fill bg-fill bg-loaded bg-loaded"></div>
                <div class="section-content relative">
                    <div class="row" id="row-244298316">
                        <div id="col-2078195036" class="col box-left-t medium-12 small-12 large-6">
                            <div class="col-inner">
                                <p><a href="#">Mua hàng hôm nay</a></p>
                                <p><strong><span style="font-size: 170%;"><a href="#">Ưu đãi
                                                lớn</a></span></strong></p>
                                <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_1184483305">
                                    <div class="img-inner dark">
                                        <img data-lazyloaded="1" src="../assets/images/ds.svg"
                                            decoding="async" width="1" height="1"
                                            data-src="../assets/images/ds.svg"
                                            class="attachment-large size-large wp-post-image entered litespeed-loaded"
                                            alt="ds" data-ll-status="loaded">
                                    </div>
                                    <style>
                                        #image_1184483305 {
                                            width: 100%;
                                        }
                                    </style>
                                </div>
                            </div>
                        </div>
                        <div id="col-1697765280" class="col box-right-t hide-for-medium medium-6 small-12 large-6">
                            <div class="col-inner">
                                <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_1462814500">
                                    <div class="img-inner dark">
                                        <img data-lazyloaded="1" src="../assets/images/gg.svg"
                                            decoding="async" width="1" height="1"
                                            data-src="../assets/images/gg.svg"
                                            class="attachment-large size-large wp-post-image entered litespeed-loaded"
                                            alt="gg" data-ll-status="loaded">
                                    </div>
                                    <style>
                                        #image_1462814500 {
                                            width: 100%;
                                        }
                                    </style>
                                </div>
                                <p><span style="font-size: 170%;">uy tín</span><br>
                                    <strong><span style="font-size: 170%;">an toàn</span></strong><br>
                                    <strong><span style="font-size: 170%;">nhanh chóng</span></strong>
                                </p>
                                <p>Tất cả sản phẩm đều được kiểm tra và bảo đảm cho quá trình sử dụng ổn định.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <style>
                    #section_1098061527 {
                        padding-top: 0px;
                        padding-bottom: 0px;
                    }

                    @media (min-width:850px) {
                        #section_1098061527 {
                            padding-top: 30px;
                            padding-bottom: 30px;
                        }
                    }
                </style>
            </section>
            <section class="section" id="section_1883914641">
                <div class="bg section-bg fill bg-fill bg-loaded bg-loaded"></div>
                <div class="section-content relative">
                    <div class="row" id="row-1161554208"></div>
                </div>
                <style>
                    #section_1883914641 {
                        padding-top: 0px;
                        padding-bottom: 0px;
                    }
                </style>
            </section>
        </div>
    </main>
@endsection
