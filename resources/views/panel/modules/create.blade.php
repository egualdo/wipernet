@extends('panel.layouts.simple.master')
@section('title', 'Create Module')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3> {{__('Create')}} {{__('Modules')}}</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">{{__('Modules')}}</li>
<li class="breadcrumb-item active"> {{__('Create')}} {{__('Modules')}}</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="edit-profile">
        <div class="row">

            <div class="col-xl-12">
                <form method="POST" action="{{ route('modules.store') }}" enctype="multipart/form-data" class="card">

                    @csrf
                    <div class="card-header">
                        {{-- <h4 class="card-title mb-0">{{ __('Create New Module') }}</h4> --}}
                        <div class="card-options"><a class="card-options-collapse" href="#"
                                data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                    class="fe fe-x"></i></a></div>

                                    @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="country_id" class="form-label">{{ __('Country') }}</label>
                                <div class="col-md-12">
                                    <input type="checkbox" id="checkbox1" >{{ __('All') }}
                                    <select required name="country_id[]" id="country_id" class="form-control select2"
                                        multiple>
                                        {{-- <option value="" disabled>{{ __('Select a country') }}</option> --}}
                                        @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
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
                                    <select required name="city_id[]" id="city_id" class="form-control select2"
                                        multiple>
                                        {{-- <option value="" disabled>{{ __('Select a city') }}</option> --}}
                                        @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
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
                                <label for="project_type_id" class="form-label">{{ __('Cases') }}</label>
                                <div class="col-md-12">
                                    <select  name="project_type_id" id="project_type_id" class="form-control select2">
                                        <option value="">{{ __('Select one or more Project Types') }}</option>
                                        @foreach ($projectTypes as $pt)
                                        <option value="{{ $pt->id }}">{{ $pt->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('project_type_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                             <div class="col-md-6 mb-3">
                                <label for="service_id" class="form-label">{{ __('Services') }}</label>
                                <div class="col-md-12">
                                    <select name="service_id" id="service_id" class="form-control select2">
                                        <option value="">{{ __('Select one or more Services') }}</option>
                                        @foreach ($services as $serv)
                                        <option value="{{ $serv->id }}">{{ $serv->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('service_id')
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
                                        <option value="{{ $idiom->id }}">{{__($idiom->name)}}</option>
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
                                <label for="module_type_id" class="form-label">{{ __('Module Type') }}</label>
                                <div class="col-md-12">
                                    <select required name="module_type_id" id="module_type_id" class="form-control select2">
                                        <option value="" disabled>{{ __('Select one or more module Types') }}</option>
                                        @foreach ($moduleTypes as $mt)
                                        <option value="{{ $mt->id }}">{{ $mt->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('module_type_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                           
                            {{-- //se tiene que repetir por idioma y dentro de eso se tiene que mostrar la interfaz de 
                            //cuando se selecciona el tipo de modulo y mostrar los campos segun la cantidad establecida
                            //en el tipo  --}}
                            
                                        
                            <div class="col-md-6 mb-3" id="previewdiv" hidden>
                             <label class="form-label">
                                <strong>Preview</strong>
                            </label>
                                <img src="" id="preview" style="width: 400px;height: 200px"/>
                            </div>

                          
                            @foreach ($idioms as $idiom)
                            <div class="card">
                                <div id="idiom-fields" class="row">
                                    <div id="idiom-{{$idiom->id}}">
                                        <label
                                            class="form-label"><strong>{{ __('Write Content At') }}{{__($idiom->name)}}</strong></label>
                                        <br>
                                        <div class="col-md-6 mb-3" hidden>
                                                <label for="macro_html"
                                                    class="form-label">{{ __('Html') }}</label>

                                                <div class="col-md-12">
                                                    <textarea id="macro_html"
                                                        class="form-control @error('macro_html') is-invalid @enderror"
                                                        name="macro_html">{{ old('macro_html') }}</textarea>

                                                    @error('macro_html')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                        </div>
                                        
                                        
                                            <div class="row" id="row_to_modify-{{$idiom->id}}">
                                               
                                            </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
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
        
        var idiom=[];
        updateFields();

        $('#idiom_id').change(function() {
            updateFields();
            idiom=$('#idiom_id').val()

        });

        $('.select2').select2();

        function deleteElement(father){

                for (let index = 0; index < idiom.length; index++) {
                        let fathernew = document.getElementById(father+idiom[index]);
                        if(fathernew != null){
                            fathernew.innerHTML = "";
                        }
                }
        }

        $(document).on("change", "#module_type_id", function (e) {
            let module_type_selected=$("#module_type_id").val();
                    const rols = [];
                    const aux = [];
                
                    @foreach (\App\Models\ModuleType::all() as $r)
                        var obj = {};
                        obj.id = '{{ $r->id }}'
                        obj.name = '{{ $r->name }}'
                        obj.preview = '{{ $r->preview }}'
                        obj.html = '{{ $r->html }}'
                        obj.json = '{{ $r->json_fields }}'
                       
                        rols.push(obj);
                    @endforeach

                    var size = rols.length
                
                    for (var i = 0;i < size;i++) {
                        if(Number(rols[i].id) == module_type_selected){
                            aux.push(rols[i]);
                        }
                    }

                        let image,url;
                        
                        if(aux[0].preview != null ){
                            image=aux[0].preview;
                            let value =image
                            url= value
                        }
                        
                        // let asset="{{asset("+'w'+")}}";
                        // let y=asset.replace("+&#039;",'')
                        // let x=y.replace('w&#039;+','')
                        // let complete=x+url;
                   
                        document.getElementById('preview').src=url
                        $('#previewdiv').removeAttr('hidden');


            let format=aux[0].json
            
            let format2= format.replace(/&quot;/g,'"')
            let format3=format2.replace('"[','[')
            let format4=format3.replace(/]"/g,']')
            let format5=JSON.parse(format4);
      

            let html=aux[0].html
            let html2= html.replace(/&quot;/g,'"')
            let html3=html2.replace(/&gt;/g,">")
            let html4=html3.replace(/&lt;/g,"<")
            

            let row= "row_to_modify-";
            deleteElement(row)
           

            addOptionsProjectPercent(row,module_type_selected,html4,format5)
        });
            
        function addOptionsProjectPercent(domElement, module_type,html,json) {

            for (let index = 0; index < idiom.length; index++) {
                //ciclo de idioma
          
                for (let j = 0; j < json.length; j++) {
                    const tag =json[j].tag
                        renderComponent(json,index,tag);    
                }
            }
        }

        function renderImg(json,index,tag) {

                            $('#row_to_modify-'+idiom[index]).append(
                                '<div class="col-md-6 mb-3" id="columns-type'+idiom[index]+'">');

                            $('#columns-type'+idiom[index]+'').append(
                                    '<label for="image_'+idiom[index]+'" class="form-label" >'+'image_'+idiom[index]+'</label>',
                                    '<input type="file"  class="form-control" id="'+'image_'+idiom[index]+'" name="'+'image_'+idiom[index]+'">',
                                    '</div>',
                                    '</div>'
                            ); 

        }

        function renderHeading(json,index,tag) {

                             $('#row_to_modify-'+idiom[index]).append(
                                                '<div class="col-md-6 mb-3" id="columns-type' +idiom[index]+ '">'
                                            );
                                            $('#columns-type' +idiom[index]+ '').append(
                                                    '<label for="title_' +idiom[index]+ '" class="form-label" >'+'title_' +idiom[index]+ '</label>',
                                                    '<input type="text"  class="form-control" id="'+'title_' +idiom[index]+ '" name="'+'title_' +idiom[index]+ '" >',
                                                    '</div>',
                                                    '</div>'
                                            ); 

        }

        function renderParagraph(json,index,tag) {

                             $('#row_to_modify-'+idiom[index]).append(
                                                '<div class="col-md-6 mb-3" id="columns-type' +idiom[index]+ '">'
                                            );
                                            $('#columns-type' +idiom[index]+ '').append(
                                                    '<label for="subtitle_' +idiom[index]+ '" class="form-label" >'+'subtitle_' +idiom[index]+ '</label>',
                                                    '<input type="text" class="form-control" id="'+'subtitle_' +idiom[index]+ '" name="'+'subtitle_' +idiom[index]+ '" >',
                                                    '</div>',
                                                    '</div>'
                                                    //value="'+'subtag_'+idiom[index] '"
                                            );  

        }

        function renderVideo(json,index,tag) {

                             $('#row_to_modify-'+idiom[index]).append(
                                                '<div class="col-md-6 mb-3" id="columns-type' +idiom[index]+ '">'
                                            );
                                            $('#columns-type' +idiom[index]+ '').append(
                                                    '<label for="video_' +idiom[index]+ '" class="form-label" >'+'video_' +idiom[index]+ '</label>',
                                                    '<input type="text" class="form-control" placeholder="video link" id="'+'video_' +idiom[index]+ '" name="'+'video_' +idiom[index]+ '" >',
                                                    '</div>',
                                                    '</div>'
                                            ); 

        }

        function renderText(json,index,tag) {
             $('#row_to_modify-'+idiom[index]).append(
                                                '<div class="col-md-6 mb-3" id="columns-type' +idiom[index]+ '">'
                                            );
                                            $('#columns-type' +idiom[index]+ '').append(
                                                    '<label for="text_' +idiom[index]+ '" class="form-label" >'+'text_' +idiom[index]+ '</label>',
                                                    '<input type="text" class="form-control" id="'+'text_' +idiom[index]+ '" name="'+'text_' +idiom[index]+ '" >',
                                                    '</div>',
                                                    '</div>'
                                                    //value="'+'text_' +idiom[index]+ '"
                                            ); 
        }

        function renderFile(json,index,tag) {
                       $('#row_to_modify-'+idiom[index]).append(
                                                '<div class="col-md-6 mb-3" id="columns-type' +idiom[index]+ '">'
                                            );
                                            $('#columns-type' +idiom[index]+ '').append(
                                                    '<label for="file_' +idiom[index]+ '" class="form-label" >'+'file_' +idiom[index]+ '</label>',
                                                    '<input type="file" class="form-control" id="'+'file_' +idiom[index]+ '" name="'+'file_' +idiom[index]+ '">',
                                                    '</div>',
                                                    '</div>'
                                            ); 
                                        
        }

        function renderLink(json,index,tag) {
             $('#row_to_modify-'+idiom[index]).append(
                                                '<div class="col-md-6 mb-3" id="columns-type' +idiom[index]+ '">'
                                            );
                                            $('#columns-type' +idiom[index]+ '').append(
                                                    '<label for="link_' +idiom[index]+ '" class="form-label" >'+'link_' +idiom[index]+ '</label>',
                                                    '<input type="text" class="form-control" id="'+'link_' +idiom[index]+ '" name="'+'link_' +idiom[index]+ '" >',
                                                    '</div>',
                                                    '</div>'
                                                    //value="'+'text_' +idiom[index]+ '"
                                            ); 
        }

        function renderComponent(json,index,tag) {
            
                switch (tag) {
                    case 'img':
                        return renderImg(json,index,tag)
                    case 'h':
                        return renderHeading(json,index,tag)
                     case 'p':
                        return renderParagraph(json,index,tag)
                    case 'videos':
                        return renderVideo(json,index,tag)
                    case 'files':
                        return renderFile(json,index,tag)
                    case 'text':
                        return renderText(json,index,tag)
                     case 'a':
                        return renderLink(json,index,tag)
                    default:
                        break;
                }

        }           

    });
    
</script>
@endsection