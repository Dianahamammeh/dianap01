<!DOCTYPE html>
<html lang="en">
@include('admin.body.head')
@include('admin.body.header')
@include('admin.body.sidebar')

  @yield('content')

@include('admin.body.footer')
@include('admin.body.script')
@stack('js')
</body>
</html>
