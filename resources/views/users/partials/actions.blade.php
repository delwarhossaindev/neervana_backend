<a href="{{ route('users.show', $row->id) }}" class="btn btn-sm btn-info">
    <i class="fas fa-eye"></i> Show
</a>

<a href="{{ route('users.edit', $row->id) }}" class="btn btn-sm btn-warning">
    <i class="fas fa-edit"></i> Edit
</a>

<form action="{{ route('users.destroy', $row->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
        <i class="fas fa-trash-alt"></i> Delete
    </button>
</form>
