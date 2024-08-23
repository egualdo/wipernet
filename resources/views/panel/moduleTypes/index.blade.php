@extends('panel.layouts.simple.master')
@section('title', 'Module Cards')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>{{__('List')}} {{__('Module Types')}}</h3> <br>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item"> {{__('Module Types')}}</li>
<li class="breadcrumb-item active">{{__('Create')}} {{__('Module Types')}}</li>
@endsection

@section('content')
<div class="container-fluid">
    <h4>{{__('New Element')}} <a class="btn btn-outline-success"
            href="{{ route('moduleTypes.create') }}">{{__('here.')}}</a></h4>
    @if ($moduletypes !== null && $moduletypes->count() > 0)


    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID:</th>
                    <th>{{__('Name')}}:</th>
                    <th>{{__('Link')}}:</th>
                    <th>{{__('Texts')}}:</th>
                    <th>{{__('Photos')}}:</th>
                    <th>{{__('Videos')}}:</th>
                    <th>{{__('Title')}}:</th>
                    <th>{{__('Subtitle')}}:</th>
                    <th>{{__('File')}}:</th>
                    <th>{{__('Edit')}}:</th>
                    <th>{{__('Show')}}:</th>
                    <th>{{__('Delete')}}:</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    @foreach ($moduletypes as $module)

                    <th>{{ $module->id }}</th>
                    @if($module->name)
                    <th>{{ $module->name }}</th>
                    @else
                    <th>-</th>
                    @endif

                     @if($module->link)
                    <th>{{ $module->link }}</th>
                    @else
                    <th>-</th>
                    @endif

                    @if($module->text)
                    <th>{{ $module->text }}</th>
                    @else
                    <th>-</th>
                    @endif

                     @if($module->image)
                    <th>{{ $module->image }}</th>
                    @else
                    <th>-</th>
                    @endif

                    @if($module->video)
                    <th>{{ $module->video }}</th>
                    @else
                    <th>-</th>
                    @endif

                    @if($module->title)
                    <th>{{ $module->title }}</th>
                    @else
                    <th>-</th>
                    @endif

                     @if($module->subtitle)
                    <th>{{ $module->subtitle }}</th>
                    @else
                    <th>-</th>
                    @endif

                    @if($module->file)
                    <th>{{ $module->file }}</th>
                    @else
                    <th>-</th>
                    @endif


                   
                    
                    <th class="counter"><a href="{{ route('moduleTypes.edit', $module->id) }}"
                            class="btn btn-outline-primary"><i data-feather="edit-2"></i></a></th>
                    <th class="counter"><a href="{{ route('moduleTypes.show', $module->id) }}" class="btn btn-outline-info"><i
                                data-feather="eye"></i></a></th>
                    <th><span class="counter">
                            <form action="{{ route('moduleTypes.destroy', $module->id) }}" method="POST"
                                style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar este tipo de modulo?')"><i
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