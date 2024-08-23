@extends('panel.layouts.simple.master')
@section('title', 'Staff Cards')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>{{__('List')}} {{__('Staff')}}</h3> <br>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item"> {{__('Staff')}}</li>
<li class="breadcrumb-item active">{{__('List')}} {{__('Staff')}}</li>
@endsection

@section('content')
<div class="container-fluid">
    <h4>{{__('New Element')}} <a class="btn btn-outline-success"
            href="{{ route('staffs.create') }}">{{__('here.')}}</a></h4>
    @if ($staffs !== null && $staffs->count() > 0)


    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID:</th>
                    <th>{{__('Name')}}:</th>
                    <th>{{__('Linkedin')}}:</th>
                    <th>{{__('Idioms')}}:</th>
                    <th>{{__('Countries')}}:</th>
                    <th>{{__('Cities')}}:</th>
                    <th>{{__('Edit')}}:</th>
                    <th>{{__('Show')}}:</th>
                    <th>{{__('Delete')}}:</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    @foreach ($staffs as $staff)
                    <th>{{ $staff->id }}</th>
                    @if($staff->name)
                    <th>{{ $staff->name }}</th>
                    @else
                    <th>{{__('No Data')}}</th>
                    @endif
                    @if($staff->linkedin)
                    <th>{{ $staff->linkedin }}</th>
                    @else
                    <th>{{__('No Data')}}</th>
                    @endif
                    <th>
                        @foreach ($staff->idioms as $idiom)
                        <span class="badge badge-secondary">{{__($idiom->name)}}</span>
                        @endforeach
                    </th>
                    <th>
                        @if (is_array($staff->country_id))
                        @if(count($staff->country_id) > 0)
                        @foreach ($countries as $country)
                        @if (in_array($country->id, $staff->country_id))
                        <span class="badge badge-primary">{{ $country->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @else
                        @if ($staff->country_id)
                        @foreach ($countries as $country)
                        @if ($country->id == $staff->country_id)
                        <span class="badge badge-primary">{{ $country->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @endif
                    </th>
                    <th>
                        @if (is_array($staff->city_id))
                        @if(count($staff->city_id) > 0)
                        @foreach ($cities as $city)
                        @if (in_array($city->id, $staff->city_id))
                        <span class="badge badge-info">{{ $city->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @else
                        @if ($staff->city_id)
                        @foreach ($cities as $city)
                        @if ($city->id == $staff->city_id)
                        <span class="badge badge-info">{{ $city->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @endif
                    </th>
                    <th class="counter"><a href="{{ route('staffs.edit', $staff->id) }}"
                            class="btn btn-outline-primary"><i data-feather="edit-2"></i></a></th>
                    <th class="counter"><a href="{{ route('staffs.show', $staff->id) }}" class="btn btn-outline-info"><i
                                data-feather="eye"></i></a></th>
                    <th><span class="counter">
                            <form action="{{ route('staffs.destroy', $staff->id) }}" method="POST"
                                style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar esta data?')"><i
                                        data-feather="trash-2"></i></button>
                            </form>
                        </span></th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p>No se encontraron miembros del staff</p>
    @endif

</div>
@endsection

@section('script')
@endsection