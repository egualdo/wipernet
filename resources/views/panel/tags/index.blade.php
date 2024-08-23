@extends('panel.layouts.simple.master')
@section('title', 'tag Cards')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>{{__('List')}} {{__('Tags')}}</h3> <br>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item"> {{__('Tags')}}</li>
<li class="breadcrumb-item active">{{__('List')}} {{__('Tags')}}</li>
@endsection

@section('content')
<div class="container-fluid">
    <h4>{{__('New Element')}} <a class="btn btn-outline-success"
            href="{{ route('tags.create') }}">{{__('here.')}}</a></h4>
    @if ($tags !== null && $tags->count() > 0)


    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID:</th>
                    <th>{{__('Name')}}:</th>
                    <th>{{__('Edit')}}:</th>
                    <th>{{__('Show')}}:</th>
                    <th>{{__('Delete')}}:</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    @foreach ($tags as $tag)
                    <th>{{ $tag->id }}</th>
                    @if($tag->name)
                    <th>{{ $tag->name }}</th>
                    @else
                    <th>{{__('No Data')}}</th>
                    @endif
                   
                   
                   
                   
                    <th class="counter"><a href="{{ route('tags.edit', $tag->id) }}"
                            class="btn btn-outline-primary"><i data-feather="edit-2"></i></a></th>
                    <th class="counter"><a href="{{ route('tags.show', $tag->id) }}" class="btn btn-outline-info"><i
                                data-feather="eye"></i></a></th>
                    <th><span class="counter">
                            <form action="{{ route('tags.destroy', $tag->id) }}" method="POST"
                                style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar este data?')"><i
                                        data-feather="trash-2"></i></button>
                            </form>
                        </span></th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p>No se encontraron miembros del tag</p>
    @endif

</div>
@endsection

@section('script')
@endsection