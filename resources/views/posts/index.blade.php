@extends('posts.layout')
 
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <!-- <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a> -->
                <!-- Button trigger modal -->
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
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Author</th>
            <th>Description</th>
            <th>Rating</th>
            <th>Comment</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->title }}</td>
            <td>{{ $value->author }}</td>
            <td>{{ \Str::limit($value->description, 100) }}</td>
            <td>{{ $value->rating }}</td>
            <td>{{ $value->comment }}</td>
            <td>
                <form action="{{ route('posts.destroy',$value->id) }}" method="POST">   
                    <a class="btn btn-info" href="{{ route('posts.show',$value->id) }}">Show</a>    
                    <a class="btn btn-primary" href="{{ route('posts.edit',$value->id) }}">Edit</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
    {!! $data->links() !!}    
    <p>If you click on the "Hide" button, I will disappear.</p>

<button id="hide">Hide</button>
<button id="show">Show</button>

@include('posts.create')
@endsection