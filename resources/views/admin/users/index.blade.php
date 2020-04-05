@extends('layouts.navigation')
@section('content')
    <div class='container'>
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">All Users</h3>
            </div>
            <div class="panel-body">
                <div class='table-responsive'>
                  <table class='table table-striped table-bordered table-hover'>
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Permission</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if ($users->count() > 0)


                        @foreach ($users as $user)
                            <tr>
                              <td><img src="{{ asset('$user->profile->avatar')}}" class="img-rounded"  alt="{{ $user->title }}" width="70px" height="50px;"></td>
                              <td>{{ $user->title }}</td>

                              <td>
                                  Permission
                                    {{-- <a class="btn btn-info" href="{{ route('user.edit',$user->id) }}">Edit</a> --}}
                                    {{-- <a class="btn btn-primary" href="{{ route('category.edit',$category->id) }}">Edit</a> --}}

                              </td>

                              <td>

                                  Delete
                              </td>
                            </tr>
                        @endforeach

                        @else
                            <tr>
                                <th class="text-center" colspan="4">NO User Yet</th>
                            </tr>
                        @endif

                    </tbody>
                  </table>
                </div>
            </div>
          </div>

      </div>
    </div>
    </div>
@endsection
