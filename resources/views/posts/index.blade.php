@extends('posts.layout')
 
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createBookModal">
                    Add Book
                </button>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div id="bookTable">
        @include('posts.table')
    </div>
    
    {!! $data->links() !!}    

@include('posts.create')
@endsection