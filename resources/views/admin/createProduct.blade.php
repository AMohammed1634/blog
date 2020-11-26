@extends('admin.masterAdmin')

@section('title')
    T-shirt D.L | Products
@endsection

@section('styleLinks')

@endsection

@section('body')

    <div class="container row justify-content-center" style="width: 70%;margin: auto">
        <div class="card">
            <h2 class="form-title" style="text-align: center">Add Product To Brand </h2>
            <br><br>
            <form action="{{route("products.save_product")}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="" class="col-md-2 col-form-label text-md-right">
                        {{ __('Product Name') }}
                    </label>

                    <div class="col-md-8">
                        <input id="" type="text" class="form-control @error('product_name') is-invalid @enderror"
                               name="product_name" value="{{ old('product_name') }}" required autocomplete="product_name" autofocus>

                        @error('product_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label text-md-right">
                        {{ __('Product Description') }}
                    </label>

                    <div class="col-md-8">
                    <textarea id="" type="text" class="form-control @error('product_des') is-invalid @enderror"
                              name="product_des" value="{{ old('product_des') }}" required autocomplete="product_des" autofocus
                              style="height: 85px"
                    >
                    </textarea>

                        @error('product_des')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label text-md-right">
                        {{ __('Brand Name') }}
                    </label>
                    <div class="col-md-8">
                        <select class="form-control" name="brand_id">
                            @foreach($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                            @endforeach
                        </select>

                        @error('brand_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label text-md-right">
                        {{ __('Product Price') }}
                    </label>
                    <div class="col-md-8">
                        <input id="" type="text" class="form-control @error('product_price') is-invalid @enderror"
                               name="product_price" value="{{ old('product_price') }}" required autocomplete="product_price" autofocus>

                        @error('product_price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label text-md-right">
                        {{ __('Product Discount Price') }}
                    </label>
                    <div class="col-md-8">
                        <span class="invalid-feedback alert" style="color: red" role="alert">
                            <strong>if no discount put value 0 </strong>
                        </span>
                        <input id="" type="text" class="form-control @error('product_dis_price') is-invalid @enderror"
                               name="product_dis_price" value="{{ old('product_dis_price') }}" required autocomplete="product_dis_price" autofocus>

                        @error('product_dis_price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label text-md-right">
                        {{ __('Product Image') }}
                    </label>
                    <div class="col-md-8">
                        <input id="" type="file" class="form-control @error('product_image') is-invalid @enderror"
                               name="product_image" value="{{ old('product_image') }}" required autocomplete="product_image" autofocus>

                        @error('product_image')
                        <span class="invalid-feedback alert" style="color: red" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label text-md-right">
                        {{ __('Product Image2') }}
                    </label>
                    <div class="col-md-8">
                        <input id="" type="file" class="form-control @error('product_image_2') is-invalid @enderror"
                               name="product_image_2" value="{{ old('product_image_2') }}" required autocomplete="product_image_2" autofocus>

                        @error('product_image_2')
                        <span class="invalid-feedback alert" style="color: red" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label text-md-right">
                        {{ __('Product Image3') }}
                    </label>
                    <div class="col-md-8">
                        <input id="" type="file" class="form-control @error('product_image_3') is-invalid @enderror"
                               name="product_image_3" value="{{ old('product_image_3') }}" required autocomplete="product_image_3" autofocus>

                        @error('product_image_3')
                        <span class="invalid-feedback alert" style="color: red" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label text-md-right">

                    </label>

                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Create') }}
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection

@section('JSLinks')
    <!-- ChartJS -->
    <script src="bower_components/chart.js/Chart.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard2.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>

@endsection
