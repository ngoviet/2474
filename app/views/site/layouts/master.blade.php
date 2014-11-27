<!DOCTYPE html>
<html lang="en">
  <head>
    @include('partials/header')
    @yield('styles')

  </head>

  <body>
    @include('partials/rightbar')
    @include('partials/nav')

    @include('partials/sidebar')


    <div class="main ">
      @yield('content')
    </div>

    @include('partials/footer')
    @include('partials/usage')
    @include('partials/scripts')
    @yield('scripts')

  </body>
</html>