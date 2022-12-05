@switch($type)
    @case('action')
    <a href="{{ route('shipment_agent.edit',$agent->id) }}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>
    <a href="{{ route('shipment_agent.delete',$agent->id) }}" class="btn btn-danger sm text-white" title="Delete" id="delete">  <i class="fas fa-trash-alt"></i> </a>
    @break
    @default
@endswitch