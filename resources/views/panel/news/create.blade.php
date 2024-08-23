@extends('panel.layouts.simple.master')
@section('title', 'Create News')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3> {{__('Create')}} {{__('News')}}</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item"> {{__('News')}}</li>
<li class="breadcrumb-item active"> {{__('Create')}} {{__('News')}}</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="edit-profile">
        <div class="row">

            <div class="col-xl-12">
               
                    <div class="card-header">
                        {{-- <h4 class="card-title mb-0">{{ __('Create New New') }}</h4> --}}
                        <div class="card-options"><a class="card-options-collapse" href="#"
                                data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                    class="fe fe-x"></i></a></div>

                                     <div class="col-md-12" style="margin-left: 90%">
                            <button class="btn btn-primary" onclick="handlePhoto()">Crear Tag</button>
                        </div>
                    </div>
                     <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data" class="card">
                    @csrf
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="country_id" class="form-label">{{ __('Country') }}</label>
                                <div class="col-md-12">
                                    <input type="checkbox" id="checkbox1" >{{ __('All') }}
                                    <select required name="country_id[]" id="country_id" class="form-control select2"
                                        multiple>
                                        {{-- <option value="" disabled>{{ __('Select a country') }}</option> --}}
                                        @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('country_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="city_id" class="form-label">{{ __('City') }}</label>
                                <div class="col-md-12">
                                <input type="checkbox" id="checkbox2" >{{ __('All') }}
                                    <select required name="city_id[]" id="city_id" class="form-control select2"
                                        multiple>
                                        {{-- <option value="" disabled>{{ __('Select a city') }}</option> --}}
                                        @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('city_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="idiom_id" class="form-label">{{ __('Language') }}</label>
                                <div class="col-md-12">
                                    <select required name="idiom_id[]" id="idiom_id" class="form-control select2"
                                        multiple>
                                        {{-- <option value="" disabled>{{ __('Select one or more languages') }}</option> --}}
                                        @foreach ($idioms as $idiom)
                                        <option value="{{ $idiom->id }}">{{__($idiom->name)}}</option>
                                        @endforeach
                                    </select>
                                    @error('idiom_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                             <div class="col-md-6 mb-3" id="taskboard_view"></div>
                            @foreach ($idioms as $idiom)
                            <div class="card">
                                <div id="idiom-fields" class="row">
                                    <div id="idiom-{{$idiom->id}}">
                                        <label
                                            class="form-label"><strong>{{ __('Write Content At') }}{{__($idiom->name)}}</strong></label>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="topic_{{$idiom->id}}" class="form-label">{{ __('Topic') }}</label>
                                                <div class="col-md-12">
                                                    <select required name="topic_{{$idiom->id}}" id="topic_{{$idiom->id}}" class="form-control select2">
                                                        {{-- <option value="" disabled>{{ __('Please Select one topic') }}</option> --}}
                                                        @foreach ($topics as $topic)
                                                        <option value="{{ $topic->id }}">{{ $topic->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('topic_{{$idiom->id}}')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>


                                                <label for="title_{{$idiom->id}}"
                                                    class="form-label">{{ __('Title') }}</label>

                                                <div class="col-md-12">
                                                    <input id="title_{{$idiom->id}}" type="text"
                                                        class="form-control @error('title_es') is-invalid @enderror"
                                                        name="title_{{$idiom->id}}" value="{{ old('title_es') }}"
                                                        autocomplete="title_es" autofocus>

                                                    @error('title_es')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <br/>
                                                <label for="subtitle_{{$idiom->id}}"
                                                    class="form-label">{{ __('Subtitle') }}</label>

                                                <div class="col-md-12">
                                                    <input id="subtitle_{{$idiom->id}}" type="text"
                                                        class="form-control @error('subtitle_es') is-invalid @enderror"
                                                        name="subtitle_{{$idiom->id}}" value="{{ old('subtitle_es') }}"
                                                        autocomplete="subtitle_es" autofocus>

                                                    @error('subtitle_es')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <br />
                                                <label for="slug_{{$idiom->id}}"
                                                    class="form-label">{{ __('Link') }}</label>

                                                <div class="col-md-12">
                                                    <input id="slug_{{$idiom->id}}" type="text"
                                                        class="form-control @error('slug_es') is-invalid @enderror"
                                                        name="slug_{{$idiom->id}}" value="{{ old('slug_es') }}">

                                                    @error('slug_es')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <br />
                                                <label for="autor_{{$idiom->id}}"
                                                    class="form-label">{{ __('Autor') }}</label>

                                                <div class="col-md-12">
                                                    <input id="autor_{{$idiom->id}}" type="text"
                                                        class="form-control @error('autor_es') is-invalid @enderror"
                                                        name="autor_{{$idiom->id}}" value="{{ old('autor_es') }}">

                                                    @error('autor_es')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <br />
                                                
                                                <label for="date_{{$idiom->id}}"
                                                    class="form-label">{{ __('date') }}</label>

                                                <div class="col-md-12">
                                                    <input id="date_{{$idiom->id}}" type="date"
                                                        class="form-control @error('date_es') is-invalid @enderror"
                                                        name="date_{{$idiom->id}}" value="{{ old('date_es') }}">

                                                    @error('date_es')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <br />
                                                <label for="photo_{{$idiom->id}}"
                                                    class="form-label">{{ __('Photo') }}</label>

                                                <div class="col-md-12">
                                                    <img id="image-preview_{{$idiom->id}}"
                                                        src="{{asset('assets/images/imagen-no-disponible.jpg')}}"
                                                        alt="Previsualización de la imagen" width="350px" />
                                                    <br><br>

                                                    <input onchange="previewImage(event)" id="photo_{{$idiom->id}}"
                                                        type="file"
                                                        class="form-control @error('photo_es') is-invalid @enderror"
                                                        name="photo_{{$idiom->id}}">

                                                    @error('photo_es')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="description_{{$idiom->id}}"
                                                    class="form-label">{{ __('Description') }}</label>

                                                <div class="col-md-12">
                                                    <textarea id="description_{{$idiom->id}}"
                                                        class="form-control @error('description_es') is-invalid @enderror"
                                                        name="description_{{$idiom->id}}">{{ old('description_es') }}</textarea>

                                                    @error('description_es')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <br />
                                                {{-- <label for="file_{{$idiom->id}}"
                                                    class="form-label">{{ __('File') }}</label>

                                                <div class="col-md-12">
                                                    <input id="file_{{$idiom->id}}" type="file"
                                                        class="form-control @error('file_es') is-invalid @enderror"
                                                        name="file_{{$idiom->id}}">

                                                    @error('file_es')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                 <br /> --}}
                                                <label for="linkedin_{{$idiom->id}}"
                                                    class="form-label">{{ __('Linkedin') }}</label>

                                                <div class="col-md-12">
                                                    <input id="linkedin_{{$idiom->id}}" type="text"
                                                        class="form-control @error('linkedin_es') is-invalid @enderror"
                                                        name="linkedin_{{$idiom->id}}" value="{{ old('linkedin_es') }}">

                                                    @error('linkedin_es')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>


                                                <br />
                                                <label for="facebook_{{$idiom->id}}"
                                                    class="form-label">{{ __('facebook') }}</label>

                                                <div class="col-md-12">
                                                    <input id="facebook_{{$idiom->id}}" type="text"
                                                        class="form-control @error('facebook_es') is-invalid @enderror"
                                                        name="facebook_{{$idiom->id}}" value="{{ old('facebook_es') }}">

                                                    @error('facebook_es')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>



                                                <br />
                                                <label for="twitter_{{$idiom->id}}"
                                                    class="form-label">{{ __('twitter') }}</label>

                                                <div class="col-md-12">
                                                    <input id="twitter_{{$idiom->id}}" type="text"
                                                        class="form-control @error('twitter_es') is-invalid @enderror"
                                                        name="twitter_{{$idiom->id}}" value="{{ old('twitter_es') }}">

                                                    @error('twitter_es')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                 <br />
                                                <label for="email_{{$idiom->id}}"
                                                    class="form-label">{{ __('Email') }}</label>

                                                <div class="col-md-12">
                                                    <input id="email_{{$idiom->id}}" type="email"
                                                        class="form-control @error('email_es') is-invalid @enderror"
                                                        name="email_{{$idiom->id}}" value="{{ old('email_es') }}">

                                                    @error('email_es')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button class="btn btn-primary" type="submit">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

       <div class="modal fade" style="top:20%" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Complete los datos </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    {{-- <div class="formulario"> --}}
                      
                            <input type="text" id="token" hidden value="{{ csrf_token() }}" />
                            <div class="row">

                                <div class="col-md-12">
                                    <label for="name_tag" class="form-label">{{ __('Name') }}</label>
                                    <div class="col-md-12">
                                    <input required type="text" name="name_tag" id="name_tag" class="form-control">
                                    </div>
                                </div>

                               
                            </div>

                            <div class="card-footer text-end">
                                <button class="form-control" style="background-color:#19F7EB" onclick="guardar()" >{{ __('Save') }}</button>
                            </div>
                        
                    {{-- </div> --}}

                   
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')
<script>
function updateFields() {
    var selectedIdioms = $('#idiom_id').val();

    // Muestra todos los campos de idioma
    $('#idiom-fields > div').removeClass('d-none');

    // Oculta los campos que no corresponden a los idiomas seleccionados
    $('#idiom-fields > div').each(function() {
        var id = $(this).attr('id').replace('idiom-', '');
        if (selectedIdioms.indexOf(id) === -1) {
            $(this).addClass('d-none');
        }
    });
}

function ajaxFilternewsView() {
        var mainEle = $('#taskboard_view');
        var data = {
            view: '',
        }

        $.ajax({
            url: '{{ route('taskboardViewnews') }}',
            data: data,
            success: function (result) {
                mainEle.html(result.html);
            }
        });
    }

$(document).ready(function() {
    updateFields();
    ajaxFilternewsView();

    $('#idiom_id').change(function() {
        updateFields();
    });
    $('.select2').select2();
});

    function handlePhoto(){
            $('#exampleModal').modal('show'); 
    }


    function clearModal(){
        $('#name_tag').val('');
    }

            
            function guardar() {

                var name = $('#name_tag').val();
                // console.log(name)
                    
                $.ajax({
                    url: '{{ route('storeFront') }}',
                    method: 'POST',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('#token').val()
                    },
                    data:{
                        name:name,
                    },
                    success: function (data) {

                        if (data.code == 200) {
                            toastr.success('Success', 'Registro realizado correctamente!')
                            clearModal()
                            $('#exampleModal').modal('hide');
                            ajaxFilternewsView();

                        } else if(data.code == 422)  {
                            toastr.warning('Warning', 'Registro realizado previamente!')
                            clearModal()
                            $('#exampleModal').modal('hide');
                            ajaxFilternewsView();

                        }else{
                            toastr.error('Error', data.error);
                            $('#exampleModal').modal('hide');
                            ajaxFilternewsView()
                        }
                    }
                });
            }
</script>
@endsection