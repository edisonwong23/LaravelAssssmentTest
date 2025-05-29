@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Users</h1>

    {{-- Filter --}}
    <form method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <select name="status" class="form-select" onchange="this.form.submit()">
                    <option value="">-- Filter by Status --</option>
                    <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
        </div>
    </form>

    {{-- Top Action Buttons --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <a href="{{ route('users.create') }}" class="btn btn-primary">+ Create User</a>
            <a href="{{ route('users.export') }}" class="btn btn-success">Export to Excel</a>
        </div>
        <button form="bulkDeleteForm" type="submit" class="btn btn-danger"
            onclick="return confirm('Are you sure you want to delete selected users?')">
            Bulk Delete
        </button>
    </div>

    {{-- Users Table --}}
    <div class="table-responsive">
        <form method="POST" action="{{ route('users.bulkdelete') }}" id="bulkDeleteForm">
            @csrf
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th><input type="checkbox" onclick="toggleCheckboxes(this)"></th>
                        <th>#ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td><input type="checkbox" name="ids[]" value="{{ $user->id }}"></td>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ ucfirst($user->status) }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm">Edit</a>
                                    {{-- Delete button added by JS --}}
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </form>

        {{-- Hidden Delete Forms (one per user) --}}
        @foreach ($users as $user)
            <form action="{{ route('users.destroy', $user) }}" method="POST" id="delete-user-{{ $user->id }}" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        @endforeach
    </div>
</div>

{{-- JS Section --}}
<script>
    // Toggle all checkboxes for bulk delete
    function toggleCheckboxes(source) {
        document.querySelectorAll('input[name="ids[]"]').forEach(cb => cb.checked = source.checked);
    }

    // Submit the hidden delete form for single user
    function submitDelete(userId) {
        if (confirm('Delete this user?')) {
            document.getElementById('delete-user-' + userId).submit();
        }
    }

    // When DOM loads, add delete buttons dynamically to each user row
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('tbody tr').forEach(row => {
            const userId = row.querySelector('input[type="checkbox"]').value;
            const actionCell = row.querySelector('td:last-child .d-flex');
            if (actionCell) {
                const deleteBtn = document.createElement('button');
                deleteBtn.type = 'button';
                deleteBtn.className = 'btn btn-danger btn-sm';
                deleteBtn.textContent = 'Delete';
                deleteBtn.onclick = () => submitDelete(userId);
                actionCell.appendChild(deleteBtn);
            }
        });
    });
</script>

@endsection
