@switch($type)
    @case('action')
    <a href="{{ route('transaction.delete',$transaction->id) }}" class="btn btn-warning sm text-white" title="Show" id="Show">  <i class="fas fa-eye"></i> </a>
    <a href="{{ route('transaction.edit',$transaction->id) }}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>
    <a href="{{ route('transaction.delete',$transaction->id) }}" class="btn btn-danger sm text-white" title="Delete" id="delete">  <i class="fas fa-trash-alt"></i> </a>
    @break
    @default

@endswitch