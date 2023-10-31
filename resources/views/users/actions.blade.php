<a href="{{route('users.edit', $id)}}" data-toggle="tooltip" data-original-title="Edit">
    <i class="fa-solid fa-pen-to-square"></i>
</a>
<a href="{{route('users.getUser', $id)}}" data-id="{{ $id }}" data-toggle="tooltip" data-original-title="Delete">
    <i class="fa-solid fa-trash-can"></i>
</a>