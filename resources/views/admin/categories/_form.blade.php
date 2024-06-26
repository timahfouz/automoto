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
    <label for="for_brands">Related to brands?</label>
    <input type="checkbox" class="" id="for_brands"
        name="for_brands" {{ (isset($item) && $item->for_brands ? 'checked' : '') }}>
</div>

<div class="form-group mb-4 col-md-2">
    <label for="for_jobs">Job Category</label>
    <input type="checkbox" class="" id="for_jobs"
        name="for_jobs" {{ (isset($item) && $item->for_jobs ? 'checked' : '') }}>
</div>


<div class="row">
    <div class="form-group mb-4 col-md-4">
        <label for="visible"> Is Visible:</label>
        <select class="form-control" id="visible" name="visible">
            <option value="1">إظهار</option>
            <option {{(isset($item) ? !$item->visible ? 'selected' : '' : '')}} value="0">إخفاء</option>
        </select>
    </div>

    <div class="form-group mb-4 col-md-6">
        <label for="order"> Order:</label>
        <input type="number" step="1" min="1" class="form-control @error('order') is-invalid @enderror" id="order"
            name="order" placeholder="order" value="{{old('order', (isset($item) ? $item->order : ''))}}">
    </div>

</div>