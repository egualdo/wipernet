@extends('panel.layouts.simple.master')
@section('title', 'Create cases')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3> {{__('Create')}} {{__('Cases')}}</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">{{__('Cases')}}</li>
<li class="breadcrumb-item active"> {{__('Create')}} {{__('Cases')}}</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="edit-profile">
        <div class="row">

            <div class="col-xl-12 ">
                <div class="card">
                 
                
               
                    <div class="card-header">
                        {{-- <h4 class="card-title mb-0">{{ __('Create New Case') }}</h4> --}}
                        <div class="card-options"><a class="card-options-collapse" href="#"
                                data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                    class="fe fe-x"></i></a></div>

                        <div class="col-md-12" style="margin-left: 90%">
                            <button class="btn btn-primary" onclick="handlePhoto()">Crear Tag</button>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('projectTypes.store') }}" enctype="multipart/form-data">
                        
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
                                            <option value="" disabled>{{ __('Select one or more languages') }}</option>
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


                                    <div class="col-md-6 mb-3">
                                                    <label for="name" class="form-label">{{ __('Name') }}</label>
                                                    <div class="col-md-12">
                                                        <input id="name" type="text"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            name="name" value="{{ old('name') }}">

                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                    </div>


                            
                                    <div class="col-md-6 mb-3" id="taskboard_view"></div>
                                    

                                <div class="col-md-6 mb-3">
                                    <label for="photo" class="form-label">{{ __('Photo') }}</label>

                                    <div class="col-md-12">
                                        <img id="image-preview" src="{{asset('assets/images/imagen-no-disponible.jpg')}}"
                                            alt="Previsualización de la imagen" class="img-thumbnail" /> <br><br>
                                        <input id="photo" onchange="previewImage(event)" type="file"
                                            class="form-control @error('photo') is-invalid @enderror" name="photo">

                                        @error('photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                @foreach ($idioms as $idiom)
                                <div class="card">
                                    <div id="idiom-fields" class="row">
                                        <div id="idiom-{{$idiom->id}}">
                                            <label
                                                class="form-label"><strong>{{ __('Write Content At') }}{{__($idiom->name)}}</strong></label>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="projectType_{{$idiom->id}}"
                                                        class="form-label">{{ __('Title') }}</label>

                                                    <div class="col-md-12">
                                                        <input id="projectType_{{$idiom->id}}" type="text"
                                                            class="form-control @error('projectType_es') is-invalid @enderror"
                                                            name="projectType_{{$idiom->id}}" value="{{ old('projectType_es') }}"
                                                            autocomplete="projectType_es" autofocus>

                                                        @error('projectType_es')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <br />
                                                    {{-- <label for="slug_{{$idiom->id}}"
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
                                                    </div> --}}
                                                </div>

                                                {{-- <div class="col-md-6 mb-3">
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
                                                </div> --}}
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
                                <button class="form-control" style="background-color:#19F7EB" onclick="guardar()" >{{ __('Guardar') }}</button>
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

    var clicked,updated,anchor;
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

    function ajaxFilterroleView() {
        var mainEle = $('#taskboard_view');
        var data = {
            view: '',
        }

        $.ajax({
            url: '{{ route('taskboardView') }}',
            data: data,
            success: function (result) {
                mainEle.html(result.html);
            }
        });
    }

    $(document).ready(function() {
        updateFields();
        ajaxFilterroleView();

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
                            ajaxFilterroleView();

                        } else if(data.code == 422)  {
                            toastr.warning('Warning', 'Registro realizado previamente!')
                            clearModal()
                            $('#exampleModal').modal('hide');
                            ajaxFilterroleView();

                        }else{
                            toastr.error('Error', data.error);
                            $('#exampleModal').modal('hide');
                            ajaxFilterroleView()
                        }
                    }
                });
            }
           


</script>
@endsection