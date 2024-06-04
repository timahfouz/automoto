<div class="form-group mt-4">
    <label for="commission">Privacy & Ploicies:</label>
    <textarea min="0" step="0.1" class="form-control @error('privacy') is-invalid @enderror" id="privacy"
        rows="7" name="privacy" placeholder="What's your privacy policy?">{{ $privacy ?? '' }}</textarea>
</div>


<div class="form-group mt-4">
    <label for="commission">About Us</label>
    <textarea min="0" step="0.1" class="form-control @error('about') is-invalid @enderror" id="about"
        rows="7" name="about" placeholder="Type something about your app">{{ $about ?? '' }}</textarea>
</div>


<div class="row">
    <div class="form-group mb-4 col-md-6">
        <label for="twitter"> Twitter:</label>
        <input type="text" required class="form-control @error('twitter') is-invalid @enderror" id="name"
            name="twitter" placeholder="Twitter" value="{{old('name', (isset($twitter) ? $twitter : ''))}}">
    </div>

    <div class="form-group mb-4 col-md-6">
        <label for="instagram"> Instagram:</label>
        <input type="text" required class="form-control @error('instagram') is-invalid @enderror" id="name"
            name="instagram" placeholder="Instagram" value="{{old('name', (isset($instagram) ? $instagram : ''))}}">
    </div>
</div>

<div class="row">
    <div class="form-group mb-4 col-md-6">
        <label for="facebook"> Facebook:</label>
        <input type="text" required class="form-control @error('facebook') is-invalid @enderror" id="name"
            name="facebook" placeholder="Facebook" value="{{old('name', (isset($facebook) ? $facebook : ''))}}">
    </div>

    <div class="form-group mb-4 col-md-6">
        <label for="website"> Website:</label>
        <input type="text" required class="form-control @error('website') is-invalid @enderror" id="name"
            name="website" placeholder="Website" value="{{old('name', (isset($website) ? $website : ''))}}">
    </div>
</div>