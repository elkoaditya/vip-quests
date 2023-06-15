@props([
    'name' => '',
    'placeholder' => '',
    'validator' => true,
    'value' => '',
    'values' => [],
    'id' => '',
    'modal_id' => ''
])

@php
    $random = \Illuminate\Support\Str::random(10);
    if ($id == '') {
        $id = $random;
    }
    $old_value = $value;
@endphp


@push('js')
    <script src="{{asset('material')}}/vendor/libs/select2/select2.js"></script>
    <script>
        select2Icons = $('#{{$random}}');
        if (select2Icons.length) {
            // custom template to render icons
            function renderIcons(option) {
                if (!option.id) {
                    return option.text;
                }
                var $icon = "<i class='" + $(option.element).data('icon') + " me-2'></i>" + option.text;
                return $icon;
            }
            select2Focus(select2Icons);
            select2Icons.wrap('<div class="position-relative"></div>').select2({
                placeholder: "{{$placeholder}}",
                templateResult: renderIcons,
                templateSelection: renderIcons,
                @if($modal_id != '')
                    dropdownParent: $('#{{$modal_id}}'),
                @endif
                escapeMarkup: function (es) {
                    return es;
                }
            });
        }
    </script>
@endpush
@push('css')
    <link rel="stylesheet" href="{{asset('material')}}/vendor/libs/select2/select2.css" />
@endpush

@if($validator == true)
    @if(request()->session()->has('input-alert-'.$name))
            <?php
            $alert = \Illuminate\Support\Facades\Session::get('input-alert-'.$name);
            $alert = json_decode($alert);
            ?>
    @endif
        <?php
        $old_value = \Illuminate\Support\Facades\Session::get('input-value-'.$name);
        ?>
@endif

<div class="mb-4">
    <div class="form-floating form-floating-outline">
        <select id="{{$id}}" class="select2-icons form-select" name="{{$name}}">
            <option></option>
            @foreach($values as $val)
                <option value="{{$val['value']}}" data-icon="mdi {{$val['icon']}}" {{$val['value'] == $old_value ? 'selected' : ''}} >{{$val['name']}}</option>
            @endforeach
        </select>
        <label for="{{$id}}">{{$placeholder}}</label>
    </div>
    @if($validator == true)
        @if(request()->session()->has('input-alert-'.$name))
            <div class="text-{{$alert->color}}">{{$alert->body}}</div>
        @endif
    @endif
</div>
