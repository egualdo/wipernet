@extends('panel.layouts.simple.master')
@section('title', 'Raised Buttons')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/prism.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Raised Buttons</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Buttons</li>
<li class="breadcrumb-item active">Raised Buttons</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<h5>Default buttons</h5>
					<div class="card-header-right">
						<ul class="list-unstyled card-option">
							<li><i class="fa fa-spin fa-cog"></i></li>
							<li><i class="view-html fa fa-code"></i></li>
							<li><i class="icofont icofont-maximize full-card"></i></li>
							<li><i class="icofont icofont-minus minimize-card"></i></li>
							<li><i class="icofont icofont-refresh reload-card"></i></li>
							<li><i class="icofont icofont-error close-card"></i></li>
						</ul>
					</div>
					<span>Add <code>.btn-pill</code> and <code>.btn-air-*</code> class  for raised button</span>
				</div>
				<div class="card-body btn-showcase">
					<button class="btn btn-pill btn-primary btn-air-primary" type="button">Primary Button</button>
					<button class="btn btn-pill btn-secondary btn-air-secondary btn-air-secondary" type="button">Secondary Button</button>
					<button class="btn btn-pill btn-success btn-air-success btn-air-success" type="button">Success Button</button>
					<button class="btn btn-pill btn-info btn-air-info btn-air-info" type="button">Info Button</button>
					<button class="btn btn-pill btn-warning btn-air-warning btn-air-warning" type="button">Warning Button</button>
					<button class="btn btn-pill btn-danger btn-air-danger" type="button">Danger Button</button>
					<button class="btn btn-pill btn-light btn-air-light" type="button">Light Button</button>
					<div class="code-box-copy">
						<button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
						<pre><code class="language-html" id="example-head">&lt;!-- Cod Box Copy begin --&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-primary btn-air-primary&quot;&gt;Primary button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-secondary btn-air-secondary&quot;&gt;Secondary button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-success btn-air-success&quot;&gt;Success button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-info btn-air-info&quot;&gt;Info button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-warning btn-air-warning&quot;&gt;Warning button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-danger btn-air-danger&quot;&gt;Danger button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-light btn-air-light&quot;&gt;Light button&lt;/button&gt;
&lt;!-- Cod Box Copy end --&gt;</code></pre>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<h5>Large buttons</h5>
					<div class="card-header-right">
						<ul class="list-unstyled card-option">
							<li><i class="fa fa-spin fa-cog"></i></li>
							<li><i class="view-html fa fa-code"></i></li>
							<li><i class="icofont icofont-maximize full-card"></i></li>
							<li><i class="icofont icofont-minus minimize-card"></i></li>
							<li><i class="icofont icofont-refresh reload-card"></i></li>
							<li><i class="icofont icofont-error close-card"></i></li>
						</ul>
					</div>
					<span>Add <code>.btn-pill</code>,<code>.btn-air-*</code> and <code>.btn-lg</code> class for large button</span>
				</div>
				<div class="card-body btn-showcase">
					<button class="btn btn-pill btn-primary btn-air-primary btn-lg" type="button">Primary Button</button>
					<button class="btn btn-pill btn-secondary btn-air-secondary btn-lg" type="button">Secondary Button</button>
					<button class="btn btn-pill btn-success btn-air-success btn-lg" type="button">Success Button</button>
					<button class="btn btn-pill btn-info btn-air-info btn-lg" type="button">Info Button</button>
					<button class="btn btn-pill btn-warning btn-air-warning btn-lg" type="button">Warning Button</button>
					<button class="btn btn-pill btn-danger btn-air-danger btn-lg" type="button">Danger Button</button>
					<button class="btn btn-pill btn-light btn-air-light btn-lg" type="button">Light Button</button>
					<div class="code-box-copy">
						<button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head1" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
						<pre><code class="language-html" id="example-head1">&lt;!-- Cod Box Copy begin --&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-primary btn-air-primary btn-lg&quot;&gt;Primary button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-secondary btn-air-secondary btn-lg&quot;&gt;Secondary button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-success btn-air-success btn-lg&quot;&gt;Success button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-info btn-air-info btn-lg&quot;&gt;Info button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-warning btn-air-warning btn-lg&quot;&gt;Warning button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-danger btn-air-danger btn-lg&quot;&gt;Danger button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-light btn-air-light btn-lg&quot;&gt;Light button&lt;/button&gt;
