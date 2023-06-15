@props([
    'url' => '',
    'headers' => [],
    'values' => [],
])

@php
    $values = json_encode($values);
@endphp
@push('css')
    <link rel="stylesheet" href="{{asset('material')}}/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="{{asset('material')}}/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="{{asset('material')}}/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" />
    <link rel="stylesheet" href="{{asset('material')}}/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    <link rel="stylesheet" href="{{asset('material')}}/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css" />
@endpush

@push('js')
    <script src="{{asset('material')}}/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    {{--    <script src="{{asset('material')}}/js/tables-datatables-basic.js"></script>--}}
    <script type="text/javascript">
        $(function () {

            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{$url}}",
                columns: {!! $values !!},
            });

        });
    </script>
@endpush

<div>
    <div class="card-datatable table-responsive pt-0">
        <table class="table table-bordered yajra-datatable">
            <thead>
            <tr>
                @foreach($headers as $header )
                    <th>{{$header}}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
