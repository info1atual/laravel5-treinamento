@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>

                <div class="panel-body">
                    <div class="col-xs-6">
                        <a href="{{ url('admin/products') }}" class="btn btn-primary btn-block well-sm">Products</a>
                    </div>
                    <div class="col-xs-6">
                        <a href="{{ url('admin/categories') }}" class="btn btn-primary btn-block well-sm">Categories</a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
