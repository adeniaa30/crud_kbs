{!! Form::model($model, ['url' => $delete, 'method' => 'delete', 'class' => 'form-inline js-confirm', 'data-confirm' => $confirm_message, 'onSubmit' => 'event.preventDefault(); return confirmDelete(this)'] ) !!}
<button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-table-el="{{ empty($tableEl) ? '#dataTableBuilder' : $tableEl }}" data-padding="{{ empty($padding) ? '65px' : $padding }}" onclick="addPadding(this)">Action</button>
<div class="dropdown-menu">
    @foreach($url as $key => $data)
        <a class="dropdown-item" href="{{ $data }}">{{ $key }}</a>
    @endforeach
    <a class="dropdown-item" href="#" onclick="showLink('{{ $modal_link }}')" data-toggle="modal" data-target="#showLink">Link Edit Post</a>
  <div role="separator" class="dropdown-divider"></div>
  {!! Form::submit('Delete', ['class' => 'dropdown-item']) !!}
</div>
{!! Form::close()!!}


<div class="modal modal-primary fade showLink" id="showLink" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> --}}
                <h4 class="modal-title">Link for Edit Post</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <input type="text" name="link" id="link" class="form-control input-lg" readonly>
                            <span class="input-group-addon">
                                <button class="btn btn-sm" id="copy_link" data-clipboard-target="#link" title="Copy">
                                    <i class="mdi mdi-content-copy"></i>
                                </button></span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
function showLink(link)
{
	$('#link').val(link);
}

var clipboard = new Clipboard('#copy_link');
</script>