@extends('layouts.navigation')
@section('content')
    <div class='container'>
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">All Categories</h3>
            </div>
            <div class="panel-body">
                <div class='table-responsive'>
                  <table class='table table-striped table-bordered table-hover'>
                    <thead>
                      <tr>
                        <th>Category Name</th>
                        <th>Update</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                              <td>{{ $category->name }}</td>
                              <td>
                                    <a class="btn btn-primary" href="{{ route('category.edit',$category->id) }}">Edit</a>
                              </td>
                              <td>
                                  <form action="{{ route('category.destroy', $category->id)}}" method="post">
                                       @csrf
                                       @method('DELETE')
                                       <button class="btn btn-danger" type="submit">Delete</button>

                                   </form>
                              </td>
                            </tr>
                        @endforeach

                    </tbody>
                  </table>
                </div>
            </div>
          </div>

      </div>
    </div>


    </div>
@endsection
