@extends('layouts.navigation')
@section('content')
    <div class='container'>
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">All Tag</h3>
            </div>
            <div class="panel-body">
                <div class='table-responsive'>
                  <table class='table table-striped table-bordered table-hover'>
                    <thead>
                      <tr>
                        <th>Tag Name</th>
                        <th>Update</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if ($tags->count() > 0)

                        @foreach ($tags as $tag)
                            <tr>
                              <td>{{ $tag->tag }}</td>
                              <td>
                                    <a class="btn btn-sm btn-primary" href="{{ route('tags.edit',$tag->id) }}">Edit</a>
                              </td>
                              <td>
                                  <form action="{{ route('tags.destroy', $tag->id)}}" method="post">
                                       @csrf
                                       @method('DELETE')
                                       <button class="btn btn-sm btn-danger" type="submit">Delete</button>

                                   </form>
                              </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="3" class="text-center">N0 Tags Yet</th>
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
