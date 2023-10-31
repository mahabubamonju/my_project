@extends('backend.master')

@section('title')   
Manage Product   
@endsection

@section('content')   
<section class="pt-3 px-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h3 class="pb-2">Manage Product</h3>
                <table class="table">
                    <thead class="table-info">
                        <th>Product Title</th>
                        <th>Short Description</th>
                        {{-- <th>Long Description</th> --}}
                        <th>Price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </thead>  
                    <tbody>
                        @foreach ($ourProducts as $product)    
                        <tr>
                            <td>{{$product->product_name}}</td>
                            <td>{{$product->product_sd}}</td>
                            {{-- <td>{{$product->product_ld}}</td> --}}
                            <td>{{$product->product_price}}</td>
                            <td><img src="{{$product->image}}" alt="" srcset="" height="50px" width="50px"></td>
                            <td>
                                <a href="{{route('product.edit',["product"=>$product->id])}}" class="btn btn-primary">Edit</a>
                                <a href="" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>  
                </table>
            </div>
        </div>
    </div>
</section>


@endsection
