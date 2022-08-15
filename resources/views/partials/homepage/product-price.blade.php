@if($product->offPrice() == $product->price)
    <div class="price">
        <div class="product_price price">
            <h6>
                {{number_format($product->price)}} تومان
            </h6>
        </div>
    </div>
@else
    <div class="with_off_price">
        <div class="check-price off_price">
            <h6>
                {{number_format($product->price)}} تومان
            </h6>
        </div>
        <div class="product_price price">
            <div class="price">
                <h6>
                    {{number_format($product->offPrice())}} تومان
                </h6>
            </div>
        </div>
    </div>
@endif
