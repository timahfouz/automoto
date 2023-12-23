
<div class="row">
    <div class="form-group mb-4 col-md-4">
        <label for="name"> City Name:</label>
        <input type="text" required class="form-control @error('name') is-invalid @enderror" id="name"
                name="name" placeholder="Name" value="{{old('name', (isset($item) ? $item->name : ''))}}">
    </div>
</div>
