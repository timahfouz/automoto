<div class="form-group mt-4">
    <label for="commission">Privacy & Ploicies:</label>
    <textarea min="0" step="0.1" class="form-control @error('privacy') is-invalid @enderror" id="privacy"
        rows="7" name="privacy" placeholder="privacy">{{ $privacy ?? '' }}</textarea>
</div>


<div class="form-group mt-4">
    <label for="commission">Terms & Conditions:</label>
    <textarea min="0" step="0.1" class="form-control @error('terms') is-invalid @enderror" id="terms"
        rows="7" name="terms" placeholder="Ploicies">{{ $terms ?? '' }}</textarea>
</div>
