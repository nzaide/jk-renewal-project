@if (session('message'))
<div class="alert {{ session('alert-class') }} alert-dismissible fade show" role="alert">
    <div class="alert-message">
        {{ session('message') }}
    </div>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif
