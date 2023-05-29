@props(['error' => false])
<input {{ $attributes }} class="form-control @if ($error) is-invalid @endif">
