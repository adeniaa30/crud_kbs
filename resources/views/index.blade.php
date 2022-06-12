<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Latihan CRUD</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <h1>Latihan CRUD Blog</h1>
                <a href="{{ url('create') }}" class="btn btn-primary"> + Create Blog </a>
                <table class="table mt-2">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    @php
                        $no=1;
                    @endphp
                    @forelse ($results as $item )
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->name_category }}</td>
                        <td>{{ $item->description }}</td>
                        <td><img src="{{ $item->image }}" width="100px"></td>
                        <td>
                            <a href="{{ url('edit/' . $item->id) }}" class="btn btn-warning"> Edit </a>
                            <a href="{{ url('destroy/' . $item->id) }}" class="btn btn-danger"> Delete </a>
                        </td>
                    </tr>
                    @empty
                        
                    @endforelse
                </table>
            </div>
        </div>
    </div>
</body>
</html>