<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EDIT BLOG</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <h1>Edit Blog</h1>
                <form action="{{ url('update/' . $results->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-2">
                        <label for="name">Name : </label>
                        <input type="text" name="name" class="form-control" 
                            value="{{ old('name') ? old('name') : $results->name }}">
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
                        <input type="text" name="description" class="form-control" 
                            value="{{ old('description') ? old('description') : $results->description }}">
                        @error('description') <i class="text-danger">{{ $message }}</i> @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="name">Image : </label><br>
                        
                        <img src="{{ url($results->image) }}" width="150px" id="image" class="mt-2">

                        <input type="file" name="image" class="form-control mt-2" accept="image/*" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">
                        @error('image') <i class="text-danger">{{ $message }}</i> @enderror
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>