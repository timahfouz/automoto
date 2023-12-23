<div class="row">
    <div class="form-group mb-4 col-md-4">
        <label for="name"> Choose Image: </label>
        <input type="file" class="form-control" id="image"
            name="image">
    </div>
</div>

<div class="form-group mb-4 col-md-4">
    <label for="category_id"> Responsible User:</label>
    <select required class="form-control" id="category_id" name="category_id">
        <option value="">Select Category</option>
        @foreach($categories as $category)
        <option {{(isset($item) ? ($item->category_id == $category->id) ? 'selected' : '' : '')}} value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group mb-4 col-md-6">
    <label for="name"> Name:</label>
    <input type="text" required class="form-control @error('name') is-invalid @enderror" id="name"
        name="name" placeholder="Name" value="{{old('name', (isset($item) ? $item->name : ''))}}">
</div>
