<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD BLOG</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <h1>Create New Blog</h1>
                <form action="{{ url('store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-2">
                        <label for="name">Name : </label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        @error('name') <i class="text-danger">{{ $message }}</i> @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="category_id">Category : </label>
                        <select name="category_id" id="" class="form-control">
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}"> {{ $item->name_category }}</option>
                            @endforeach
                        @error('category_id') <i class="text-danger">{{ $message }}</i> @enderror
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="name">Description : </label>
                        <input type="text" name="description" class="form-control" value="{{ old('description') }}">
                        @error('description') <i class="text-danger">{{ $message }}</i> @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="name">Image : </label>
                        <input type="file" name="image" class="form-control">
                        @error('image') <i class="text-danger">{{ $message }}</i> @enderror
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>