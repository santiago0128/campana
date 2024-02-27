<!doctype html>
<html lang="en">

@include('menu/header')
@include('menu/menu_prueba')
<div id="demo">
    <div style="padding-top: 20px ;">
        @yield('contenido')
    </div>
</div>
@include('menu/footer')

</html>