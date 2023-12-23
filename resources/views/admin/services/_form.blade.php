<div class="row">
    <div class="form-group mb-4 col-md-4">
        <label for="name"> Choose Image: </label>
        <input type="file" class="form-control" id="image"
            name="image">
    </div>
</div>

<div class="row">
    <div class="form-group mb-4 col-md-6">
        <label for="city_id"> Select City:</label>
        <select required class="form-control" id="city_id" name="city_id">
            @foreach($cities as $city)
            <option {{(isset($item) ? ($item->city_id == $city->id) ? 'selected' : '' : '')}} value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="row">
    <div class="form-group mb-4 col-md-6">
        <label for="category_id"> Select Category:</label>
        <select required class="form-control" id="category_id" name="category_id">
            @foreach($categories as $category)
            <option {{(isset($item) ? ($item->category_id == $category->id) ? 'selected' : '' : '')}} value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="row">
    <div class="form-group mb-4 col-md-6">
        <label for="name"> Service Name:</label>
        <input type="text" required class="form-control @error('name') is-invalid @enderror" id="name"
                name="name" placeholder="Name" value="{{old('name', (isset($item) ? $item->name : ''))}}">
    </div>
</div>


<div class="form-group mb-4 col-md-2">
    <label for="is_brand">Is it a new brand?</label>
    <input type="checkbox" class="" id="is_brand"
        name="is_brand" {{ (isset($item) && $item->is_brand ? 'checked' : '') }}>
</div>

<div class="form-group mb-4 col-md-2">
    <label for="for_jobs">Job Service</label>
    <input type="checkbox" class="" id="for_jobs"
        name="for_jobs" {{ (isset($item) && $item->for_jobs ? 'checked' : '') }}>
</div>


<div class="form-group mb-4 col-md-2">
    <label for="for_alarm">Alert Service</label>
    <input type="checkbox" class="" id="for_alarm"
        name="for_alarm" {{ (isset($item) && $item->for_alarm ? 'checked' : '') }}>
</div>