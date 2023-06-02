@php
    $error = $error ?? session()->get('error');
    $message = $message ?? session()->get('$message')
@endphp

@if($message)
    <div class="alert alert-success">
        {{ $message }}
    </div>
@endif

@if($error)
    <div class="alert alert-danger">
        {{ $error }}
    </div>
@endif
