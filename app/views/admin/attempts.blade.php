@extends('master')

@section('content')
<div class="row">
	
	<div class="col-md-3 aside">
		<h2>{{ trans('general.info') }}</h2>
		<p>
			{{ trans('directory.list_domain_help') }}
		</p>
		<p>
			<a class="right" href="{{ URL::route('domain.create') }}">{{ trans('directory.add_domain') }}</a>
		</p>
	</div>
	
	<div class="col-md-8">
            <div class="row">
		@if(Session::has('success'))
			<span class="alert alert-success">{{ Session::get('success') }}</span>
		@endif
		@if(Session::has('error'))
			<span class="alert alert-danger">{{ Session::get('error') }}</span>
		@endif
		@if(isset($errors))
			@foreach($errors as $error)
				<span class="alert alert-danger">{{ $error }}</span>
			@endforeach	
		@endif
		
		<h3 class="bottom">Attempts</h3>

		@foreach($attempts as $attempt)
		<div class="col-sm-6 bottom">
			<p>
				<a href="{{ Attempt::seoURL($attempt->id) }}">
					<span class="glyphicon glyphicon-link"></span> {{ substr($attempt->name, 0, 25) }}
				</a>
			</p>
		</div>	
		@endforeach
            </div>    
	</div>
	<div class="col-md-12">
		<div class="pagination">
			{{ $attempts->links() }}
		</div>	
	</div>
</div>	
@stop