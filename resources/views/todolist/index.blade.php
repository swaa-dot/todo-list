<!DOCTYPE html>
<html>
<head>
    <title>Todo List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Todo List</h2>
        <a href="{{ route('todolists.create') }}" class="btn btn-primary">+ Create Todo</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($todolists->isEmpty())
        <div class="alert alert-info">Belum ada todo list.</div>
    @else
       <table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Mulai</th>
            <th>Berakhir</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($todolists as $todo)
        <tr>
            <td>{{ $todo->name }}</td>
            <td>{{ $todo->deskripsi }}</td>
            <td>{{ $todo->mulai }}</td>
            <td>{{ $todo->berakhir }}</td>
            <td>{{ $todo->status }}</td>
            <td class="d-flex gap-1">
                <a href="{{ route('todolists.edit', $todo->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('todolists.destroy', $todo->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

    @endif
</div>

</body>
</html>
