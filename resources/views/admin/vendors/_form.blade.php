<div class="row">
    <div class="form-group mb-4 col-md-4">
        <label for="name"> Choose Image: </label>
        <input type="file" class="form-control" id="image"
            name="image">
    </div>
    <div class="form-group mb-4 col-md-4">
        <label for="name"> Choose Background Image: </label>
        <input type="file" class="form-control" id="image"
            name="bg_image">
    </div>
</div>


<div class="row">
    <div class="form-group mb-4 col-md-8">
        <label for="name"> Vendor Name:</label>
        <input type="text" required class="form-control @error('name') is-invalid @enderror" id="name"
                name="name" placeholder="Name" value="{{old('name', (isset($item) ? $item->name : ''))}}">
    </div>
</div>

<div class="row">
    <div class="form-group mb-4 col-md-8">
        <label for="geo_url"> Location from google map: <a style="color: blue;border-bottom: 1px dashed blue;" target="_blank" href="https://maps.google.com">Google maps</a></label>
        <input type="text" class="form-control @error('geo_url') is-invalid @enderror" id="geo_url"
                name="geo_url" placeholder="Location from google map" value="{{old('geo_url', (isset($item) ? $item->geo_url : ''))}}">
    </div>
</div>

<div class="row">
    <div class="form-group mb-4 col-md-4">
        <label for="name"> Vendor Phone:</label>
        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                name="phone" placeholder="Phone" value="{{old('phone', (isset($item) ? $item->phone : ''))}}">
    </div>
    <div class="form-group mb-4 col-md-4">
        <label for="name"> Vendor Whatsapp:</label>
        <input type="text" class="form-control @error('whatsapp') is-invalid @enderror" id="whatsapp"
                name="whatsapp" placeholder="Whatsapp" value="{{old('whatsapp', (isset($item) ? $item->whatsapp : ''))}}">
    </div>
</div>

<div class="row">
    <div class="form-group mb-4 col-md-8">
        <label for="geo_url">Bio:</label>
        <textarea rows="10" class="form-control @error('bio') is-invalid @enderror" id="bio"
                name="bio" placeholder="Type something about this vendor" >{{old('bio', (isset($item) ? $item->bio : ''))}}</textarea>
    </div>
</div>


<div class="row">
    <div class="form-group mb-4 col-md-4">
        <label for="city_id"> Select City:</label>
        <select class="form-control" id="city_id" name="city_id">
            @foreach($cities as $city)
            <option {{(isset($item) ? ($item->city_id == $city->id) ? 'selected' : '' : '')}} value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group mb-4 col-md-4">
        <label for="category_id"> Select Category:</label>
        <select required class="form-control" id="category_id" name="category_id">
            @foreach($categories as $category)
            <option {{(isset($item) ? ($item->category_id == $category->id) ? 'selected' : '' : '')}} value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    
</div>

<div class="row">

    <div class="form-group mb-4 col-md-4">
        <label for="brand_id"> Select Brand (optional):</label>
        <select class="form-control" id="brand_id" name="brand_id">
            <option value="">Select Brand</option>
            @foreach($brands as $brand)
            <option {{(isset($item) ? ($item->brand_id == $brand->id) ? 'selected' : '' : '')}} value="{{ $brand->id }}">{{ $brand->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group mb-4 col-md-4">
        <label for="brand_id"> Select Service (optional):</label>
        <select class="form-control" id="brand_id" name="brand_id">
            <option value="">Select Service</option>
            @foreach($services as $service)
            <option {{(isset($item) ? ($item->service_id == $service->id) ? 'selected' : '' : '')}} value="{{ $service->id }}">{{ $service->name }}</option>
            @endforeach
        </select>
    </div>

</div>

<label for="brand_id">Select type if it's a job service:</label>
<div class="row">
    <div class="form-group mb-4 col-md-2">
        <select class="form-control" id="brand_id" name="service_type">
            <option value="">Select Type</option>
            <option {{(isset($item) ? ($item->is_driver == 1) ? 'selected' : '' : '')}} value="is_driver">Is a driver</option>
            <option {{(isset($item) ? ($item->is_new_job == 1) ? 'selected' : '' : '')}} value="is_new_job">New Job</option>
        </select>
    </div>
</div>


<!-- 
<div class="form-group mb-4 col-md-2">
    <label for="for_jobs">Job Service</label>
    <input type="checkbox" class="" id="for_jobs"
        name="for_jobs" {{ (isset($item) && $item->for_jobs ? 'checked' : '') }}>
</div>


<div class="form-group mb-4 col-md-2">
    <label for="for_alarm">Alert Service</label>
    <input type="checkbox" class="" id="for_alarm"
        name="for_alarm" {{ (isset($item) && $item->for_alarm ? 'checked' : '') }}>
</div> -->