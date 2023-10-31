@extends('backend.master')

@section('title')
    Add Carousel
@endsection

@section('content')
    <section class="py-4 px-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-success">{{ Session::get('cmsg') }}</p>
                    <h3 class="pb-3">Add Carousel Image</h3>
                    <form action="{{ route('carousel.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="cimage" class="form-label">Carousel Image</label>
                            <input type="file" class="form-control" name="cimage" id="cimage">
                            <div id="emailHelp" class="form-text">Insert Carousel Image</div>
                        </div>
                        <div class="mb-3">
                            <label for="csd" class="form-label">Carousel Short Description</label>
                            <input type="text" class="form-control" name="csd" id="csd">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
