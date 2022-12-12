@switch($type)
    @case('action')
        <a href="{{ route('user.edit',$user->id) }}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>                                               
        @if (! auth()->user()->hasRole('super_admin'))
            <a href="{{ route('user.delete',$user->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>
        @endif
    @break

    @case('roles')
    @foreach ($user->roles as $role )
        <p>{{$role->display_name}}</p> 
    @endforeach
    @break
    @default

@endswitch