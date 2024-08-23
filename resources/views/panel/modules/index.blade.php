@extends('panel.layouts.simple.master')
@section('title', 'Module Cards')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>{{__('List')}} {{__('Case')}} {{__('Modules')}}</h3> <br>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item"> {{__('Modules')}}</li>
<li class="breadcrumb-item active">{{__('List')}} {{__('Modules')}}</li>
@endsection

@section('content')
<div class="container-fluid">
    <h4>{{__('New Element')}} <a class="btn btn-outline-success"
            href="{{ route('modules.create') }}">{{__('here.')}}</a></h4>
    @if ($modules !== null && $modules->count() > 0)


    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID:</th>
                    <th>{{__('Name')}}:</th>
                    <th>{{__('Project')}}:</th>
                    <th>{{__('Type Module')}}:</th>
                    <th>{{__('Idioms')}}:</th>
                    <th>{{__('Countries')}}:</th>
                    <th>{{__('Cities')}}:</th>
                    <th>{{__('Show')}}:</th>
                    <th>{{__('Delete')}}:</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    @foreach ($modules as $module)
                    <th>{{ $module->id }}</th>
                    @if($module->name)
                    <th>{{ $module->name }}</th>
                    @else
                    <th>{{__('No Data')}}</th>
                    @endif

                    {{-- @if($module->order)
                    <th>{{ $module->order }}</th>
                    @else
                    <th>{{__('No Data')}}</th>
                    @endif --}}

                    @if($module->project_type_id)
                    <th>{{ App\Models\ProjectType::find($module->project_type_id)->name }}</th>
                    @else
                    <th>{{__('No Data')}}</th>
                    @endif

                    
                    @if($module->module_type_id)
                    <th>{{ App\Models\ModuleType::find($module->module_type_id)->name }}</th>
                    @else
                    <th>{{__('No Data')}}</th>
                    @endif

                    <th>
                        @foreach ($module->idioms as $idiom)
                        <span class="badge badge-secondary">{{__($idiom->name)}}</span>
                        @endforeach
                    </th>
                    <th>
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
                    </th>
                    <th>
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
                    </th>
                    {{-- <th class="counter"><a href="{{ route('modules.edit', $module->id) }}"
                            class="btn btn-outline-primary"><i data-feather="edit-2"></i></a></th> --}}
                    <th class="counter"><a href="{{ route('modules.show', $module->id) }}" class="btn btn-outline-info"><i
                                data-feather="eye"></i></a></th>
                    <th><span class="counter">
                            <form action="{{ route('modules.destroy', $module->id) }}" method="POST"
                                style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar este modulo?')"><i
                                        data-feather="trash-2"></i></button>
                            </form>
                        </span></th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p>No se encontraron modulos</p>
    @endif

</div>
@endsection

@section('script')
@endsection