@props([
    'headers' => [],
])

<div>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
            <tr>
                @foreach($headers as $header)
                    <th>{{$header}}</th>
                @endforeach
            </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                {{$slot}}
            </tbody>
        </table>
    </div>
</div>