&lt;!-- Cod Box Copy end --&gt;</code></pre>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<h5>Small buttons</h5>
					<div class="card-header-right">
						<ul class="list-unstyled card-option">
							<li><i class="fa fa-spin fa-cog"></i></li>
							<li><i class="view-html fa fa-code"></i></li>
							<li><i class="icofont icofont-maximize full-card"></i></li>
							<li><i class="icofont icofont-minus minimize-card"></i></li>
							<li><i class="icofont icofont-refresh reload-card"></i></li>
							<li><i class="icofont icofont-error close-card"></i></li>
						</ul>
					</div>
					<span>Add <code>.btn-pill</code>,<code>.btn-air-*</code> and <code>.btn-sm</code> class for small button</span>
				</div>
				<div class="card-body btn-showcase">
					<button class="btn btn-pill btn-primary btn-air-primary btn-sm" type="button">Primary Button</button>
					<button class="btn btn-pill btn-secondary btn-air-secondary btn-sm" type="button">Secondary Button</button>
					<button class="btn btn-pill btn-success btn-air-success btn-sm" type="button">Success Button</button>
					<button class="btn btn-pill btn-info btn-air-info btn-sm" type="button">Info Button</button>
					<button class="btn btn-pill btn-warning btn-air-warning btn-sm" type="button">Warning Button</button>
					<button class="btn btn-pill btn-danger btn-air-danger btn-sm" type="button">Danger Button</button>
					<button class="btn btn-pill btn-light btn-air-light btn-sm" type="button">Light Button</button>
					<div class="code-box-copy">
						<button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head2" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
						<pre><code class="language-html" id="example-head2">&lt;!-- Cod Box Copy begin --&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-primary btn-air-primary btn-sm&quot;&gt;Primary button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-secondary btn-air-secondary btn-sm&quot;&gt;Secondary button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-success btn-air-success btn-sm&quot;&gt;Success button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-info btn-air-info btn-sm&quot;&gt;Info button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-warning btn-air-warning btn-sm&quot;&gt;Warning button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-danger btn-air-danger btn-sm&quot;&gt;Danger button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-light btn-air-light btn-sm&quot;&gt;Light button&lt;/button&gt;
&lt;!-- Cod Box Copy end --&gt;</code></pre>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<h5>Extra Small buttons</h5>
					<div class="card-header-right">
						<ul class="list-unstyled card-option">
							<li><i class="fa fa-spin fa-cog"></i></li>
							<li><i class="view-html fa fa-code"></i></li>
							<li><i class="icofont icofont-maximize full-card"></i></li>
							<li><i class="icofont icofont-minus minimize-card"></i></li>
							<li><i class="icofont icofont-refresh reload-card"></i></li>
							<li><i class="icofont icofont-error close-card"></i></li>
						</ul>
					</div>
					<span>Add <code>.btn-pill</code>,<code>.btn-air-*</code> and <code>.btn-xs</code> class for extra small button</span>
				</div>
				<div class="card-body btn-showcase">
					<button class="btn btn-pill btn-primary btn-air-primary btn-xs" type="button">Primary Button</button>
					<button class="btn btn-pill btn-secondary btn-air-secondary btn-xs" type="button">Secondary Button</button>
					<button class="btn btn-pill btn-success btn-air-success btn-xs" type="button">Success Button</button>
					<button class="btn btn-pill btn-info btn-air-info btn-xs" type="button">Info Button</button>
					<button class="btn btn-pill btn-warning btn-air-warning btn-xs" type="button">Warning Button</button>
					<button class="btn btn-pill btn-danger btn-air-danger btn-xs" type="button">Danger Button</button>
					<button class="btn btn-pill btn-light btn-air-light btn-xs" type="button">Light Button</button>
					<div class="code-box-copy">
						<button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head3" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
						<pre><code class="language-html" id="example-head3">&lt;!-- Cod Box Copy begin --&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-primary btn-air-primary btn-xs&quot;&gt;Primary button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-secondary btn-air-secondary btn-xs&quot;&gt;Secondary button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-success btn-air-success btn-xs&quot;&gt;Success button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-info btn-air-info btn-xs&quot;&gt;Info button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-warning btn-air-warning btn-xs&quot;&gt;Warning button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-danger btn-air-danger btn-xs&quot;&gt;Danger button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-light btn-air-light btn-xs&quot;&gt;Light button&lt;/button&gt;
