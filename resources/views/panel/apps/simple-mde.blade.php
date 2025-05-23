@extends('panel.layouts.simple.master')
@section('title', 'MDE Editor')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/simple-mde.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>MDE Editor</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Editors</li>
<li class="breadcrumb-item active">MDE Editor</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<h5>First Example</h5>
				</div>
				<div class="card-body">
					<div id="editor_container">
						<textarea id="editable">Lorem ipsum dolor sit amet consectetur adipiscing elit maecenas congue, nisi suscipit curae auctor libero luctus est mauris, nostra torquent varius eros eget blandit pellentesque nascetur. Curabitur mauris porttitor sociosqu donec non phasellus posuere varius vestibulum rutrum a, sagittis mi magnis ridiculus commodo malesuada platea iaculis lobortis. Velit tristique suspendisse facilisis quis fames orci class, volutpat vestibulum porttitor mus pellentesque proin sagittis mattis, odio iaculis gravida id nam ut. Fusce convallis elementum quis parturient hendrerit enim tempus morbi, penatibus taciti interdum donec dictum dis rutrum, ac fames habitant sociis sociosqu dapibus faucibus. Habitant tellus mattis accumsan nisl porttitor nibh conubia turpis augue, eu egestas sodales platea placerat suscipit nunc magnis aenean feugiat, curae potenti aliquet justo etiam curabitur magna senectus. Accumsan potenti sapien nunc metus nascetur malesuada sodales ullamcorper quam congue, scelerisque in pretium sem massa interdum fames et hac, netus taciti vestibulum quisque ante gravida dictumst vitae elementum. Magna bibendum hac litora ante curae sagittis class magnis ut, ligula duis nibh rutrum venenatis facilisi suscipit ornare sapien, tempus volutpat egestas aenean maecenas luctus placerat porta. Orci sagittis non et purus habitant fusce euismod vulputate aptent augue elementum, cursus auctor nostra ultrices eu duis eget primis curae ut ligula faucibus, varius vehicula vestibulum lacus quam nulla viverra praesent at massa.
						Fusce cras urna netus montes ligula aenean tellus per congue, mollis pellentesque ante habitasse sed euismod tortor natoque potenti, aliquam odio ut est vitae nec interdum consequat. Inceptos in et blandit cras mollis mauris donec massa leo, enim varius placerat cum aliquet orci augue mus tortor cursus, sodales nec taciti suspendisse porta vestibulum libero eleifend. Placerat semper quam sapien erat suscipit accumsan tincidunt, turpis molestie penatibus himenaeos tortor posuere nostra, blandit tempor luctus ornare et ultricies. Aliquet praesent mi condimentum senectus ridiculus sociosqu est massa sagittis aenean ultrices taciti, per leo nisl in cursus interdum euismod justo cubilia maecenas convallis. At lobortis netus montes tempor quam egestas ut purus neque pharetra, rhoncus et bibendum suscipit ante posuere tincidunt gravida fermentum, proin primis ornare mus himenaeos cum felis pulvinar sapien.
						Risus pretium rutrum massa viverra per venenatis hac nec urna neque praesent, augue fusce mus dictum dapibus auctor mauris nunc fermentum laoreet proin cras, non erat ac iaculis cubilia leo vehicula ligula sodales cursus. Curabitur laoreet augue leo morbi nulla magnis facilisis penatibus, eget in quis duis mi sodales nunc erat gravida, tempor dis fermentum potenti hendrerit congue aenean. Torquent quis class elementum facilisis velit proin lacinia tempor sodales cursus, pulvinar eget magnis blandit primis ornare ultrices leo neque enim rutrum, nullam potenti viverra penatibus vel curae morbi in laoreet. Phasellus etiam facilisi pretium diam turpis tristique sociosqu mi in, commodo torquent accumsan mollis habitasse viverra aenean varius, id a dictumst molestie sollicitudin primis nisl duis. Quam litora tempor nisl nascetur convallis condimentum fermentum praesent suscipit venenatis eu aliquam, aptent nunc rhoncus velit maecenas vehicula mauris tristique fringilla tincidunt. Elementum nunc iaculis volutpat augue rhoncus eleifend tincidunt cras, nec scelerisque quis justo neque maecenas posuere purus pellentesque, eget lectus morbi ad penatibus phasellus suscipit suspendisse, fermentum in placerat arcu aptent eros aenean. Egestas dis iaculis fames torquent odio risus nulla, tempus habitant at ad aptent. Urna mollis class consequat tristique ultricies augue nulla, dictum cursus diam ultrices ornare curae odio aliquet, tempus cras iaculis curabitur vitae faucibus.
						Per libero curae parturient praesent cras sociosqu nunc primis, enim rhoncus suscipit sem turpis pellentesque nec magna lacinia, lacus odio duis non fermentum placerat fames. Molestie urna ante massa aliquet dui fermentum mattis, sagittis mauris nascetur class penatibus posuere ullamcorper, tempor varius cubilia inceptos ad sodales. Conubia per praesent vel mus est lacus erat leo sem velit pulvinar tellus, torquent montes aliquam eu sociosqu non nec risus facilisi aptent. Praesent libero magna luctus justo euismod fusce est vehicula sem congue, himenaeos facilisi laoreet quis class semper parturient nam cum nulla, dictum taciti interdum tellus sociosqu viverra lectus ligula lacinia. Molestie purus aliquet sodales sed curabitur mollis dis interdum habitant suscipit rutrum, vulputate metus eleifend primis lectus ornare placerat odio quis arcu. Vel sociosqu proin aliquam ac semper accumsan dui cubilia, dictum habitasse lacinia velit dictumst ut ornare et suscipit, fames phasellus dapibus ad curae enim odio. Vel erat tincidunt porta euismod vulputate laoreet molestie eu mattis, feugiat quis aliquam augue scelerisque tristique montes platea at, auctor torquent pulvinar cum luctus aliquet mauris commodo.
						Risus pretium rutrum massa viverra per venenatis hac nec urna neque praesent, augue fusce mus dictum dapibus auctor mauris nunc fermentum laoreet proin cras, non erat ac iaculis cubilia leo vehicula ligula sodales cursus. Curabitur laoreet augue leo morbi nulla magnis facilisis penatibus, eget in quis duis mi sodales nunc erat gravida, tempor dis fermentum potenti hendrerit congue aenean. Torquent quis class elementum facilisis velit proin lacinia tempor sodales cursus, pulvinar eget magnis blandit primis ornare ultrices leo neque enim rutrum, nullam potenti viverra penatibus vel curae morbi in laoreet. Phasellus etiam facilisi pretium diam turpis tristique sociosqu mi in, commodo torquent accumsan mollis habitasse viverra aenean varius, id a dictumst molestie sollicitudin primis nisl duis. Quam litora tempor nisl nascetur convallis condimentum fermentum praesent suscipit venenatis eu aliquam, aptent nunc rhoncus velit maecenas vehicula mauris tristique fringilla tincidunt. Elementum nunc iaculis volutpat augue rhoncus eleifend tincidunt cras, nec scelerisque quis justo neque maecenas posuere purus pellentesque, eget lectus morbi ad penatibus phasellus suscipit suspendisse, fermentum in placerat arcu aptent eros aenean. Egestas dis iaculis fames torquent odio risus nulla, tempus habitant at ad aptent. Urna mollis class consequat tristique ultricies augue nulla, dictum cursus diam ultrices ornare curae odio aliquet, tempus cras iaculis curabitur vitae faucibus.</textarea>
					</div>
					<div id="html_container"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<h5>Second Example</h5>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<textarea class="CodeMirror" id="smde"></textarea>
						</div>
						<div class="col-md-6 reader" id="write_here"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/editor/simple-mde/simplemde.min.js')}}"></script>
<script src="{{asset('assets/js/editor/simple-mde/simplemde.custom.js')}}"></script>
@endsection