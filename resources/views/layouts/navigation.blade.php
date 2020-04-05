<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/toaster.min.css') }}" rel="stylesheet">

    </head>
    <body>
        <nav class="navbar navbar-default" role="navigation">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar">
              <ul class="nav navbar-nav">
                <li class="active"><a href="{{ asset('admin/home') }}">Home</a></li>
                <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Post Deatils <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="{{ asset('admin/post/create') }}">Create New Post</a></li>
                        <li><a href="{{ asset('admin/post/') }}">All Posts</a></li>
                        <li><a href="{{ route('post.trashed') }}">All Trashed Posts</a></li>
                      </ul>
                </li>

                <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Categories <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="{{ asset('admin/category/create') }}">Create New Category</a></li>
                        <li><a href="{{ asset('admin/category') }}">All Categories</a></li>
                      </ul>
                </li>

                <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Tag <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="{{ asset('admin/tags/create') }}">Create New Tag</a></li>
                        <li><a href="{{ asset('admin/tags') }}">All Tag</a></li>
                      </ul>
                </li>
                <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Users <span class="caret"></span></a>
                      <ul class="dropdown-menu">

                        <li><a href="{{ asset('admin/users') }}">All Users</a></li>
                      </ul>
                </li>

              </ul>

              <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Post Deatils <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="/">Logout</a></li>

                        </ul>
                  </li>

              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
        @yield('content')
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ asset('js/jquery.js') }}" ></script>
        <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
        <script src="{{ asset('js/toaster.min.js') }}" ></script>

        <script type="text/javascript">

        @if (Session::has('success')) {
            toastr.success("{{ Session::get('success') }}")
        }
        @endif

        @if (Session::has('info')) {
            toastr.info("{{ Session::get('info') }}")
        }
        @endif

        @if (Session::has('warning')) {
            toastr.warning("{{ Session::get('warning') }}")
        }
        @endif

        // Display an info toast with no title

        </script>

    </body>
</html>
