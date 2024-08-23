@extends('panel.layouts.simple.master')
@section('title', 'Create Module Type')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3> {{__('Create')}} {{__('Module Types')}}</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item"> {{__('Module Types')}}</li>
<li class="breadcrumb-item active"> {{__('Create')}} {{__('Module Types')}}</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="edit-profile">
        <div class="row">

            <div class="col-xl-12">
                <form method="POST" action="{{ route('moduleTypes.store') }}" enctype="multipart/form-data" class="card">

                    @csrf
                    <div class="card-header">
                        {{-- <h4 class="card-title mb-0">{{ __('Create New Module Type') }}</h4> --}}
                        <div class="card-options"><a class="card-options-collapse" href="#"
                                data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                    class="fe fe-x"></i></a></div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                       
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">{{ __('Name') }}</label>

                                <div class="col-md-12">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                             <div class="col-md-6 mb-3">
                                <label for="link" class="form-label">{{ __('link') }}</label>

                                <div class="col-md-12">
                                    <input id="link" type="text"
                                        class="form-control @error('link') is-invalid @enderror" name="link"
                                        value="{{ old('link') }}" autocomplete="link" autofocus>

                                    @error('link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                    <label for="preview"
                                        class="form-label">{{ __('preview') }}</label>

                                    <div class="col-md-12">
                                        <img id="image-preview"
                                            src="{{asset('assets/images/imagen-no-disponible.jpg')}}"
                                            alt="Previsualización de la imagen" width="350px" />
                                        <br><br>

                                        <input onchange="previewImage(event)" id="preview"
                                            type="file"
                                            class="form-control @error('preview') is-invalid @enderror"
                                            name="preview">

                                        @error('preview')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="html" class="form-label">{{ __('Html') }}</label>

                                <div class="col-md-12">
                                    <textarea id="html" type="text" 
                                        class="form-control @error('html') is-invalid @enderror" name="html"
                                        value="{{ old('html') }}" ></textarea>

                                    @error('html')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                           
                            <div class="col-md-6 mb-3">
                                <label for="json_fields" class="form-label">{{ __('fields') }}</label>

                                <div class="col-md-12">
                                    <textarea id="json_fields" type="text" 
                                        class="form-control @error('json_fields') is-invalid @enderror" name="json_fields"
                                        value="{{ old('json_fields') }}" ></textarea>

                                    @error('json_fields')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                         

                            {{-- <div class="col-md-6 mb-3">
                                <label for="image"
                                    class="form-label">{{ __('Image') }}</label>

                                <div class="col-md-12">
                                    <input id="image" type="number" min="0"
                                        class="form-control @error('image') is-invalid @enderror"
                                        name="image">{{ old('image') }}

                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="video"
                                    class="form-label">{{ __('video') }}</label>

                                <div class="col-md-12">
                                    <input id="video" type="number" min="0"
                                        class="form-control @error('video') is-invalid @enderror"
                                        name="video">{{ old('video') }}

                                    @error('video')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="title"
                                    class="form-label">{{ __('title') }}</label>

                                <div class="col-md-12">
                                    <input id="title" type="number" min="0"
                                        class="form-control @error('title') is-invalid @enderror"
                                        name="title">{{ old('title') }}

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="subtitle"
                                    class="form-label">{{ __('subtitle') }}</label>

                                <div class="col-md-12">
                                    <input id="subtitle" type="number" min="0"
                                        class="form-control @error('subtitle') is-invalid @enderror"
                                        name="subtitle">{{ old('subtitle') }}

                                    @error('subtitle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="file"
                                    class="form-label">{{ __('file') }}</label>

                                <div class="col-md-12">
                                    <input id="file" type="number" min="0"
                                        class="form-control @error('file') is-invalid @enderror"
                                        name="file">{{ old('file') }}

                                    @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div> --}}
                          
                            {{-- @foreach ($idioms as $idiom)
                            <div class="card">
                                <div id="idiom-fields" class="row">
                                    <div id="idiom-{{$idiom->id}}">
                                        <label
                                            class="form-label"><strong>{{ __('Write Content At') }}{{__($idiom->name)}}</strong></label>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach --}}
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