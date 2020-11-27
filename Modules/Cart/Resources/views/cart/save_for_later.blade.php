<div class="product-btns">
    <form action="{{ route('cart.switchToSaveForLater', $product->id) }}" method="POST" style="display: inline-block">
        {{ csrf_field() }}
        <button  class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp"></span></button>
    </form>
    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
    <a class="quick-view tooltipp" href="{{route('product' ,$product->id)}}"> <i class="fa fa-eye"></i></a>
</div>