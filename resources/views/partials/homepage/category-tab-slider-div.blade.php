<div>
    <div class="product-box">
        <div class="product-imgbox">
            <div class="product-front">
                <a target="_blank"
                   href="{{route('productpage' , $product->id)}}">
                    <img src="{{asset('images/products/'.$product->image)}}"
                         class="img-fluid  " alt="product">
                </a>
            </div>
            @if($product->galleries->first())
                <div class="product-back">
                    <a target="_blank"
                       href="{{route('productpage' , $product->id)}}">
                        <img src="{{asset('images/products/gallery/'.$product->galleries->first()->name)}}"
                             class="img-fluid  " alt="product">
                    </a>
                </div>
            @endif
            <div class="product-icon icon-inline">
                @include('partials.product_options')
            </div>

            @if($product->created_at > \Carbon\Carbon::now()->subDay(2))
                <div class="new-label1">
                    <div>جدید</div>
                </div>
            @endif
            @if($product->amazing == 1)
                <div class="on-sale1">
                    فروش ویژه
                </div>
            @endif
        </div>
        <div class="product-detail detail-inline ">
            <div class="detail-title">
                <div class="detail-left">
                    <a href="{{route('productpage',$product->id)}}">
                        <h6 class="price-title">
                            {{$product->title}}
                        </h6>
                    </a>
                </div>
                <div class="detail-right">
                    @include('partials.homepage.product-price')
                </div>
            </div>
        </div>
    </div>
</div>