&lt;!-- Cod Box Copy end --&gt;</code></pre>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<h5>Active Buttons</h5>
					<div class="card-header-right">
						<ul class="list-unstyled card-option">
							<li><i class="fa fa-spin fa-cog"></i></li>
							<li><i class="view-html fa fa-code"></i></li>
							<li><i class="icofont icofont-maximize full-card"></i></li>
							<li><i class="icofont icofont-minus minimize-card"></i></li>
							<li><i class="icofont icofont-refresh reload-card"></i></li>
							<li><i class="icofont icofont-error close-card"></i></li>
						</ul>
					</div>
					<span>Add <code>.active</code> for active state</span>
				</div>
				<div class="card-body btn-showcase">
					<button class="btn btn-pill btn-primary btn-air-primary active" type="button">Active</button>
					<button class="btn btn-pill btn-secondary btn-air-secondary active" type="button">Active</button>
					<button class="btn btn-pill btn-success btn-air-success active" type="button">Active</button>
					<button class="btn btn-pill btn-info btn-air-info active" type="button">Active</button>
					<button class="btn btn-pill btn-warning btn-air-warning active" type="button">Active</button>
					<button class="btn btn-pill btn-danger btn-air-danger active" type="button">Active</button>
					<button class="btn btn-pill btn-light btn-air-light active txt-dark" type="button">Active</button>
					<div class="code-box-copy">
						<button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head4" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
						<pre><code class="language-html" id="example-head4">&lt;!-- Cod Box Copy begin --&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-primary btn-air-primary active&quot;&gt;Active&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-secondary btn-air-secondary active&quot;&gt;Active&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-success btn-air-success active&quot;&gt;Active&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-info btn-air-info active&quot;&gt;Active&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-warning btn-air-warning active&quot;&gt;Active&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-danger btn-air-danger active&quot;&gt;Active&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-light btn-air-light active txt-dark&quot;&gt;Active&lt;/button&gt;
&lt;!-- Cod Box Copy end --&gt;</code></pre>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<h5>Disabled buttons</h5>
					<div class="card-header-right">
						<ul class="list-unstyled card-option">
							<li><i class="fa fa-spin fa-cog"></i></li>
							<li><i class="view-html fa fa-code"></i></li>
							<li><i class="icofont icofont-maximize full-card"></i></li>
							<li><i class="icofont icofont-minus minimize-card"></i></li>
							<li><i class="icofont icofont-refresh reload-card"></i></li>
							<li><i class="icofont icofont-error close-card"></i></li>
						</ul>
					</div>
					<span>Add <code>.disabled</code> class or <code>disabled="disabled"</code> attribute for disabled button</span>
				</div>
				<div class="card-body btn-showcase">
					<button class="btn btn-pill btn-primary btn-air-primary disabled" type="button">Disabled</button>
					<button class="btn btn-pill btn-secondary btn-air-secondary disabled" type="button">Disabled</button>
					<button class="btn btn-pill btn-success btn-air-success disabled" type="button">Disabled</button>
					<button class="btn btn-pill btn-info btn-air-info disabled" type="button">Disabled</button>
					<button class="btn btn-pill btn-warning btn-air-warning disabled" type="button">Disabled</button>
					<button class="btn btn-pill btn-danger btn-air-danger disabled" type="button">Disabled</button>
					<button class="btn btn-pill btn-light btn-air-light disabled" type="button">Disabled</button>
					<div class="code-box-copy">
						<button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head5" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
						<pre><code class="language-html" id="example-head5">&lt;!-- Cod Box Copy begin --&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-primary btn-air-primary disabled&quot;&gt;Disabled&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-secondary btn-air-secondary disabled&quot;&gt;Disabled&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-success btn-air-success disabled&quot;&gt;Disabled&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-info btn-air-info disabled&quot;&gt;Disabled&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-warning btn-air-warning disabled&quot;&gt;Disabled&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-danger btn-air-danger disabled&quot;&gt;Disabled&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-light btn-air-light disabled txt-dark&quot;&gt;Disabled&lt;/button&gt;
