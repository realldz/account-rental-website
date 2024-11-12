@extends('user.layout')
@section('main')
    <main id="main" class="">
        <div class="row category-page-row">
            <div class="col large-3 hide-for-medium ">
                <div id="shop-sidebar" class="sidebar-inner col-inner">
                    <aside id="woocommerce_product_categories-3" class="widget woocommerce widget_product_categories"><span
                            class="widget-title shop-sidebar">Danh mục sản phẩm</span>
                        <div class="is-divider small"></div>
                        <ul class="product-categories">
                            @foreach ($all_categories as $category)
                            <li class="cat-item cat-item-1008 cat-parent has-child" aria-expanded="false"><a
                                    href="{{ route('search', ['category' => $category->id]) }}">{{ $category->name }}</a> <span class="count">{{ $category->product()->count() }}</span>
                            </li>
                            @endforeach

                        </ul>
                    </aside>
                    <aside id="woocommerce_price_filter-3" class="widget woocommerce widget_price_filter"><span
                            class="widget-title shop-sidebar">Lọc theo giá</span>
                        <div class="is-divider small"></div>
                        <form method="get" action="">
                            <div class="price_slider_wrapper">
                                <div class="price_slider ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    style="" id="range-slider">

                                </div>
                                <div class="price_slider_amount" data-step="10">
                                    <label class="screen-reader-text" for="min_price">Giá thấp nhất</label>
                                    <input type="text" id="min_price" name="min_price" value="1000" data-min="0"
                                        placeholder="Giá thấp nhất" style="display: none;">
                                    <label class="screen-reader-text" for="max_price">Giá cao nhất</label>
                                    <input type="text" id="max_price" name="max_price" value="1000000"
                                        data-max="0" placeholder="Giá cao nhất" style="display: none;">
                                    <button type="submit" class="button">Lọc</button>
                                    <div class="price_label" style="">
                                        Giá: <span class="from">1000đ</span> — <span class="to">1.000.000đ</span>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </form>

                    </aside>

                </div>
            </div>

            <div class="col large-9">
                <div class="shop-container">


                    <div class="woocommerce-notices-wrapper"></div>
                    <div class="products row row-small large-columns-3 medium-columns-2 small-columns-2">
                    @foreach ($products as $product)
                        @include('user.components.cards.productCard', ['product' => $product])
                    @endforeach
                    
                    </div>
                    </div><!-- row -->
                    <div class="container">
                        {{ $products->withQueryString()->links('vendor.pagination.product-search') }}
                    </div>

                </div><!-- shop container -->
            </div>
        </div>

    </main>
    <style>
       #range-slider .range-slider__range {
    background: #ffc747;
    transition: height .3s;
}

#range-slider .range-slider__thumb {
    background: #ffae47;
    transition: transform .3s;
}

#range-slider .range-slider__thumb[data-active] {
    transform: translate(-50%, -50%) scale(1.25);
}

#range-slider .range-slider__range[data-active] {
    height: 16px;
}
    </style>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/range-slider-input@2.4/dist/rangeslider.umd.min.js"></script>
<script>
    rangeSlider(document.querySelector('#range-slider'), {
        min: 1000,
        max: 1000000,
        step: 1000,
        value: [1000, 10000000],
        onInput: (value) => {
            $('#min_price').val(value[0]);
            $('#max_price').val(value[1]);
            $('.from').text(value[0].toLocaleString()+'đ');
            $('.to').text(value[1].toLocaleString()+'đ');
        }
    })

</script>

@endsection
