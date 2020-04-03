@extends('layouts.navigation')

@section('content')

    <div class='container' id="panel_style">

    <div class="row">
     <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 ">
         @include('layouts.show_error')

    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Create New Post</h3>
      </div>
      <div class="panel-body">
               <form method="post" action="{{ action('PostsController@store')}}" enctype="multipart/form-data" >
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                  </div>
                  <div class="form-group">
                    <label for="featured">Featured Image:</label>
                    <input type="file" class="form-control" id="featured" name="featured">
                  </div>
                  <div class="form-group">
                    <label for="category_id">Select Category:</label>
                    <select class='form-control' name="category_id" id="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>

                        @endforeach
                    </select>

                  </div>
                  <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea class="form-control" id="content" name="content">
                    </textarea>
                  </div>
                  <div class="row">
                    <div class="col-lg-4 col-md-4 col-lg-offset-4 col-md-offset-4">

                        <div class="form-group">
                          <button type="submit" name="submit" class=" btn btn-success form-control"> Submit</button>
                        </div>

                    </div>
                  </div>
               </form>
      </div>
    </div>
     </div>
    </div>


    </div>
@endsection
