@switch($type)
    @case('action')
    <a href="{{ route('custom_procdure.edit',$custom_procedures->id) }}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>
    <a href="{{ route('custom_procdure.delete',$custom_procedures->id) }}" class="btn btn-danger sm text-white" title="Delete" id="delete">  <i class="fas fa-trash-alt"></i> </a>
    @break
    @default

@endswitch