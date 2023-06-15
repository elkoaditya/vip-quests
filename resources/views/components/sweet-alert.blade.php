@props([
    'title' => '',
    'text' => '',
    'icon' => '',

    'confirmtext' => '',
    'confirmcolor' => '',
    'confirmicon' => '',
    'confirmresult' => '',

    'canceltext' => '',
    'cancelcolor' => '',
    'cancelicon' => '',
    'cancelresult' => '',

    'url' => '',
    'body' => [],
    'redirect' => ''
])

@php
    $random = \Illuminate\Support\Str::random(16);
    $body = $body + [
        '_token' => csrf_token()
];
@endphp
<link rel="stylesheet" href="{{asset('material')}}/vendor/libs/sweetalert2/sweetalert2.css" />

<div id="{{$random}}">
    {{ $slot }}
</div>

@push('js')
    <script src="{{asset('material')}}/vendor/libs/sweetalert2/sweetalert2.js"></script>
    <script>
        {{--const confirmColor = document.getElementById('{{$random}}')--}}

        document.getElementById('{{$random}}').onclick = function () {
            Swal.fire({
                title: '{{$title}}',
                text: "{{$text}}",
                icon: '{{$icon}}',
                showCancelButton: true,
                confirmButtonText: '{{$confirmtext}}',
                cancelButtonText: '{{$canceltext}}',
                customClass: {
                    confirmButton: 'btn btn-{{$confirmcolor}} me-3 waves-effect waves-light',
                    cancelButton: 'btn btn-label-{{$cancelcolor}} waves-effect'
                },
                buttonsStyling: false
            }).then(function (result) {
                if (result.value) {
                    // Ajax push
                    let token   = $("meta[name='csrf-token']").attr("content");

                    $.ajax({
                        url: `{{$url}}`,
                        type: "POST",
                        cache: false,
                        data: {!! json_encode($body) !!},
                        success: function(response) {
                            Swal.fire({
                                icon: '{{$confirmicon}}',
                                title: '{{$confirmtext}}!',
                                text: '{{$confirmresult}}',
                                customClass: {
                                    confirmButton: 'btn btn-success waves-effect'
                                }
                            }).then(res => {
                                @if($redirect == '')
                                    location.reload()
                                @else
                                    window.location = "{{$redirect}}";
                                @endif
                            });
                        },
                        error: function(error) {
                            alert(error)
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire({
                        title: '{{$canceltext}}',
                        text: '{{$cancelresult}}',
                        icon: '{{$cancelicon}}',
                        customClass: {
                            confirmButton: 'btn btn-success waves-effect'
                        }
                    });
                }
            });
        };
    </script>
@endpush

{{--@push('css')--}}
{{--    <link rel="stylesheet" href="{{asset('material')}}/vendor/libs/sweetalert2/sweetalert2.css" />--}}
{{--@endpush--}}
