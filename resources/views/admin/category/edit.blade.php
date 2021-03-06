@extends('layouts.navigation')

@section('content')

    @include('layouts.show_error')

    <div class='container' id="panel_style">
    <div class="row">
     <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 ">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Update Category</h3>
      </div>
      <div class="panel-body">
               <form method="POST" action="{{ action('CategoriesController@update', $categories->id)}}" >
                   @csrf
                  @method('PUT')

                  <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $categories->name }}">
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 col-lg-offset-4 col-md-offset-4">

                        <div class="form-group">
                          <button type="submit" name="submit" class=" btn btn-success form-control">Update</button>
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
