<div class="row">
    <div class="form-group mb-4 col-md-4">
        <label for="name"> Choose Image: </label>
        <input type="file" class="form-control" id="image"
            name="image">
    </div>
</div>

<div class="row">
    <div class="form-group mb-4 col-md-6">
        <label for="name"> Name:</label>
        <input type="text" required class="form-control @error('name') is-invalid @enderror" id="name"
            name="name" placeholder="Name" value="{{old('name', (isset($item) ? $item->name : ''))}}">
    </div>
</div>

<div class="form-group mb-4 col-md-2">
    <label for="for_jobs">Job Category</label>
    <input type="checkbox" class="" id="for_jobs"
        name="for_jobs" {{ (isset($item) && $item->for_jobs ? 'checked' : '') }}>
</div>

<div class="form-group mb-4 col-md-2">
    <label for="for_alarm">Alert Category</label>
    <input type="checkbox" class="" id="for_alarm"
        name="for_alarm" {{ (isset($item) && $item->for_alarm ? 'checked' : '') }}>
</div>

