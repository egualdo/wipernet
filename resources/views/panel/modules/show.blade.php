@extends('panel.layouts.simple.master')
@section('title', 'Show Module')

@section('css')
{{-- <link href="{{ asset('homePublic/css/casos-page/video-campana.css') }}" rel="stylesheet">
<link href="{{ asset('homePublic/css/casos-page/packaging.css') }}" rel="stylesheet">
<link href="{{ asset('homePublic/css/casos-page/rebrand.css') }}" rel="stylesheet">
<link href="{{ asset('homePublic/css/casos-page/top.css') }}" rel="stylesheet">
<link href="{{asset('homePublic/css/services-page/casos.css')}} " rel="stylesheet"> --}}
@endsection

@section('style')
<style>
 .img-herramientas > img{
            width: 90%;
        }
    
</style>
@endsection

@section('breadcrumb-title')
<h3> {{__('Show')}} {{__('Modules')}}</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item"> {{__('Modules')}}</li>
<li class="breadcrumb-item active"> {{__('Show')}} {{__('Modules')}}</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="edit-profile">
        <div class="row">

            <div class="col-xl-12">
                <form method="POST" action="{{ route('modules.update', $module->id) }}" enctype="multipart/form-data"
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
                                <label for="country_id" class="form-label"><strong>{{ __('Country') }}</strong></label>
                                <div class="col-md-12">
                                    @if (is_array($module->country_id))
                                    @if(count($module->country_id) > 0)
                                    @foreach ($countries as $country)
                                    @if (in_array($country->id, $module->country_id))
                                    <span class="badge badge-primary">{{ $country->name }}</span>
                                    @endif
                                    @endforeach
                                    @else
                                    {{__('No Data')}}
                                    @endif
                                    @else
                                    @if ($module->country_id)
                                    @foreach ($countries as $country)
                                    @if ($country->id == $module->country_id)
                                    <span class="badge badge-primary">{{ $country->name }}</span>
                                    @endif
                                    @endforeach
                                    @else
                                    {{__('No Data')}}
                                    @endif
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="city_id" class="form-label"><strong>{{ __('City') }}</strong></label>
                                <div class="col-md-12">

                                    @if (is_array($module->city_id))
                                    @if(count($module->city_id) > 0)
                                    @foreach ($cities as $city)
                                    @if (in_array($city->id, $module->city_id))
                                    <span class="badge badge-info">{{ $city->name }}</span>
                                    @endif
                                    @endforeach
                                    @else
                                    {{__('No Data')}}
                                    @endif
                                    @else
                                    @if ($module->city_id)
                                    @foreach ($cities as $city)
                                    @if ($city->id == $module->city_id)
                                    <span class="badge badge-info">{{ $city->name }}</span>
                                    @endif
                                    @endforeach
                                    @else
                                    {{__('No Data')}}
                                    @endif
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="city_id" class="form-label"><strong>{{ __('Idiom') }}</strong></label>
                                <div class="col-md-12">

                                    @foreach ($module->idioms as $idiom)
                                    <span class="badge badge-secondary">{{__($idiom->name)}}</span>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label"><strong>{{ __('Name') }}</strong></label>

                                <div class="col-md-12">
                                    <p>{{$module->name}}</p>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="project_type_id" class="form-label"><strong>{{ __('Cases') }}</strong></label>
                                @if ($module->project_type_id != null)
                                    
                                <div class="col-md-12">
                                    <p>{{App\Models\ProjectType::find($module->project_type_id)->name}}</p>
                                    @error('project_type_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                @endif
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="module_type_id" class="form-label"><strong>{{ __('Module Type') }}</strong></label>

                                <div class="col-md-12">
                                    <p>{{App\Models\ModuleType::find($module->module_type_id)->name}}</p>
                                    @error('module_type_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="container">
                                    <div class="row">
                                    
                                        <div class="col-12 img-min" >
                                            @foreach ($module->idioms as $idiom)
                                                @foreach(App\Models\ModuleIdiom::where('module_id',$module->id)->where('idiom_id',$idiom->id)->get() as $mi)
                                                    
                                                        <label for="html" class="form-label"><strong>{{ 'contenido en:'." ".App\Models\Idiom::find($idiom->id)->name }}</strong></label>
                                                        <br>
                                                        {!!json_decode($mi->html)!!}
                                                        <br>
                                                    
                                                @endforeach
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
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
    $('#idiom-html > img').addClass("img-thumbnail");
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