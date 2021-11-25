<table class="table table-bordered" id="myTable">
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
                    <button type="submit" id="deleteValue" class="btn btn-danger" data-id="{{ $value->id }}">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>