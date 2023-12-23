
<div class="row">
    <div class="form-group mb-4 col-md-6">
        <label for="parent_id"> Select City:</label>
        <select required class="form-control" id="parent_id" name="parent_id">
            @foreach($cities as $city)
            <option {{(isset($item) ? ($item->parent_id == $city->id) ? 'selected' : '' : '')}} value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="row">
    <div class="form-group mb-4 col-md-6">
        <label for="name"> Area Name:</label>
        <input type="text" required class="form-control @error('name') is-invalid @enderror" id="name"
                name="name" placeholder="Name" value="{{old('name', (isset($item) ? $item->name : ''))}}">
    </div>
</div>
