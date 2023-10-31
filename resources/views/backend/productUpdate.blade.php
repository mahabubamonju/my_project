@extends('backend.master')

@section('title')
    Product Update
@endsection

@section('content')
<section class="p-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{-- <p class="text-success">{{Session::get('pmsg')}}</p> --}}
                <form action="{{route('product.edited', $product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h3 class="text-primary pb-2">Edit Your Product</h3>
                    <div class="mb-3">
                      <label for="pname" class="form-label">Product Title</label>
                      <input type="text" class="form-control" value="{{$product->product_name}}" id="pname" name="pname">
                      <div class="form-text">Insert your Product Title</div>
                    </div>
                    <div class="mb-3">
                      <label for="psd" class="form-label">Product Short Description</label>
                      <input type="text" class="form-control" value="{{$product->product_sd}}" id="psd" name="psd">
                      <div class="form-text">Insert your Short Description</div>
                    </div>
                    <div class="mb-3">
                      <label for="pld" class="form-label">Product Long Description</label>
                      <input type="text" class="form-control" value="{{$product->product_ld}}" id="pld" name="pld">
                      <div class="form-text">Insert your Long Description</div>
                    </div>
                    <div class="mb-3">
                      <label for="pprice" class="form-label">Price</label>
                      <input type="number" class="form-control" value="{{$product->product_price}}" id="pprice" name="pprice">
                    </div>
                    <div>
                        <img src="{{asset('/')}}{{$product->image}}" alt="" srcset="" height="50px" width="50px">
                    </div>
                    <div class="mb-3">
                      <label for="img" class="form-label">Choose Product Image</label>
                      <input type="file" class="form-control" value="" id="img" name="img">
                    </div>
                   
                    <button type="submit" name="btn" id="btn" class="btn btn-primary">Save</button>
                  </form>
            </div>
        </div>
    </div>
</section>
@endsection