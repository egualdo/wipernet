@extends('panel.layouts.simple.master')
@section('title', 'projectType Cards')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>{{__('List')}} {{__('Cases')}}</h3> <br>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item"> {{__('Cases')}}</li>
<li class="breadcrumb-item active">{{__('List')}} {{__('Cases')}}</li>
@endsection

@section('content')
<div class="container-fluid">
    <h4>{{__('New Element')}} <a class="btn btn-outline-success"
            href="{{ route('projectTypes.create') }}">{{__('here.')}}</a></h4>
    @if ($projectTypes !== null && $projectTypes->count() > 0)

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID:</th>
                    <th>{{__('Title')}}:</th>
                    <th>{{__('Idioms')}}:</th>
                    <th>{{__('Countries')}}:</th>
                    <th>{{__('Cities')}}:</th>
                    <th>{{__('Edit')}}:</th>
                    <th>{{__('Delete')}}:</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    @foreach ($projectTypes as $projectType)
                    <th>{{ $projectType->id }}</th>
                    <th>

                        @foreach(App\Models\ProjectTypesIdiom::where('project_type_id',$projectType->id)->get()
                        as $t)
                        <span class="badge badge-success">{{ $t->projectType }}</span>
                        @endforeach
                    </th>
                    <th>
                        @foreach ($projectType->idioms as $idiom)
                        <span class="badge badge-secondary">{{__($idiom->name)}}</span>
                        @endforeach
                    </th>
                    <th>
                        @if (is_array($projectType->country_id))
                        @if(count($projectType->country_id) > 0)
                        @foreach ($countries as $country)
                        @if (in_array($country->id, $projectType->country_id))
                        <span class="badge badge-primary">{{ $country->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @else
                        @if ($projectType->country_id)
                        @foreach ($countries as $country)
                        @if ($country->id == $projectType->country_id)
                        <span class="badge badge-primary">{{ $country->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @endif
                    </th>
                    <th>
                        @if (is_array($projectType->city_id))
                        @if(count($projectType->city_id) > 0)
                        @foreach ($cities as $city)
                        @if (in_array($city->id, $projectType->city_id))
                        <span class="badge badge-info">{{ $city->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @else
                        @if ($projectType->city_id)
                        @foreach ($cities as $city)
                        @if ($city->id == $projectType->city_id)
                        <span class="badge badge-info">{{ $city->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @endif
                    </th>
                    <th class="counter"><a href="{{ route('projectTypes.edit', $projectType->id) }}"
                            class="btn btn-outline-primary"><i data-feather="edit-2"></i></a></th>
                    
                    <th><span class="counter">
                            <form action="{{ route('projectTypes.destroy', $projectType->id) }}" method="POST"
                                style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar este tipo de proyecto?')"><i
                                        data-feather="trash-2"></i></button>
                            </form>
                        </span></th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p>No se encontraron Tipos de Proyectos</p>
    @endif
</div>
@endsection

@section('script')
@endsection