@props([
    'name' => '',
    'type' => '',
    'placeholder' => '',
    'validator' => true,
    'value' => '',
    'id' => ''
])

<?php
    $random = \Illuminate\Support\Str::random(10);
    if ($id == '') {
        $id = $random;
    }
    $old_value = $value;

//    dd($alert);
?>

<div>
    <div class="form-floating form-floating-outline mb-4">

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
        <input
            id="{{$id}}"
            type="{{$type}}"
            class="form-control"
            name="{{$name}}"
            placeholder="{{$placeholder}}"
            value="{{isset($old_value) ? $old_value : ''}}"
            aria-label="john.doe"
            required />
        <label for="{{$id}}">{{$placeholder}}</label>
        @if($validator == true)
                @if(request()->session()->has('input-alert-'.$name))
                    <div class="text-{{$alert->color}}">{{$alert->body}}</div>
                @endif
        @endif
    </div>
</div>
