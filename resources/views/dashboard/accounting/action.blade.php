@switch($type)
    @case('action')
    <a href="{{ route('accounting.edit',$account->id) }}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>
    <a href="{{ route('accounting.delete',$account->id) }}" class="btn btn-danger sm text-white" title="Delete" id="delete">  <i class="fas fa-trash-alt"></i> </a>
    @break
    @default

@endswitch