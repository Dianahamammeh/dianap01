<!DOCTYPE html>
<html lang="en">
@include('admin.body.head')
@include('admin.body.header')

@auth


  @include('admin.body.sidebar')
@endauth

  @yield('content')

@include('admin.body.footer')
@include('admin.body.script')
@stack('js')

{{-- @include('sweetalert::alert') --}}

</body>
</html>
