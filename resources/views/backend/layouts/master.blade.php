<!DOCTYPE html>
<html lang="en">
  <head>
    @include('backend.layouts.head')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        @include('backend.layouts.sidebar')
        
        <!-- top navigation -->
        @include('backend.layouts.header')
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
              <div class="clearfix"></div>
  
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_content">
                        @yield('content')
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by
            <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    @include('backend.layouts.footer')
  </body>
</html>
