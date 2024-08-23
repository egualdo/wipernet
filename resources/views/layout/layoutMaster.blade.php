<!doctype html>
<html class="no-js"  lang="{{ str_replace('_', '-', app()->getLocale()) }}">


    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> @yield("title") </title>
        {{-- <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"
        integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async>
    </script> --}}
        @include('layout.inc.linksMeta')
        @include('layout.inc.linksCss')

    </head>

    <body id="page-top">
        @include('inc.variables')
        @include('inc.barratop')
        @include('inc.menu')
        @yield("content")  
        @include('layout.inc.linksJs')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
        <link href="{{ asset('homePublic/css/newsletters.css') }}" rel="stylesheet">
        <link href="{{ asset('homePublic/css/modalletstalk.css') }}" rel="stylesheet">
        
        
        {{-- //libreria de ligthSlider --}}
        <link rel="stylesheet" href="https://sachinchoolur.github.io/lightslider/dist/css/lightslider.css">
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script src="https://sachinchoolur.github.io/lightslider/dist/js/lightslider.js"></script> 
         {{-- //libreria de ligthSlider --}}
        
         <button class="btn btn-info button-sticky"  
                id="openModal">
                <img src="{{asset('homePublic/imgs/icon-hand-paper.png')}}" style="padding-bottom: 10px">
                    Let's talk
                </button> 



        <div class="modal modalletstalk" style="top:10%" id="letstalkmodal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="news-subs">
                            <div class="modal-header">
                                <div class="label-news-modal" >
                                        <h1 style="color: #e6fffe"><b>Let's Talk</b></h1>
                                        <h6>Completa el formulario y nos contactaremos a la brevedad</h6>
                                </div>
                            </div>

                            <div class="modal-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="form-newsletters">
                                            <div class="col-6">
                                                <div class="div-input-news-modal">
                                                    <input class="inputnews-modal" type="text" id="name" name="name" placeholder="name">
                                                </div>

                                                <div class="div-input-news-modal">
                                                    <input class="inputnews-modal" type="email" id="email" name="email" placeholder="email">
                                                </div>

                                                <div class="div-input-news-modal">
                                                    <input class="inputnews-modal" type="text" id="country_id" name="country_id" placeholder="country">
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="div-input-news-modal">
                                                    <input class="inputnews-modal" type="text" id="lastname" name="lastname" placeholder="lastname">
                                                </div>

                                                    <div class="div-input-news-modal">
                                                    <input class="inputnews-modal" type="text" id="phone" name="phone" placeholder="phone">
                                                </div>

                                                <div class="div-input-news-modal">
                                                    <input class="inputnews-modal" type="text" id="company" name="company" placeholder="company">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        
                                    <div class="row">
                                        <label class="label-news-modal">
                                            Tipo de Proyecto
                                        </label>
                                    </div>
                                            
                                    <div class="row">
                                        @foreach (App\Models\ProjectType::all() as $projectType)
                                            <div class="col-4">
                                                <label class="label-news-modal">
                                                    <input class="checkbox-news-modal" type="checkbox" id="{{$projectType->id}}" value="{{$projectType->name}}" />
                                                        {{$projectType->name}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div> 

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-outline mb-1 mt-3">
                                                <textarea class="textarea-news" id="comments" placeholder="Dejanos tus comentarios" rows="4" ></textarea>
                                            </div>

                                            <label class="label-news-modal">
                                                <input class="checkbox-news-modal" type="checkbox" id="newsletter" />
                                                    Desea recibir notificaciones sobre nuestras ofertas e informacion nueva
                                            </label>

                                            <button class="btn-news-modal" onclick="sendContact()">Enviar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div> 


        

        <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
        <script src="https://unpkg.com/flowbite@1.4.4/dist/flowbite.js"></script>
        <script>
            var swiper = new Swiper(".mySwiper", {
                slidesPerView: 1,
                freeMode: true,
                loop: true,
                // centeredSlides: false,
                spaceBetween: 0,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                autoplay: {
                    delay: 2800,
                },

            });

            var swiper2 = new Swiper(".mySwiper2", {

                slidesPerView: 1,
                freeMode: true,
                loop: true,
                // centeredSlides: false,
                spaceBetween: 0,
                navigation: {
                    nextEl: ".swiper-button-next2",
                    prevEl: ".swiper-button-prev2",
                },
                autoplay: {
                    delay: 2800,
                },


            });
        </script>
        
        <script>
       

            $("#newsletter").on('change', function() {
                if ($(this).is(':checked')) {
                    $(this).attr('value', 'true');
                } else {
                    $(this).attr('value', 'false');
                }
            
                $('#newsletter').text($('#newsletter').val());
            });

            function clear() {
                 $('#email').val('');
                 $('#comments').val('');
                 $('#name').val('');
                 $('#country_id').val('');
                 $('#lastname').val('');
                 $('#phone').val('');
                 $('#company').val('');
                 $('#newsletter').attr('value', 'false');
            }

            // $(document).on('click', '#sendContact',
             function sendContact() {
                var email = $('#email').val();
                var comments = $('#comments').val();
                var name = $('#name').val();
                var country_id = $('#country_id').val();
                var lastname = $('#lastname').val();
                var phone = $('#phone').val();
                var company = $('#company').val();
                var newsletter = $('#newsletter').val();
                
                $.ajax({
                    url: '{{ route('contactUsers') }}',
                    method: 'POST',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{
                        email:email,
                        name:name,
                        country:country_id,
                        lastname:lastname,
                        phone:phone,
                        company:company,
                        comments:comments,
                        newsletter:newsletter
                    },
                    success: function (data) {
                        if (data.code == 200) {                   
                            toastr.success('Success', 'Registro realizado correctamente!')
                            $('#letstalkmodal').modal('hide'); 
                            clear();

                        } else if(data.code == 422)  {
                            toastr.warning('Warning', 'Registro realizado previamente!')
                        }else{
                            toastr.error('Error', data.error)
                            clear();
                        }
                    }
                });
            // });
            }

            $(document).on('click', '#openModal', function () {
                    $('#letstalkmodal').modal('show'); 
            });

            $(document).on('click', '#closeModal', function () {
                    $('#letstalkmodal').modal('hide'); 
            });

            
                // $(document).ready(function() {
                // 	// $("#content-slider").lightSlider({
                //     //     loop:true,
                //     //     keyPress:true
                //     // });
                //     $('#image-gallery').lightSlider({
                //         gallery:false,
                //         item:1,
                //         thumbItem:0,
                //         slideMargin: 0,
                //         adaptiveHeight: true,
                //         speed:2000,
                //         auto:true,
                //         loop:true,
                //         pause: 1000,
                //         // controls:true
                //         currentPagerPosition:'middle',
                //         onSliderLoad: function() {
                //             $('#image-gallery').removeClass('cS-hidden');
                //         }  
                //     });
                // });

                // $(document).ready(function() {
                //     $('#lightSlider').lightSlider({
                //         item: 3,
                //         slideMove: 1,
                //         slideMargin: 10,
                //         addClass: '',

                //         mode:"slide", // Type of transition 'slide' and 'fade'.
                //         useCSS:true, // If true LightSlider will use CSS transitions. if falls jquery animation will be used.
                //         speed: 1000, // Transition duration (in ms). 
                //         cssEasing: 'ease', // 'cubic-bezier(0.25, 0, 0.25, 1)'
                //         easing: 'linear', // The type of "easing". ex: 'linear', 'ease', 'ease-in', 'ease-out', 'ease-in-out', 'cubic-bezier(n,n,n,n)'.
                //         auto: false, // If true, the Slider will automatically start to play.
                //         pause: 3000, // The time (in ms) between each auto transition
                //         loop:true, // If false, will disable the ability to loop back to the beginning of the slide when on the last element.

                //         controls:true, // if controls:false, controls will not be added
                //         prevHtml:'', // custom text for prev control
                //         nextHtml:'', // custom text for next control
                //         rtl: false,
                //         keyPress:true, // Enable keyboard navigation
                //         adaptiveHeight: false,
                //         vertical: false,
                //         verticalHeight: 500,
                //         vThumbWidth: 100,
                //         thumbItem: 10,
                //         galleryMargin: 5,
                //         pager:true, // Enable pager option
                //         gallery:false, // Enable gallery mode
                //         thumbMargin:3, // Spacing between each thumbnails 
                //         currentPagerPosition:'middle', // 'left' OR 'middle', 'right'

                //         enableTouch: true,
                //         enableDrag: true,
                //         freeMove: false,
                //         swipeThreshold:40, // By setting the swipeThreshold you can set how far the user must swipe for the next/prev slide
                //         responsive: [],

                //         onBeforeStart: function($el) {},
                //         onSliderLoad: function($el) {},
                //         onBeforeSlide: function($el,scene) {},
                //         onAfterSlide: function($el,scene) {},
                //         onBeforeNextSlide: function($el,scene) {},
                //         onBeforePrevSlide: function($el,scene) {}
                //     });  
                // });

        </script>


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
                                        window.sessionStorage.setItem('readycdn',true);
                                        console.log("se ejecuto");
                                        // window.location.reload()
                                    }
                                }
                            });
                });
            // }
                
            
            });
</script> --}}
    </body>

</html>