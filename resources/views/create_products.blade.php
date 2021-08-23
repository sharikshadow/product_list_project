@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ url('/') }}">Back to Products</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form class="form-horizontal" action="{{ url('Products/store') }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label> Name *</label>
                                <input type="text" class="form-control" id="title" name="title" required="true"
                                    aria-required="true">
                            </div>
                            <div class="form-group">
                                <label> Describtion</label>
                                <textarea class="form-control" name="description" rows="10" required="true"></textarea>
                            </div>

                            <div class="form-group">
                                <label> Image</label>
                                <input type="file" name="image" id="image" class="form-control" required="true">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;Save</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
