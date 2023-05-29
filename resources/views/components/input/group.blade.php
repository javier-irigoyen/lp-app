@props(['label', 'for', 'error' => false])
<div class=" mb-3">
    <label for="{{ $for }}" class="form-label">{{ $label }}</label>
    {{ $slot }}
    @if ($error)
        <div class="invalid-feedback">
            *{{ $error }}
        </div>
    @endif
</div>
