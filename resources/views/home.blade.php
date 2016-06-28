@extends('layouts.app')

@section('content')
<div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    
                    <form method="post" @if(isset($postToEdit->post_id)) action="{{ route('update') }}" @else action="{{ route('post') }}" @endif enctype="multipart/form-data" class="form-horizontal" role="form">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="post_id" value="{{ $postToEdit->post_id or '' }}">
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="title">Title:</label>
                        <div class="col-sm-10">
                          <input type="text" name="title" class="form-control" id="title" placeholder="Enter the title" value="{{ $postToEdit->title or '' }}">
                        </div>
                      </div>

                      

    
    
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="post">Post:</label>
                          <div class="col-sm-10">
                            <textarea class="form-control" name="post" rows="5" id="post">{{ $postToEdit->post or "" }}</textarea>
                          </div>
                        </div>
                        

                        

                      <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                      </div>
                    </form>
                    
                </div>
            </div>
</div>
@if(!isset($postToEdit->post_id))
    <div class="container">
      
      
                    <div class="panel panel-default">
                        <div class="panel-heading">List</div>
        
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Select Post to Edit or Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td>
                                                {{ $post->title }}
                                                <form class="pull-right" method="post" action="{{ route('delete') }}">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="delete_this" value="{{ $post->post_id }}">
                                                    <button id="left-margin" type="submit" class="btn btn-warning">Delete</button>
                                                </form>
                                                <form class="pull-right" method="post" action="{{ url('/edit') }}">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="edit_this" value="{{ $post->post_id }}">
                                                    <button id="left-margin" type="submit" class="btn btn-info">Edit</button>
                                                </form>
                                            </td>
                                                
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">{{ $posts->links() }}</div>
                            


                        </div>
                    </div>
                    
    </div>
    @endif
@endsection
