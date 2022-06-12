<button class="btn btn-sm btn-{{$btn}} dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-table-el="{{ empty($tableEl) ? '#dataTableBuilder' : $tableEl }}" data-padding="{{ empty($padding) ? '65px' : $padding }}" onclick="addPadding(this)">
	@if($feature == 'top' || $feature == 'special_offer')
		@if($model->is_featured == 1)
			Yes
		@else
			No
		@endif
	@elseif($feature == 'bottom')
		@if($model->bottom_featured == 1)
			Yes
		@else
			No
		@endif
	@endif
</button>
<div class="dropdown-menu">
    @if($feature == 'top')
    	<a class="dropdown-item" href="{{ url('administrator/preview/featured-home-top/'.$model->id) }}" target="_blank">Preview Post in Home Page</a>
    	<div role="separator" class="dropdown-divider"></div>
    	@if($model->is_featured == 1)<a class="dropdown-item" href="#" onclick="return set_feature({{ $model->id }}, 'top', 2, 'home page feature')">Unset Feature</a>
    	@else <a class="dropdown-item" href="#" onclick="return set_feature({{ $model->id }}, 'top', 1, 'home page feature')">Set Feature</a>
    	@endif
    	
    @elseif($feature == 'bottom')
    	<a class="dropdown-item" href="{{ url('administrator/preview/featured-home-bottom/'.$model->id) }}" target="_blank">Preview Post in Home Page</a>
    	<div role="separator" class="dropdown-divider"></div>
    	@if($model->bottom_featured == 1)<a class="dropdown-item" href="#" onclick="return set_feature({{ $model->id }}, 'bottom', 2, 'bottom page feature')">Unset Feature</a>
        @else <a class="dropdown-item" href="#" onclick="return set_feature({{ $model->id }}, 'bottom', 1, 'bottom page feature')">Set Feature</a>
        @endif

     @elseif($feature == 'special_offer')
        <a class="dropdown-item" href="{{ url('administrator/preview/special-offer/'.$model->id) }}" target="_blank">Preview Post in Special Offer</a>
        <div role="separator" class="dropdown-divider"></div>
        @if($model->is_featured == 1)<a class="dropdown-item" href="#" onclick="return set_feature({{ $model->id }}, 'top', 2, 'special offer')">Unset Special Offer</a>
        @else <a class="dropdown-item" href="#" onclick="return set_feature({{ $model->id }}, 'top', 1, 'special offer')">Set Special Offer</a>
        @endif

    @endif
</div>

<script type="text/javascript">
    function set_feature(id, feature, status, text){
        Swal.fire({
          title: 'Are you sure?',
          text: "Set this post in " . text,
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, sure!'
        }).then((result) => {
          if (result.value) {
            document.location = "{{ url('administrator/post') }}/" + id + "/feature/" + feature + "/" + status;
          }
        })
    }
</script>