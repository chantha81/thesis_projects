<a href="{{route('tents.edit', $id)}}" data-id="{{ $id }}" data-toggle="tooltip" data-original-title="Edit">
    <i class="fa-solid fa-pen-to-square"></i>
</a>
<a href="tents/delete/{{$id}}"><i class="fa-solid fa-trash-can"></i></a>
{{-- <a href="{{$id}}" data-id="{{ $id }}" data-toggle="tooltip" data-original-title="Delete" onclick="event.preventDefault(); document.getElementById('destroy-form').submit();">
    <i class="fa-solid fa-trash-can"></i>
</a>
<form id="destroy-form" action="{{ route('tents.destroy', $id ) }}" method="POST" style="display: none;">
    @method('DELETE')
    @csrf
</form> --}}

    