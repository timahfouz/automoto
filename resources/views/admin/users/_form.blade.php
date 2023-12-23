<div class="row">
    <div class="form-group mb-4 col-md-4">
        <label for="name"> Choose Image: </label>
        <input type="file" class="form-control" id="image"
            name="image">
    </div>
</div>

<div class="row">
    <div class="form-group mb-4 col-md-4">
        <label for="name"> Name:</label>
        <input type="text" required class="form-control @error('name') is-invalid @enderror" id="name"
                name="name" placeholder="Name" value="{{old('name', (isset($item) ? $item->name : ''))}}">
    </div>

    <div class="form-group mb-4 col-md-4">
        <label for="phone"> Phone:</label>
        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                name="phone" placeholder="Phone" value="{{old('phone', (isset($item) ? $item->phone : '') )}}">
    </div>

    <div class="form-group mb-4 col-md-4">
        <label for="email"> Email:</label>
        <input type="email" required class="form-control @error('email') is-invalid @enderror" id="email"
                name="email" placeholder="Email" value="{{old('email', (isset($item) ? $item->email : '') )}}">
    </div>
</div>


<div class="row">
    <div class="form-group mb-4 col-md-6">
        <label for="password">Password:</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
            name="password" placeholder="Password">
    </div>
    <div class="form-group mb-4 col-md-6">
        <label for="password_confirmation"> Confirm Password:</label>
        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation"
            name="password_confirmation" placeholder="Confirm Password">
    </div>
</div>


<div class="form-group mb-4 col-md-6">
    <label for="verified"> Activate / Deactivate:</label>
    <input type="checkbox" class="" id="verified"
        name="verified" {{ (isset($item) && $item->verified ? 'checked' : '') }}>
</div>