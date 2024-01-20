<x-admin.error-feedback />


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
        <select onChange='getAreas()' class="form-control" id="city_id" name="city_id">
            @foreach($cities as $city)
            <option {{(isset($item) ? ($item->city_id == $city->id) ? 'selected' : '' : '')}} value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group mb-4 col-md-4">
        <label for="area_id"> Select Area:</label>
        <select class="form-control" id="area_id" name="area_id">
            @foreach($areas as $area)
            <option {{(isset($item) ? ($item->area_id == $area->id) ? 'selected' : '' : '')}} value="{{ $area->id }}">{{ $area->name }}</option>
            @endforeach
        </select>
    </div>

</div>

<div class="row">

    <div class="form-group mb-4 col-md-8">
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
        <label for="start_time"> Select start time:</label>
        <input type="time" name="start_time" id="start_time" class="form-control" value="{{old('start_time', (isset($item) ? $item->start_time : ''))}}">
    </div>

    <div class="form-group mb-4 col-md-4">
        <label for="end_time"> Select end time:</label>
        <input type="time" name="end_time" id="end_time" class="form-control" value="{{old('end_time', (isset($item) ? $item->end_time : ''))}}">
    </div>

</div>

<div class="row">

    <div class="form-group mb-4 col-md-4">
        <label for="brand_id"> Select Brands (optional):</label>
        <select multiple class="form-control" id="brand_id" name="brands[]">
            <option value="-1">All Brands</option>
            @foreach($brands as $brand)
            <option {{(isset($item) ? in_array($brand->id, $item->brands()->pluck('brand_id')->toArray()) ? 'selected' : '' : '')}} value="{{ $brand->id }}">{{ $brand->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group mb-4 col-md-4">
        <label for="servic_id"> Select Services (optional):</label>
        <select multiple class="form-control" id="servic_id" name="services[]">
            @foreach($services as $service)
            <option {{(isset($item) ? in_array($service->id, $item->services()->pluck('service_id')->toArray()) ? 'selected' : '' : '')}} value="{{ $service->id }}">{{ $service->name }}</option>
            @endforeach
        </select>
    </div>

</div>

{{-- <label for="brand_id">Select type if it's a job service:</label>
<div class="row">
    <div class="form-group mb-4 col-md-2">
        <select class="form-control" id="brand_id" name="service_type">
            <option value="">Select Type</option>
            <option {{(isset($item) ? ($item->is_driver == 1) ? 'selected' : '' : '')}} value="is_driver">Is a driver</option>
            <option {{(isset($item) ? ($item->is_new_job == 1) ? 'selected' : '' : '')}} value="is_new_job">New Job</option>
        </select>
    </div>
</div> --}}


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




@push('scripts')
<script>
    function getAreas() {
        var city = document.getElementById("city_id");
        var area = document.getElementById("area_id");

        var cityID = city.value;

        var url = '{{ route('admin.city.areas', ['id' => ':id']) }}'.replace(':id', cityID);

        fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            
            let areas = data.data;

            area.innerHTML = '';

            areas.forEach((item) => {
                var option = document.createElement('option');
                option.value = item.id;
                option.text = item.name;
                area.add(option);
            });
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
</script>
@endpush