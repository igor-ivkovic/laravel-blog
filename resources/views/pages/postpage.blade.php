@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $post->title }}</div>
    
                    <div class="panel-body">
                        {!! $post->post !!}
                        
                            <br><br>
                            <strong>Author:</strong> {{ $post->users->name }} <br>
                            <strong>Posted:</strong> {{ substr($post->created_at, 0, 10) }}

                    </div>
                </div>
            </div>
        </div>
</div>

@endsection
