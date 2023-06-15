@php
$sides = \Illuminate\Support\Facades\Config::get('layout.sidebar');

@endphp


<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0">
    <div class="container-xxl d-flex h-100">
        <ul class="menu-inner py-1">
            <!-- Page -->
            @foreach($sides['admin'] as $side)
                @php
                    $url = '/'.\Illuminate\Support\Facades\Request::segment(2);
                    $active = '';
                    if ($url == $side['url']){
                        $active = 'active';
                    }
                @endphp
                <li class="menu-item {{$active}}">
                    <a href="/{{\Illuminate\Support\Facades\Auth::user()->role}}{{$side['url']}}" class="menu-link">
                        <i class="menu-icon tf-icons mdi {{$side['icon']}}"></i>
                        <div data-i18n="Page 1">{{$side['name']}}</div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</aside>
