@extends('base')
@section("products")
@if( count($products) > 0 )
@foreach( $products as $product )
    <div class="col" data-np-autofill-form-type="other" data-np-checked="1" data-np-watching="1">
        <div class="product-item">
            @if( $product->discount )
        <span class="badge bg-success position-absolute m-3"> {{ $product->discount . "%"}}</span>
        @else 
        <span class="badge bg-success position-absolute m-3"> 0%</span>
        @endif
        <a href="#" class="btn-wishlist"><svg width="24" height="24"><use xlink:href="#heart"></use></svg></a>
        <figure>
            <a href="index.html" title="{{$product->title}}">
            <img src="{{$product->image}}" class="tab-image">
            </a>
        </figure>
        <h3>{{$product->title}}</h3>
        <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary"><use xlink:href="#star-solid"></use></svg> 4.5</span>
        <span class="price">${{$product->price}}</span>
        <div class="d-flex align-items-center justify-content-between">
            <div class="input-group product-qty">
                <span class="input-group-btn">
                    <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus" data-id="{{$product->id}}">
                    <svg width="16" height="16"><use xlink:href="#minus"></use></svg>
                    </button>
                </span>
                <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" data-np-intersection-state="visible">
                <span class="input-group-btn">
                    <button type="button" class="quantity-right-plus btn btn-success btn-number" data-id="{{$product->id}}" data-type="plus">
                        <svg width="16" height="16"><use xlink:href="#plus"></use></svg>
                    </button>
                </span>
            </div>
            <a href="#" class="nav-link" data-id="{{$product->id}}">Add to Cart <iconify-icon icon="uil:shopping-cart"></iconify-icon></a>
        </div>
        </div>
    </div>
@endforeach
@else 
<div>
    <b>Products Not Available Yet</b>
</div>
@endif
@endsection