@extends('admin.masterAdmin')

@section('title')
    T-shirt D.L | Categories
@endsection

@section('styleLinks')

@endsection

@section('body')

    <div class="container row justify-content-center" style="width: 70%;margin: auto">
        <div class="card">
            <h2 class="form-title" style="text-align: center">New Color to product {{$product->name}}</h2>
            <br><br>
            <form action="{{route("products.save_color",[$product->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label text-md-right">
                        {{ __('Quantity ') }}
                    </label>

                    <div class="col-md-8">
                        <input id="" type="number" class="form-control @error('qty') is-invalid @enderror"
                               name="qty" value="{{ old('qty') }}" required autocomplete="qty" autofocus>

                        @error('qty')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label text-md-right">
                        {{ __('Color') }}
                    </label>

                    <div class="col-md-8">
                    <input id="" type="color" class="form-control @error('color') is-invalid @enderror"
                              name="color" value="{{ old('color') }}" required autocomplete="color" autofocus
                              style=""
                    >


                        @error('color')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                </div>


                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label text-md-right">
                        {{ __('Color Image') }}
                    </label>

                    <div class="col-md-8">
                    <input id="" type="file" class="form-control @error('image') is-invalid @enderror"
                              name="image" value="{{ old('image') }}" required autocomplete="image" autofocus
                              style=""
                    >


                        @error('image')
                        <span class="invalid-feedback" role="alert">
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
