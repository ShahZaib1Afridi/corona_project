@extends('layouts.navigation')
@section('content')
    <div class='container'>
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">All Posts</h3>
            </div>
            <div class="panel-body">
                <div class='table-responsive'>
                  <table class='table table-striped table-bordered table-hover'>
                    <thead>
                      <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                              <td><img src="{{ $post->featured }}" class="img-rounded"  alt="{{ $post->title }}" width="70px" height="50px;"></td>
                              <td>{{ $post->title }}</td>

                              <td>
                                    <a class="btn btn-info" href="{{ route('post.edit',$post->id) }}">Edit</a>
                                    {{-- <a class="btn btn-primary" href="{{ route('category.edit',$category->id) }}">Edit</a> --}}

                              </td>

                              <td>

                                  <form action="{{ route('post.destroy', $post->id)}}" method="post">
                                       @csrf
                                       @method('DELETE')
                                       <button class="btn btn-warning" type="submit">Trash</button>
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