&lt;!-- Cod Box Copy end --&gt;</code></pre>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<h5>Custom state buttons</h5>
					<div class="card-header-right">
						<ul class="list-unstyled card-option">
							<li><i class="fa fa-spin fa-cog"></i></li>
							<li><i class="view-html fa fa-code"></i></li>
							<li><i class="icofont icofont-maximize full-card"></i></li>
							<li><i class="icofont icofont-minus minimize-card"></i></li>
							<li><i class="icofont icofont-refresh reload-card"></i></li>
							<li><i class="icofont icofont-error close-card"></i></li>
						</ul>
					</div>
					<span>The <code>.btn</code> class used with <code>&lt;button&gt;</code>, <code>&lt;a&gt;</code> and <code>&lt;input&gt;</code> elements.</span>
				</div>
				<div class="card-body btn-showcase">
					<a class="btn btn-pill btn-primary btn-air-primary" href="#" data-bs-toggle="tooltip" title="btn btn-primary" role="button">Link</a>
					<input class="btn btn-pill btn-secondary btn-air-secondary btn-air-secondary" type="button" value="Input" data-bs-toggle="tooltip" title="btn btn-secondary">
					<input class="btn btn-pill btn-success btn-air-success btn-air-success" type="submit" value="Submit" data-bs-toggle="tooltip" title="btn btn-success">
					<button class="btn btn-pill btn-info btn-air-info btn-air-info" type="submit">Button</button>
					<div class="code-box-copy">
						<button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head6" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
						<pre><code class="language-html" id="example-head6">&lt;!-- Cod Box Copy begin --&gt;
