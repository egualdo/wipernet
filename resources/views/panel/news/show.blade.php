@extends('panel.layouts.simple.master')
@section('title', 'Show News')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3> {{__('Show')}} {{__('News')}}</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">{{__('News')}}</li>
<li class="breadcrumb-item active"> {{__('Show')}} {{__('News')}}</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="edit-profile">
        <div class="row">

            <div class="col-xl-12">
                <form class="card">

                    {{-- @csrf
                    @method('PUT') --}}
                    <div class="card-header">
                        {{-- <h4 class="card-title mb-0">{{ __('News') }}</h4> --}}
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
                                    @if (is_array($new->country_id))
                                    @if(count($new->country_id) > 0)
                                    @foreach ($countries as $country)
                                    @if (in_array($country->id, $new->country_id))
                                    <span class="badge badge-primary">{{ $country->name }}</span>
                                    @endif
                                    @endforeach
                                    @else
                                    {{__('No Data')}}
                                    @endif
                                    @else
                                    @if ($new->country_id)
                                    @foreach ($countries as $country)
                                    @if ($country->id == $new->country_id)
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

                                    @if (is_array($new->city_id))
                                    @if(count($new->city_id) > 0)
                                    @foreach ($cities as $city)
                                    @if (in_array($city->id, $new->city_id))
                                    <span class="badge badge-info">{{ $city->name }}</span>
                                    @endif
                                    @endforeach
                                    @else
                                    {{__('No Data')}}
                                    @endif
                                    @else
                                    @if ($new->city_id)
                                    @foreach ($cities as $city)
                                    @if ($city->id == $new->city_id)
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

                                    @foreach ($new->idioms as $idiom)
                                    <span class="badge badge-secondary">{{__($idiom->name)}}</span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <br />
                                                {{-- <label for="photo_{{$idiom->id}}"
                                                    class="form-label"><strong>{{ __('Photo') }}</strong></label>

                                                <div class="col-md-12">
                                                    @if($new->photo)
                                                    <img id="image-preview" src="{{ asset('/' . $new->photo) }}"
                                                        class="img-thumbnail" alt="Previsualización de la imagen" />
                                                    <br><br>
                                                    @else
                                                    <img id="image-preview"
                                                        src="{{asset('assets/images/imagen-no-disponible.jpg')}}"
                                                        class="img-thumbnail" alt="Previsualización de la imagen" />
                                                    <br><br>
                                                    @endif

                                                </div> --}}
                            </div>
                            @for($i=0;$i< count($array_data);$i++) <div class="card">

                                <div id="idiom-fields" class="row">
                                    <div id="idiom-{{$array_data[$i][0]->idiom_id}}">
                                        <label
                                            class="form-label"><strong>{{ __('Write Content At') }}{{$array_data[$i][0]->idiom->name}}</strong></label>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="title_{{$idiom->id}}"
                                                    class="form-label"><strong>{{ __('Title') }}</strong></label>

                                                <div class="col-md-12">
                                                    <p>{{$array_data[$i][0]->title}}</p>

                                                    @error('title_es')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <br />
                                                <label for="subtitle_{{$idiom->id}}"
                                                    class="form-label"><strong>{{ __('Subtitle') }}</strong></label>

                                                <div class="col-md-12">
                                                    <p>{{$array_data[$i][0]->subtitle}}</p>

                                                    @error('subtitle_es')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <br/>
                                                <label for="slug_{{$idiom->id}}"
                                                    class="form-label"><strong>{{ __('Link') }}</strong></label>

                                                <div class="col-md-12">
                                                    <p>{{$array_data[$i][0]->slug}}</p>
                                                    @error('slug_es')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                 <br />
                                                <label for="autor_{{$idiom->id}}"
                                                    class="form-label"><strong>{{ __('Autor') }}</strong></label>

                                                <div class="col-md-12">
                                                    <p>{{$array_data[$i][0]->autor}}</p>

                                                    @error('autor_es')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                 <br />
                                                <label for="date_{{$idiom->id}}"
                                                    class="form-label"><strong>{{ __('date') }}</strong></label>

                                                <div class="col-md-12">
                                                    <p>{{$array_data[$i][0]->date}}</p>

                                                    @error('date_es')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="description_{{$idiom->id}}"
                                                    class="form-label"><strong>{{ __('Description') }}</strong></label>

                                                <div class="col-md-12">
                                                    <p>{!! $array_data[$i][0]->description !!}</p>
                                                    @error('description_es')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <br />
                                                <label for="linkedin_{{$idiom->id}}"
                                                    class="form-label"><strong>{{ __('linkedin') }}</strong></label>

                                                <div class="col-md-12">
                                                    <p>{{$array_data[$i][0]->linkedin}}</p>

                                                    @error('linkedin_es')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <br />
                                                <label for="facebook_{{$idiom->id}}"
                                                    class="form-label"><strong>{{ __('facebook') }}</strong></label>

                                                <div class="col-md-12">
                                                    <p>{{$array_data[$i][0]->facebook}}</p>

                                                    @error('facebook_es')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <br />
                                                <label for="twitter_{{$idiom->id}}"
                                                    class="form-label"><strong>{{ __('twitter') }}</strong></label>

                                                <div class="col-md-12">
                                                    <p>{{$array_data[$i][0]->twitter}}</p>

                                                    @error('twitter_es')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <br />
                                                <label for="email_{{$idiom->id}}"
                                                    class="form-label"><strong>{{ __('Email') }}</strong></label>

                                                <div class="col-md-12">
                                                    <p>{{$array_data[$i][0]->email}}</p>

                                                    @error('email_es')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <br />
                                                <label for="topic_{{$idiom->id}}"
                                                    class="form-label"><strong>{{ __('Topic') }}</strong></label>

                                                <div class="col-md-12">
                                                    <p>{{App\Models\Topic::find($array_data[$i][0]->topic)->name}}</p>

                                                    @error('topic_es')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>


                                            </div>

                                            <div class="col-md-6 mb-3">
                                                 <label for="photo_{{$idiom->id}}" class="form-label">{{ __('Photo') }}</label>

                                                <div class="col-md-12">
                                                    @if($array_data[$i][0]->photo != null)
                                                    <img id="image-preview_{{$idiom->id}}"
                                                     src="{{  $array_data[$i][0]->photo }}"
                                                        alt="{{ __('Preview') }}" class="img-thumbnail"> <br>
                                                    @else
                                                    <img id="image-preview_{{$idiom->id}}"
                                                     src="{{asset('assets/images/imagen-no-disponible.jpg')}}"
                                                        alt="{{ __('Preview') }}" class="img-thumbnail"> <br>
                                                    @endif
                                                    {{-- <input onchange="previewImage(event)" id="photo_{{$idiom->id}}" type="file"
                                                        class="form-control @error('photo') is-invalid @enderror" name="photo_{{$idiom->id}}"
                                                        value="{{$array_data[$i][0]->photo}}"> --}}

                                                    @error('photo')
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
                        @endfor
                    </div>
            </div>
            </form>
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