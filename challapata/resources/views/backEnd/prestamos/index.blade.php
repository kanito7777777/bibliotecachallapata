@extends('backLayout.app')
@section('title')
Prestamo
@stop

@section('content')

    <h2>Nada que mostrar</h2>

@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $('#tblprestamos').DataTable({
            columnDefs: [{
                targets: [0],
                visible: false,
                searchable: false
                },
            ],
            order: [[0, "asc"]],
        });
    });
</script>
@endsection