&lt;a class=&quot;btn btn-pill btn-primary btn-air-primary&quot; href=&quot;#&quot; data-bs-toggle=&quot;tooltip;&quot; title=&quot;btn btn-primary&quot; role=&quot;button&quot;&gt;link&lt;/button&gt;
&lt;input class=&quot;btn btn-pill btn-primary btn-air-primary&quot; type=&quot;button&quot; value=&quot;Input&quot;  data-bs-toggle=&quot;tooltip;&quot; title=&quot;btn btn-secondary&quot;&gt;
&lt;input class=&quot;btn btn-pill btn-success btn-air-success&quot; type=&quot;submit&quot; value=&quot;Submit&quot; data-bs-toggle=&quot;tooltip&quot; title=&quot;btn btn-success&quot;&gt;
&lt;button class=&quot;btn btn-pill btn-info btn-air-info&quot; type=&quot;submit&quot;&gt;Button&lt;/button&gt;
&lt;!-- Cod Box Copy end --&gt;</code></pre>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<h5>outline buttons</h5>
					<div class="card-header-right">
						<ul class="list-unstyled card-option">
							<li><i class="fa fa-spin fa-cog"></i></li>
							<li><i class="view-html fa fa-code"></i></li>
							<li><i class="icofont icofont-maximize full-card"></i></li>
							<li><i class="icofont icofont-minus minimize-card"></i></li>
							<li><i class="icofont icofont-refresh reload-card"></i></li>
							<li><i class="icofont icofont-error close-card"></i></li>
						</ul>
					</div>
					<span>Add <code>.btn-pill</code>,<code>.btn-air-*</code> and <code>.btn-outline-*</code> class for button with outline</span>
				</div>
				<div class="card-body btn-showcase">
					<button class="btn btn-pill btn-outline-primary btn-air-primary" type="button">Primary Button</button>
					<button class="btn btn-pill btn-outline-secondary btn-air-secondary" type="button">Secondary Button</button>
					<button class="btn btn-pill btn-outline-success btn-air-success" type="button">Success Button</button>
					<button class="btn btn-pill btn-outline-info btn-air-info" type="button">Info Button</button>
					<button class="btn btn-pill btn-outline-warning btn-air-warning" type="button">Warning Button</button>
					<button class="btn btn-pill btn-outline-danger btn-air-danger" type="button">Danger Button</button>
					<button class="btn btn-pill btn-outline-light btn-air-light txt-dark" type="button">Light Button</button>
					<div class="code-box-copy">
						<button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head7" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
						<pre><code class="language-html" id="example-head7">&lt;!-- Cod Box Copy begin --&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-primary btn-air-primary&quot;&gt;Primary button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-secondary btn-air-secondary&quot;&gt;Secondary button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-success btn-air-success&quot;&gt;Success button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-info btn-air-info&quot;&gt;Info button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-warning btn-air-warning&quot;&gt;Warning button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-danger btn-air-danger&quot;&gt;Danger button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-light btn-air-light txt-dark&quot;&gt;Light button&lt;/button&gt;
&lt;!-- Cod Box Copy end --&gt;</code></pre>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<h5>bold Border outline buttons</h5>
					<div class="card-header-right">
						<ul class="list-unstyled card-option">
							<li><i class="fa fa-spin fa-cog"></i></li>
							<li><i class="view-html fa fa-code"></i></li>
							<li><i class="icofont icofont-maximize full-card"></i></li>
							<li><i class="icofont icofont-minus minimize-card"></i></li>
							<li><i class="icofont icofont-refresh reload-card"></i></li>
							<li><i class="icofont icofont-error close-card"></i></li>
						</ul>
					</div>
					<span>Add <code>.btn-pill</code>,<code>.btn-air-*</code> and <code>.btn-outline-*-2x</code> class for button with bold outline</span>
				</div>
				<div class="card-body btn-showcase">
					<button class="btn btn-pill btn-outline-primary-2x btn-air-primary" type="button">Primary Button</button>
					<button class="btn btn-pill btn-outline-secondary-2x btn-air-secondary" type="button">Secondary Button</button>
					<button class="btn btn-pill btn-outline-success-2x btn-air-success" type="button">Success Button</button>
					<button class="btn btn-pill btn-outline-info-2x btn-air-info" type="button">Info Button</button>
					<button class="btn btn-pill btn-outline-warning-2x btn-air-warning" type="button">Warning Button</button>
					<button class="btn btn-pill btn-outline-danger-2x btn-air-danger" type="button">Danger Button</button>
					<button class="btn btn-pill btn-outline-light-2x btn-air-light txt-dark" type="button">Light Button</button>
					<div class="code-box-copy">
						<button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head8" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
						<pre><code class="language-html" id="example-head8">&lt;!-- Cod Box Copy begin --&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-primary-2x btn-air-primary&quot;&gt;Primary button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-secondary-2x btn-air-secondary&quot;&gt;Secondary button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-success-2x btn-air-success&quot;&gt;Success button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-info-2x btn-air-info&quot;&gt;Info button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-warning-2x btn-air-warning&quot;&gt;Warning button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-danger-2x btn-air-danger&quot;&gt;Danger button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-light-2x btn-air-light txt-dark&quot;&gt;Light button&lt;/button&gt;
