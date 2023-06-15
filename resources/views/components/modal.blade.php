@props([
    'header' => '',
    'body' => '',
    'id' => ''
])

<div>
    <div class="modal fade" id="{{$id}}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body py-3 py-md-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="mb-2">{{$header}}</h3>
                        <p class="pt-1">{{$body}}</p>
                    </div>
                    {{$slot}}
                </div>
            </div>
        </div>
    </div>
</div>
