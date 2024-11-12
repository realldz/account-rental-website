<div class="product-small col has-hover rtwpvs-product product type-product post-6303 status-publish first instock product_cat-streaming product_cat-giai-tri product_cat-tai-khoan product_tag-account product_tag-bestsale product_tag-netflix-account product_tag-netflix-android product_tag-netflix-free product_tag-netflix-movies has-post-thumbnail shipping-taxable purchasable product-type-variable">
    <div class="col-inner">
        <div class="badge-container absolute left top z-1"></div>
        <div class="product-small box product-small box has-hover box-vertical box-text-bottom">
            <div class="box-image">
                <div class="image-none">
                    <a href="{{ route('product', $product->slug) }}" aria-label="{{ $product->name }}">
                        <img data-lazyloaded="1" src="{{ $product->image_link }}"
                            decoding="async" width="247" height="247">
                    </a>
                </div>
                <div class="image-tools is-small top right show-on-hover"></div>
                <div class="image-tools is-small hide-for-small bottom left show-on-hover">
                </div>
                <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                </div>
            </div>
            <div class="box-text box-text-products">
                <div class="title-wrapper">
                    <h3 class="name product-title woocommerce-loop-product__title">
                        <a href="{{ route('product', $product->slug) }}"
                            class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                            {{ $product->name }} </a>
                    </h3>
                    <div class="cat-content">
                        <span class="product-item-cat">
                            {{ $product->category->name }}
                        </span><span class="sales">
                            <img data-lazyloaded="1"
                                src="/assets/images/cart-grey.svg"
                                decoding="async"
                                data-src="/assets/images/cart-grey.svg"
                                alt="cart grey" data-ll-status="loaded" class="entered litespeed-loaded">
                            <span>{{ $product->order_item_count }}</span>
                        </span>
                    </div>
                    <div class="price-wrapper">
                        <span class="price"><ins><span class="woocommerce-Price-amount amount"><bdi><span
                                            class="woocommerce-Price-amount amount">{{ $product->productCycle->first()->formated_cycle_price ?? 0}}</span><span
                                            class="woocommerce-Price-currencySymbol">đ</span></bdi></span></ins>
                        </span>
                        <div class="product-item__btn btn-green">
                            <a href="{{ route('product', $product->slug) }}">
                                Buy
                                <span class="btn-content">
                                    <img data-lazyloaded="1"
                                        src="/assets/images/cart.svg"
                                        decoding="async"
                                        data-src="/assets/images/cart.svg"
                                        alt="cart" data-ll-status="loaded" class="entered litespeed-loaded">
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="price-wrapper"></div>
            </div>
        </div>
    </div>
</div>
