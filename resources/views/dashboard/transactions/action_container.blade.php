@switch($type)
    @case('action')
    <a href="{{ route('transaction.container.delete',$transaction->id) }}" class="btn btn-danger sm text-white" title="Delete" id="delete">  <i class="fas fa-trash-alt"></i> </a>
    @break
    @default

@endswitch