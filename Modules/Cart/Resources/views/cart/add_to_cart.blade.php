<div class="add-to-cart" >
    <form action="{{route('cart.store')}}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{$product->id}}">
        <input type="hidden" name="name" value="{{$product->name}}">
        <input type="hidden" name="price" value="{{$product->price}}">
        <button  class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
    </form>
</div>