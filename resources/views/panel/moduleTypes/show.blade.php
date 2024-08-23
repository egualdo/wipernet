@extends('panel.layouts.simple.master')
@section('title', 'Show Type Module')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3> {{__('Show')}} {{__('Module Types')}}</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item"> {{__('Module Types')}}</li>
<li class="breadcrumb-item active"> {{__('Show')}} {{__('Module Types')}}</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="edit-profile">
        <div class="row">

            <div class="col-xl-12">
                <form method="POST" action="{{ route('moduleTypes.update', $moduleType->id) }}" enctype="multipart/form-data"
                    class="card">

                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        {{-- <h4 class="card-title mb-0">{{ __('Show Module') }}</h4> --}}
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
                                    <input id="name" type="text" readonly
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name', $moduleType->name) }}" autocomplete="name" autofocus>

                                    {{-- @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror --}}
                                </div>
                            </div>


                            <div class="col-md-6 mb-3">
                                <label for="link" class="form-label">{{ __('Link') }}</label>

                                <div class="col-md-12">
                                    <input id="link" type="text" readonly
                                        class="form-control @error('link') is-invalid @enderror" name="link"
                                        value="{{ old('name', $moduleType->link) }}" autocomplete="link" autofocus>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="preview" class="form-label">{{ __('Preview') }}</label>

                                <div class="col-md-12">
                                    @if($moduleType->preview)
                                    <img id="image-preview" src="{{$moduleType->preview}}"
                                        alt="{{ __('Preview') }}" class="img-thumbnail">
                                    @else
                                    <img id="image-preview" src="{{asset('assets/images/imagen-no-disponible.jpg')}}"
                                        alt="{{ __('Preview') }}" class="img-thumbnail">
                                    @endif

                                    <br>
                                    {{-- <input onchange="previewImage(event)" id="preview" type="file"
                                        class="form-control mt-2 @error('preview') is-invalid @enderror" name="preview">
                                    @error('preview')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror --}}
                                </div>
                            </div>

                            {{--  <div class="col-md-6 mb-3">
                                <label for="text" class="form-label">{{ __('text') }}</label>

                                <div class="col-md-12">
                                    <input id="text" type="number"
                                        class="form-control @error('text') is-invalid @enderror" name="text"
                                        value="{{ old('text', $moduleType->text) }}" autocomplete="text" autofocus>

                                    @error('text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                         
                             <div class="col-md-6 mb-3">
                                <label for="image" class="form-label">{{ __('image') }}</label>

                                <div class="col-md-12">
                                    <input id="image" type="number"
                                        class="form-control @error('image') is-invalid @enderror" name="image"
                                        value="{{  $moduleType->image) }}" autocomplete="image" autofocus>

                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="video" class="form-label">{{ __('video') }}</label>

                                <div class="col-md-12">
                                    <input id="video" type="number"
                                        class="form-control @error('video') is-invalid @enderror" name="video"
                                        value="{{ old('video', $moduleType->video) }}" autocomplete="video" autofocus>

                                    @error('video')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="title" class="form-label">{{ __('title') }}</label>

                                <div class="col-md-12">
                                    <input id="title" type="number"
                                        class="form-control @error('title') is-invalid @enderror" name="title"
                                        value="{{ old('title', $moduleType->title) }}" autocomplete="title" autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="subtitle" class="form-label">{{ __('subtitle') }}</label>

                                <div class="col-md-12">
                                    <input id="subtitle" type="number"
                                        class="form-control @error('subtitle') is-invalid @enderror" name="subtitle"
                                        value="{{ old('subtitle', $moduleType->subtitle) }}" autocomplete="subtitle" autofocus>

                                    @error('subtitle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="file" class="form-label">{{ __('file') }}</label>

                                <div class="col-md-12">
                                    <input id="file" type="number"
                                        class="form-control @error('file') is-invalid @enderror" name="file"
                                        value="{{ old('file', $moduleType->file) }}" autocomplete="file" autofocus>

                                    @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div> --}}
                           
                    </div>
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