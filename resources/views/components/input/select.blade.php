@props(['key', 'error' => false])
<select {{ $attributes }} class="form-select fs-5 @if ($error) is-invalid @endif">
    <option disabled selected></option>
    @foreach ($key as $value)
        <option value="{{ intval($value->id )}}">
            {{ $value->name }}
        </option>
    @endforeach
</select>
