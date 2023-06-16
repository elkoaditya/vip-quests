<div>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        @livewireStyles
        <style>
            @import url('https://fonts.googleapis.com/css?family=Roboto:700');
            @keyframes showTopText {
                0% {
                    transform: translate3d(0, 100%, 0);
                }
                40%, 60% {
                    transform: translate3d(0, 50%, 0);
                }
                100% {
                    transform: translate3d(0, 0, 0);
                }
            }
            @keyframes showBottomText {
                0% {
                    transform: translate3d(0, -100%, 0);
                }
                100% {
                    transform: translate3d(0, 0, 0);
                }
            }
            .animated-title {
                color: #222;
                font-family: Roboto, Arial, sans-serif;
                height: 90vmin;
                left: 50%;
                position: absolute;
                top: 50%;
                transform: translate(-50%, -50%);
                width:80vmin;
            }
            .animated-title > div {
                height: 50%;
                overflow: hidden;
                position: absolute;
                width: 100%;
            }
            .animated-title > div div {
                font-size: 12vmin;
                padding: 2vmin 0;
                position: absolute;
            }
            .animated-title > div div span {
                display: block;
            }
            .animated-title > div.text-top {
                border-bottom: 1vmin solid #000;
                top: 0;
            }
            .animated-title > div.text-top div {
                animation: showTopText 1s;
                animation-delay: 0.5s;
                animation-fill-mode: forwards;
                bottom: 0;
                transform: translate(0, 100%);
            }
            .animated-title > div.text-top div {
                color: #767676;
            }
            .animated-title > div.text-bottom {
                bottom: 0;
            }
            .animated-title > div.text-bottom div {
                animation: showBottomText 0.5s;
                animation-delay: 1.75s;
                animation-fill-mode: forwards;
                top: 0;
                transform: translate(0, -100%);
            }

        </style>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    </head>
    <body>

    <div wire:loading.remove>
        <div class="animated-title">
            <div class="text-top">
                <div style="width: 80vmin">
                    <span style="font-size: 70px" align="center">Selamat Datang </span>
                    <span style="font-size: 50px" align="center">Kepada Yth </span>
                    <span style="font-size: 80px; font-weight: bold !important; color: black;" align="center">{{$panggilan}} {{$nama}}</span>
                </div>
            </div>

            <div class="text-bottom" align="center">
                <div style="text-align: center;">
                    <center>
                        <span style="font-size: 50px; width: 80vmin; display: block" align="center">Selaku
                            @if($jabatan == '-')
                                Tamu Undangan
                            @else
                                {{$jabatan}}
                            @endif
                        </span>
                    </center>
                </div>
            </div>
        </div>
    </div>

    @livewireScripts
    @vite(['resources/js/app.js'])
    <script type="module">
        Echo.channel('root')
            .listen('TriggerRoot', (e) => {
                console.log(e);
            });
    </script>
    </body>
    </html>

</div>
