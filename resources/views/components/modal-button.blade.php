@props([
    'id' => '',
    'values' => []
])
@php
$random = \Illuminate\Support\Str::random(10);
@endphp


@push('js')
    <script>
        function triggerModal{{$random}}() {
            $('#{{$id}}').modal('show');
            @foreach($values as $x => $value )
                document.getElementById('{{$x}}').value = '{{$value}}';
            @endforeach
        }
    </script>
@endpush

<div onclick="triggerModal{{$random}}()">
    {{$slot}}
</div>