&lt;!-- Cod Box Copy end --&gt;</code></pre>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<h5>outline Large buttons</h5>
					<div class="card-header-right">
						<ul class="list-unstyled card-option">
							<li><i class="fa fa-spin fa-cog"></i></li>
							<li><i class="view-html fa fa-code"></i></li>
							<li><i class="icofont icofont-maximize full-card"></i></li>
							<li><i class="icofont icofont-minus minimize-card"></i></li>
							<li><i class="icofont icofont-refresh reload-card"></i></li>
							<li><i class="icofont icofont-error close-card"></i></li>
						</ul>
					</div>
					<span><code>.btn-pill</code>,<code>.btn-air-*</code>,<code>.btn-outline-*</code> and <code>.btn-lg</code> class for large button with outline</span>
				</div>
				<div class="card-body btn-showcase">
					<button class="btn btn-pill btn-outline-primary btn-air-primary btn-lg" type="button">Primary Button</button>
					<button class="btn btn-pill btn-outline-secondary btn-air-secondary btn-lg" type="button">Secondary Button</button>
					<button class="btn btn-pill btn-outline-success btn-air-success btn-lg" type="button">Success Button</button>
					<button class="btn btn-pill btn-outline-info btn-air-info btn-lg" type="button">Info Button</button>
					<button class="btn btn-pill btn-outline-warning btn-air-warning btn-lg" type="button">Warning Button</button>
					<button class="btn btn-pill btn-outline-danger btn-air-danger btn-lg" type="button">Danger Button</button>
					<button class="btn btn-pill btn-outline-light btn-air-light btn-lg txt-dark" type="button">Light Button</button>
					<div class="code-box-copy">
						<button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head9" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
						<pre><code class="language-html" id="example-head9">&lt;!-- Cod Box Copy begin --&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-primary btn-air-primary btn-lg&quot;&gt;Primary button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-secondary btn-air-secondary btn-lg&quot;&gt;Secondary button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-success btn-air-success btn-lg&quot;&gt;Success button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-info btn-air-info btn-lg&quot;&gt;Info button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-warning btn-air-warning btn-lg&quot;&gt;Warning button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-danger btn-air-danger btn-lg&quot;&gt;Danger button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-light btn-air-light btn-lg txt-dark&quot;&gt;Light button&lt;/button&gt;
&lt;!-- Cod Box Copy end --&gt;</code></pre>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<h5>outline small buttons</h5>
					<div class="card-header-right">
						<ul class="list-unstyled card-option">
							<li><i class="fa fa-spin fa-cog"></i></li>
							<li><i class="view-html fa fa-code"></i></li>
							<li><i class="icofont icofont-maximize full-card"></i></li>
							<li><i class="icofont icofont-minus minimize-card"></i></li>
							<li><i class="icofont icofont-refresh reload-card"></i></li>
							<li><i class="icofont icofont-error close-card"></i></li>
						</ul>
					</div>
					<span><code>.btn-pill</code>,<code>.btn-air-*</code>,<code>.btn-outline-*</code> and <code>.btn-sm</code> class for small button with outline</span>
				</div>
				<div class="card-body btn-showcase">
					<button class="btn btn-pill btn-outline-primary btn-air-primary btn-sm" type="button">Primary Button</button>
					<button class="btn btn-pill btn-outline-secondary btn-air-secondary btn-sm" type="button">Secondary Button</button>
					<button class="btn btn-pill btn-outline-success btn-air-success btn-sm" type="button">Success Button</button>
					<button class="btn btn-pill btn-outline-info btn-air-info btn-sm" type="button">Info Button</button>
					<button class="btn btn-pill btn-outline-warning btn-air-warning btn-sm" type="button">Warning Button</button>
					<button class="btn btn-pill btn-outline-danger btn-air-danger btn-sm" type="button">Danger Button</button>
					<button class="btn btn-pill btn-outline-light btn-air-light btn-sm txt-dark" type="button">Light Button</button>
					<div class="code-box-copy">
						<button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head10" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
						<pre><code class="language-html" id="example-head10">&lt;!-- Cod Box Copy begin --&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-primary btn-air-primary btn-sm&quot;&gt;Primary button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-secondary btn-air-secondary btn-sm&quot;&gt;Secondary button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-success btn-air-success btn-sm&quot;&gt;Success button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-info btn-air-info btn-sm&quot;&gt;Info button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-warning btn-air-warning btn-sm&quot;&gt;Warning button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-danger btn-air-danger btn-sm&quot;&gt;Danger button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-light btn-air-light btn-sm txt-dark&quot;&gt;Light button&lt;/button&gt;
