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
