@extends('panel.layouts.simple.master')
@section('title', 'Edit Services')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3> {{__('Edit')}} {{__('Services')}}</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">{{__('Services')}}</li>
<li class="breadcrumb-item active"> {{__('Edit')}} {{__('Services')}}</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="edit-profile">
        <div class="row">
            <div class="col-xl-12">
                <form method="POST" action="{{ route('service.update', $service->id) }}" enctype="multipart/form-data"
                    class="card">

                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        {{-- <h4 class="card-title mb-0">{{ __('Edit Service') }}</h4> --}}
                        <div class="card-options"><a class="card-options-collapse" href="#"
                                data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                    class="fe fe-x"></i></a></div>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="country_id" class="form-label">{{ __('Country') }}</label>
                                <div class="col-md-12">
                                    <input type="checkbox" id="checkbox1" >{{ __('All') }}
                                    <select   name="country_id[]" id="country_id" class="form-control select2"
                                        multiple>
                                        {{-- <option value="" disabled>{{ __('Select one or more countries') }}</option> --}}
                                        @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" {{ in_array($country->id,
                                            $service->country_id) ? 'selected' : '' }}>{{ $country->name }}</option>
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

                                    <select   name="city_id[]" id="city_id" class="form-control select2"
                                        multiple>
                                        {{-- <option value="" disabled>{{ __('Select one or more cities') }}</option> --}}
                                        @foreach ($cities as $city)
                                        <option value="{{ $city->id }}" {{ in_array($city->id, $service->city_id) ?
                                            'selected' : '' }}>{{ $city->name }}</option>
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
                                        <option value="{{ $idiom->id }}" {{in_array($idiom->id, $idiomsSelect) ?
                                            'selected' : '' }}>{{__($idiom->name)}}</option>
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
                                                <label for="name"
                                                    class="form-label">{{ __('Name') }}</label>

                                                <div class="col-md-12">
                                                    <input id="name" type="text"
                                                        class="form-control"
                                                        name="name" value="{{ $service->name }}"
                                                        autocomplete="name" autofocus>

                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="photo" class="form-label">{{ __('Photo') }}</label>

                                <div class="col-md-12">
                                                    @if($service->photo != null && $service->photo != '')
                                                    <img id="image-preview"src="{{  $service->photo }}"
                                                        alt="{{ __('Preview') }}" class="img-thumbnail"> 
                                                    @else
                                                    <img id="image-preview" src="{{asset('assets/images/imagen-no-disponible.jpg')}}"
                                                        alt="{{ __('Preview') }}" class="img-thumbnail"> 
                                                    @endif

                                    <input onchange="previewImage(event)" id="photo" type="file"
                                        class="form-control @error('photo') is-invalid @enderror" name="photo">
                                    @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>

                             <div class="col-md-6 mb-3">
                                <label for="tags" class="form-label">{{ __('Tags') }}</label>
                                    <div class="col-md-12">
                                        <select  name="tags[]" id="tags" class="form-control select2"
                                            multiple>
                                            <option value="" disabled>{{ __('Select one or more tags') }}</option>
                                            @foreach (App\Models\Tags::all() as $tag)
                                            <option value="{{ $tag->id }}" {{ in_array($tag->id,$tags) ? 'selected' : '' }}>
                                                {{ $tag->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('tags')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div> 
                            </div>

                        </div>

                        @for($i=0;$i< count($array_data);$i++) 
                           
                                <div id="idiom-fields" class="row">
                                    <div id="idiom-{{$array_data[$i][0]->idiom_id}}">
                                        <label
                                            class="form-label"><strong>{{ __('Write Content At') }}{{$array_data[$i][0]->idiom->name}}</strong></label>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="title_{{$array_data[$i][0]->idiom_id}}"
                                                    class="form-label">{{ __('Title') }}</label>

                                                <div class="col-md-12">
                                                    <input id="title_{{$array_data[$i][0]->idiom_id}}" type="text"
                                                        class="form-control @error('title_es') is-invalid @enderror"
                                                        name="title_{{$array_data[$i][0]->idiom_id}}"
                                                        value="{{$array_data[$i][0]->title}}" autocomplete=" title_es"
                                                        autofocus>

                                                    @error('title_es')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <br />
                                                <label for="slug_{{$array_data[$i][0]->idiom_id}}"
                                                    class="form-label">{{ __('Link') }}</label>

                                                <div class="col-md-12">
                                                    <input id="slug_{{$array_data[$i][0]->idiom_id}}" type="text"
                                                        class="form-control @error('slug_es') is-invalid @enderror"
                                                        name="slug_{{$array_data[$i][0]->idiom_id}}"
                                                        value="{{$array_data[$i][0]->slug}}">

                                                    @error('slug_es')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <br />

                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="description_{{$array_data[$i][0]->idiom_id}}"
                                                    class="form-label">{{ __('Description') }}</label>

                                                <div class="col-md-12">
                                                    <textarea id="description_{{$array_data[$i][0]->idiom_id}}"
                                                        class="form-control @error('description_es') is-invalid @enderror"
                                                        name="description_{{$array_data[$i][0]->idiom_id}}">{{$array_data[$i][0]->description}}</textarea>

                                                    @error('description_es')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <br />



                                            </div>
                                        </div>
                                    </div>
                                </div>

                        @endfor

                        

                    </div>
                    

                    <div class="card-footer text-end">
                        <button class="btn btn-primary" type="submit">{{ __('Edit') }}</button>
                    </div>
                </form>
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

$(document).ready(function() {
    updateFields();

    $('#idiom_id').change(function() {
        updateFields();
    });
    $('.select2').select2();
});
</script>
@endsection