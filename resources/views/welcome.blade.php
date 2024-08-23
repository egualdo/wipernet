@extends('layout.layoutMaster')
@section("title", "WiperAgency 2022")
@section('content')


<style>
    html,
    body {
        position: relative;
        height: 100%;
    }

    body {
        background: #eee;
        /* font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 14px; */
        color: #000;
        margin: 0;
        padding: 0;
    }

    .swiper {
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }

    .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>

        {{-- <script>
            var jqCdn="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js";
            var integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D";
            var cross= "anonymous";

        
            /** Prueba */
            function loadJs(file, callback) {
            // Evitar cargar más de 1 vez
                if(document.querySelector(`script[src="${file}"]`)) {
                    // Ya se cargó el script, solo se ejecuta la función de retorno
                    if(typeof callback == 'function') {
                    callback();
                    }
                } else {
                    // No se ha cargado, primero creas el elemento
                    let script = document.createElement('script');
                    // Si hay función de retorno
                    if(typeof callback == 'function') {
                    // Debe ejecutarse cuanto el script se haya cargado
                        script.addEventListener('load', callback);
                    }
                    // Asignar ubicación del script
                    
                    // script.type = "text/javascript";
                    script.src = file;
                    script.integrity=integrity;
                    script.setAttribute("crossorigin", cross);
                    script.async=true;
                    console.log(script);
                    // Agregar a <head>
                    document.head.appendChild(script);
                }
            }
            
            // $(document).ready(funcion1);

            // Escuchar clic en el botón
            $(document).ready(function() {
                
                // if(window.sessionStorage.getItem('readycdn')==true){

                loadJs(jqCdn, () => {
                    // Si se carga, debería poderse ejecutar este código
                
                    $.ajax({
                                url: '{{ route('setSession') }}',
                                method: 'POST',
                                dataType: 'json',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data: {
                                    'readycdn':true,
                                },
                                success: function (data) {
                                    if (data.code == '200') {
                                        // window.sessionStorage.setItem('readycdn',true);
                                        console.log("se ejecuto");
                                        // window.location.reload()
                                    }
                                }
                            });
                });
            });
</script> --}}


<section id="welcome" class="banner-section">
    <div class="container-fluid hero">
        <div class="row">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">

                    @foreach ( $slide as $s )
                        <div class="swiper-slide">
                            <div class="w-full" >
                            <a href="{{$s->link}}" style="text-decoration: none">
                                 <div class="row">
                                 
                                    <div class="col-12 col-lg-6 hero-text">
                                        <h1 style="color:#000">
                                                {{$s->title}}
                                            
                                                <br>
                                                <span>
                                                {{$s->subtitle}}
                                                </span>
                                        </h1>
                                    </div>
                                    
                                    <div class="col-12 col-lg-6 hero-img img-bg-top" style="background-image:url({{ $s->image }})">
                                        </div>
                                
                                        
                                </div>
                            
                                 </a>
                                
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

                {{-- <div class="demo"> --}}
                    {{-- <div class="item">            
                        <div class="clearfix" style="display: block">
                            <ul id="image-gallery" class="gallery list-unstyled cS-hidden" >
                                <li style="height: 600px"   data-thumb= {{ asset('img/thumb/cS-1.jpg') }}> 
                                    <img  style="width: 100%;object-fit: cover" src={{ asset('img/cS-1.jpg') }} />
                                    </li>
                                <li style="height: 600px" data-thumb= {{ asset('img/thumb/cS-2.jpg') }}> 
                                    <img style="width: 100%;object-fit: cover" src={{ asset('img/cS-2.jpg') }} />
                                    </li>
                                <li style="height: 600px" data-thumb= {{ asset('img/thumb/cS-3.jpg') }}> 
                                    <img style="width: 100%;object-fit: cover" src={{ asset('img/cS-3.jpg') }} />
                                    </li>
                                <li style="height: 600px" data-thumb= {{ asset('img/thumb/cS-4.jpg') }}> 
                                    <img style="width: 100%;object-fit: cover" src={{ asset('img/cS-4.jpg') }} />
                                    </li>
                                <li style="height: 600px" data-thumb= {{ asset('img/thumb/cS-5.jpg') }}> 
                                    <img style="width: 100%;object-fit: cover" src={{ asset('img/cS-5.jpg') }} />
                                    </li>
                            </ul>
                        </div>
                    </div> --}}
                {{-- </div> --}}
        </div>
    </div>
</section>


@include("inc.letstalk")
<!-- Optional JavaScript; choose one of the two! -->
{{-- @if(session('readycdn')) --}}
    @include("inc.casos")
{{-- @endif --}}

@include("inc.servicios")

@include("inc.clientes")

@include("inc.equipo")

@include("inc.soluciones")

@include("inc.servicios-list")

@include("inc.casos-relacionados")

@include("inc.oficinas")


@endsection



   