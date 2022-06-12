<button class="btn btn-sm btn-{{$btn}} dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-table-el="{{ empty($tableEl) ? '#dataTableBuilder' : $tableEl }}" data-padding="{{ empty($padding) ? '65px' : $padding }}" onclick="addPadding(this)">{{ $title }}</button>
<div class="dropdown-menu">
	<a class="dropdown-item" href="{{ url('administrator/preview/'.$category.'/'.$model->id) }}" target="_blank">Preview Post</a>
	<div role="separator" class="dropdown-divider"></div>
	<a class="dropdown-item" href="#" onclick="change_status({{ $model->id }}, {{ $model->status }})" data-toggle="modal" data-target="#change_status">Change Status</a>
</div>

<div class="modal modal-primary fade change_status" id="change_status" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> --}}
                <h4 class="modal-title">Change Post Status</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="forms-sample">
                        	<input type="hidden" id="post_id" name="post_id">
                        	<div class="form-group">
                        		<label>Status</label>
                        		<select id="status" name="status" class="form-control">
                        			<option value="1">Request</option>
                        			<option value="2">Publish</option>
                        			<option value="3">Revision</option>
                        			<option value="4">Decline</option>
                        		</select>
                        	</div>
                        	<div class="form-group">
                        		<label>Revision (optional, if you choose revision status)</label>
                        		<textarea id="revision" rows="5" name="revision" class="form-control textarea"></textarea>
                        	</div>
                        	<div class="form-group">
                        		<button id="submit" class="btn btn-danger">Submit</button>
                        	</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
	function change_status(id, status)
	{
		$('#post_id').val(id);
		$('#status').val(status);
	}

	$('#submit').click(function(){
		id = $('#post_id').val();
		status = $('#status').val();
		if(status == 3)
			document.location = "{{ url('administrator/post') }}/" + id + "/status/" + status + "?revision=" + $('#revision').val();
		else
			document.location = "{{ url('administrator/post') }}/" + id + "/status/" + status;
	})

    function tinymce_init()
    {
      tinymce.init({
        selector: "#revision",theme: "modern",
        plugins: [
             "advlist autolink link image paste lists charmap print preview hr anchor pagebreak",
             "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
             "table contextmenu directionality emoticons paste textcolor code"
       ],
       toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect page code",
       // toolbar2: "| link unlink anchor | image media | forecolor backcolor  | print preview code ",
       image_advtab: true ,
       relative_urls:false,
       menubar: false,
       paste_word_valid_elements: "b,strong,p,br,ul,ol,li",
       extended_valid_elements: "healcode-widget"
     });
    }
  tinymce_init();
</script>