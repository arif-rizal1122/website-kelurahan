<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <input type="{{ $type ?? 'text' }}" name="{{ $name }}" id="{{ $name }}" class="form-control" value="{{ old($name, $value) }}" {{ $attributes }}>

    @error($name)
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror
</div>
