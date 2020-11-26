@extends('admin.masterAdmin')

@section('title')
    T-shirt D.L | Categories
@endsection

@section('styleLinks')

@endsection

@section('body')

    <div class="container row justify-content-center" style="width: 70%;margin: auto">
        <div class="card">
            <h2 class="form-title" style="text-align: center">New Brand</h2>
            <br><br>
            <form action="{{route("categories.save_brand")}}" method="post">
                @csrf
                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label text-md-right">
                        {{ __('Brand Name') }}
                    </label>

                    <div class="col-md-8">
                        <input id="" type="text" class="form-control @error('brand_name') is-invalid @enderror"
                               name="brand_name" value="{{ old('brand_name') }}" required autocomplete="brand_name" autofocus>

                        @error('brand_name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label text-md-right">
                        {{ __('Brand Description') }}
                    </label>

                    <div class="col-md-8">
                    <textarea id="" type="text" class="form-control @error('brand_des') is-invalid @enderror"
                              name="brand_des" value="{{ old('brand_des') }}" required autocomplete="brand_des" autofocus
                              style="height: 85px"
                    >
                    </textarea>

                        @error('brand_des')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label text-md-right">
                        {{ __('Category Name') }}
                    </label>

                    <div class="col-md-8">
                        <select class="form-control" name="category_id">
                            @foreach($categories as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>

                        @error('category_id')
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
