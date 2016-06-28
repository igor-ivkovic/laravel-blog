@extends('layouts.app')

@section('content')


    <div class="container">
        @foreach(array_chunk($posts->all(), 3) as $postrow)
    
            <div class="row">
            @foreach($postrow as $post)
    
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ $post->title }}</div>
        
                        <div class="panel-body">
                            <strong>Posted:</strong> {{ substr($post->created_at, 0, 10) }}
                            
                            <br><br>
                            
                            <span>{!! str_limit($post->post, 300) !!}</span>
                            
                            <br><br>
                            <strong>Author:</strong> {{ $post->users->name or "" }}
                            
                            <br> <br>
                                <a href="{{ url('posts/'.$post->post_id) }}">Read more</a>
                        </div>
                    </div>
                </div>
                
            @endforeach
            </div>
    
        @endforeach
        <div class="text-center">{{ $posts->links() }}</div>
    </div>




@endsection