&lt;!-- Cod Box Copy end --&gt;</code></pre>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<h5>outline extra small buttons</h5>
					<div class="card-header-right">
						<ul class="list-unstyled card-option">
							<li><i class="fa fa-spin fa-cog"></i></li>
							<li><i class="view-html fa fa-code"></i></li>
							<li><i class="icofont icofont-maximize full-card"></i></li>
							<li><i class="icofont icofont-minus minimize-card"></i></li>
							<li><i class="icofont icofont-refresh reload-card"></i></li>
							<li><i class="icofont icofont-error close-card"></i></li>
						</ul>
					</div>
					<span><code>.btn-pill</code>,<code>.btn-air-*</code>,<code>.btn-outline-*</code> and <code>.btn-xs</code> class for extra small button with outline</span>
				</div>
				<div class="card-body btn-showcase">
					<button class="btn btn-pill btn-outline-primary btn-air-primary btn-xs" type="button">Primary Button</button>
					<button class="btn btn-pill btn-outline-secondary btn-air-secondary btn-xs" type="button">Secondary Button</button>
					<button class="btn btn-pill btn-outline-success btn-air-success btn-xs" type="button">Success Button</button>
					<button class="btn btn-pill btn-outline-info btn-air-info btn-xs" type="button">Info Button</button>
					<button class="btn btn-pill btn-outline-warning btn-air-warning btn-xs" type="button">Warning Button</button>
					<button class="btn btn-pill btn-outline-danger btn-air-danger btn-xs" type="button">Danger Button</button>
					<button class="btn btn-pill btn-outline-light btn-air-light btn-xs txt-dark" type="button">Light Button</button>
					<div class="code-box-copy">
						<button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head11" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
						<pre><code class="language-html" id="example-head11">&lt;!-- Cod Box Copy begin --&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-primary btn-air-primary btn-xs&quot;&gt;Primary button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-secondary btn-air-secondary btn-xs&quot;&gt;Secondary button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-success btn-air-success btn-xs&quot;&gt;Success button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-info btn-air-info btn-xs&quot;&gt;Info button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-warning btn-air-warning btn-xs&quot;&gt;warning button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-danger btn-air-danger btn-xs&quot;&gt;Danger button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-light btn-air-light btn-xs txt-dark&quot;&gt;Light button&lt;/button&gt;
&lt;!-- Cod Box Copy end --&gt;</code></pre>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<h5>Disabled outline buttons</h5>
					<div class="card-header-right">
						<ul class="list-unstyled card-option">
							<li><i class="fa fa-spin fa-cog"></i></li>
							<li><i class="view-html fa fa-code"></i></li>
							<li><i class="icofont icofont-maximize full-card"></i></li>
							<li><i class="icofont icofont-minus minimize-card"></i></li>
							<li><i class="icofont icofont-refresh reload-card"></i></li>
							<li><i class="icofont icofont-error close-card"></i></li>
						</ul>
					</div>
					<span>Add <code>.disabled</code> class or <code>disabled="disabled"</code> attribute for disabled button</span>
				</div>
				<div class="card-body btn-showcase">
					<button class="btn btn-pill btn-outline-primary btn-air-primary disabled" type="button">Disabled</button>
					<button class="btn btn-pill btn-outline-secondary btn-air-secondary disabled" type="button">Disabled</button>
					<button class="btn btn-pill btn-outline-success btn-air-success disabled" type="button">Disabled</button>
					<button class="btn btn-pill btn-outline-info btn-air-info disabled" type="button">Disabled</button>
					<button class="btn btn-pill btn-outline-warning btn-air-warning disabled" type="button">Disabled</button>
					<button class="btn btn-pill btn-outline-danger btn-air-danger disabled" type="button">Disabled</button>
					<button class="btn btn-pill btn-outline-light btn-air-light disabled txt-dark" type="button">Disabled</button>
					<div class="code-box-copy">
						<button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head12" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
						<pre><code class="language-html" id="example-head12">&lt;!-- Cod Box Copy begin --&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-primary btn-air-primary disabled&quot;&gt;Disabled&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-secondary btn-air-secondary disabled&quot;&gt;Disabled&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-success btn-air-success disabled&quot;&gt;Disabled&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-info btn-air-info disabled&quot;&gt;Disabled&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-warning btn-air-warning disabled&quot;&gt;Disabled&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-danger btn-air-danger disabled&quot;&gt;Disabled&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-outline-light btn-air-light disabled txt-dark&quot;&gt;Disabled&lt;/button&gt;
