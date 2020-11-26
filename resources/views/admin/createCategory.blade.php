@extends('admin.masterAdmin')

@section('title')
    T-shirt D.L | Categories
@endsection

@section('styleLinks')

@endsection

@section('body')

    <div class="container row justify-content-center" style="width: 70%;margin: auto">
    <div class="card">
        <h2 class="form-title" style="text-align: center">New Category 'Super category'</h2>
        <br><br>
        <form action="{{route('categories.save_category')}}" method="post">
            @csrf
            <div class="form-group row">
                <label for="email" class="col-md-2 col-form-label text-md-right">
                    {{ __('Category Name') }}
                </label>

                <div class="col-md-8">
                    <input id="" type="text" class="form-control @error('category_name') is-invalid @enderror"
                           name="category_name" value="{{ old('category_name') }}" required autocomplete="category_name" autofocus>

                    @error('category_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-2 col-form-label text-md-right">
                    {{ __('Category Description') }}
                </label>

                <div class="col-md-8">
                    <textarea id="" type="text" class="form-control @error('category_des') is-invalid @enderror"
                           name="category_des" value="{{ old('category_des') }}" required autocomplete="category_des" autofocus
                            style="height: 85px"
                    >
                    </textarea>

                    @error('category_des')
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
