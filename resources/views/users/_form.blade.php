@csrf

<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" class="form-control" id="name" required>
    @error('name')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}" class="form-control" id="email" required>
    @error('email')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="phone_number" class="form-label">Phone Number</label>
    <input type="text" name="phone_number" value="{{ old('phone_number', $user->phone_number ?? '') }}" class="form-control" id="phone_number" required>
    @error('phone_number')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="password" class="form-label">Password @if(isset($user)) <small>(Leave blank to keep current password)</small> @endif</label>
    <input type="password" name="password" class="form-control" id="password" {{ isset($user) ? '' : 'required' }}>
    @error('password')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">Submit</button>
