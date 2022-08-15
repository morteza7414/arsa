
    <a href="{{route('cart.store' , $product->id)}}"
       onclick="cart(event,{{$product->id}})"
       class="tooltip-top"
       data-tippy-content="افزودن به سبد خرید">
        <i class="fa fa-shopping-cart"></i>
    </a>

    <a href="{{route('like', $product->id)}}"
       class="add-to-wish tooltip-top"
       data-tippy-content="@if($product->is_liked())حذف از لیست علاقه مندی @else افزودن به لیست علاقه مندی@endif"
       onclick="like(event,{{$product->id}})">
        <i class="@if($product->is_liked())fa fa-heart like @else fa fa-heart @endif"></i>
    </a>

    <a href="{{route('productpage',[$product->id,$product->slut])}}"
       class="tooltip-top"
       data-tippy-content="مشاهده محصول">
        <i class="fa fa-eye"></i>
    </a>
    <form action="{{ route('cart.store', $product->id) }}"
          method="post"
          id="addCart-{{$product->id}}">
        @csrf
    </form>
    <form action="{{ route('like', $product->id) }}"
          method="post"
          id="addLike-{{$product->id}}">
        @csrf
    </form>
