@if (session()->has('alert-simple'))
    <?php
        $alert = session()->get('alert-simple');
        $alert = json_decode($alert);
    ?>
    <div>
        <div class="alert alert-{{$alert->color}} alert-dismissible" role="alert">
            {{$alert->body}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif
