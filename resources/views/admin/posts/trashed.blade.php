@extends('layouts.navigation')
@section('content')
    <div class='container'>
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">All Trashed Posts</h3>
            </div>
            <div class="panel-body">
                <div class='table-responsive'>
                  <table class='table table-striped table-bordered table-hover'>
                    <thead>
                      <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Restore</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                              <td><img src="{{ $post->featured }}" class="img-rounded"  alt="{{ $post->title }}" width="70px" height="50px;"></td>
                              <td>{{ $post->title }}</td>
                              <td>
                                 <a href="{{route('post.restore', $post->id)}} " class="btn btn-sm btn-success">Restore</a>

                              </td>
                              <td>
                                  <a href="{{route('post.kill', $post->id)}} " class="btn btn-sm btn-danger">Delete</a>
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
