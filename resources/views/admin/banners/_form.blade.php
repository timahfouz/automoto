<x-admin.error-feedback />

<div class="row">
    <div class="form-group mb-4 col-md-4">
        <label for="name"> Choose Image: </label>
        <input type="file" class="form-control" id="image"
            name="image">
    </div>
</div>

<div class="row">
    <div class="form-group mb-4 col-md-6">
        <label for="name"> Description:</label>
        <textarea type="text" class="form-control @error('name') is-invalid @enderror" id="description"
            name="description" placeholder="Why you're creating this banner?" >{{old('description', (isset($item) ? $item->description : ''))}}</textarea>
    </div>
</div>