&lt;!-- Cod Box Copy end --&gt;</code></pre>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<h5>Gradien buttons</h5>
					<div class="card-header-right">
						<ul class="list-unstyled card-option">
							<li><i class="fa fa-spin fa-cog"></i></li>
							<li><i class="view-html fa fa-code"></i></li>
							<li><i class="icofont icofont-maximize full-card"></i></li>
							<li><i class="icofont icofont-minus minimize-card"></i></li>
							<li><i class="icofont icofont-refresh reload-card"></i></li>
							<li><i class="icofont icofont-error close-card"></i></li>
						</ul>
					</div>
					<span><code>.btn-pill</code>,<code>.btn-air-*</code>,<code>.btn-*</code> and <code>.btn-*-gradien</code> class for gradien button</span>
				</div>
				<div class="card-body btn-showcase">
					<button class="btn btn-pill btn-primary btn-air-primary btn-primary-gradien" type="button">Primary Button</button>
					<button class="btn btn-pill btn-secondary btn-air-secondary btn-secondary-gradien" type="button">Secondary Button</button>
					<button class="btn btn-pill btn-success btn-air-success btn-success-gradien" type="button">Success Button</button>
					<button class="btn btn-pill btn-info btn-air-info btn-info-gradien" type="button">Info Button</button>
					<button class="btn btn-pill btn-warning btn-air-warning btn-warning-gradien" type="button">Warning Button</button>
					<button class="btn btn-pill btn-danger btn-air-danger btn-danger-gradien" type="button">Danger Button</button>
					<button class="btn btn-pill btn-light btn-air-light btn-light-gradien txt-dark" type="button">Light Button</button>
					<div class="code-box-copy">
						<button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head13" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
						<pre><code class="language-html" id="example-head13">&lt;!-- Cod Box Copy begin --&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-primary btn-air-primary btn-primary-gradien&quot;&gt;Primary button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-secondary btn-air-secondary btn-secondary-gradien&quot;&gt;Secondary button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-success btn-air-success btn-success-gradien&quot;&gt;Success button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-info btn-air-info btn-info-gradien&quot;&gt;Info button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-warning btn-air-warning btn-warning-gradien&quot;&gt;warning button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-danger btn-air-danger btn-danger-gradien&quot;&gt;Danger button&lt;/button&gt;
&lt;button type=&quot;button&quot; class=&quot;btn btn-pill btn-light btn-air-light btn-light-gradien txt-dark&quot;&gt;Light button&lt;/button&gt;
&lt;!-- Cod Box Copy end --&gt;</code></pre>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/prism/prism.min.js')}}"></script>
<script src="{{asset('assets/js/clipboard/clipboard.min.js')}}"></script>
<script src="{{asset('assets/js/custom-card/custom-card.js')}}"></script>
<script src="{{asset('assets/js/button-tooltip-custom.js')}}"></script>
@endsection