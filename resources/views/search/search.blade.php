@extends('posts.layout')
 
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

        <h1>Hier startet die Suche: </h1>
        <p>Hier kommt dann das Buch rein</p>  
        <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('search') }}" method="POST">
                        <div>
                            @csrf
                            <input type="text" name="searchterm" placeholder="Buchtitel..." required>
                            <label for="search">Suche Bücher</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Suche starten</button>
                    </form>
                </div>    
@endsection
