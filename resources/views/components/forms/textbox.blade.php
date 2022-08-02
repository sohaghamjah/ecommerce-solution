<div class="form-group {{ $col ?? '' }}">
    <label for="{{ $name }}" {{ $required ?? '' }}>{{ $label }}</label>
    <input type="{{ $type ?? 'text' }}" name="{{ $name }}" id="{{ $name }}" class="form-control {{ $class ?? '' }}" value="{{ $value ?? '' }}" placeholder="{{ $placeholder ?? '' }}" value="{{ $value ?? old($name) }}">
</div>