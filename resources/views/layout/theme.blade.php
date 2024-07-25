<html lang="en">
@include('layout.head')
<body>
<div class="container py-3">
@include('layout.header')
    <main>
        @section('content')
            @show
    </main>
</div>
<script src="{{asset('assets/js/jquery-3.7.1.min.js')}}"></script>
<script src="{{asset('assets/js/datatables.min.js')}}"></script>
<script>
    new DataTable('.datatable');
</script>
</body>
</html>
