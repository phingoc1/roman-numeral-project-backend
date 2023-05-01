@extends('layout.default')

@section('content')
    <div class="osg-content osg-padding-8">
        <h2>Roman Numeral Converter, Easy version</h2>
        <p>
            Rules and validation:
        </p>
        <ol class="osg-ordered-list">
            <li class="osg-ordered-list__item">Form cannot be submitted empty.</li>
            <li class="osg-ordered-list__item">Value can only be 1 character. </li>
            <li class="osg-ordered-list__item">Character must be a valid Roman Numeral Character.</li>
            <li class="osg-ordered-list__item">It is case in-sensitive.</li>
        </ol>
        <p>
            Error will be shown if:
        </p>
        <ol class="osg-ordered-list">
            <li class="osg-ordered-list__item">Form is submitted empty.</li>
            <li class="osg-ordered-list__item">Value length is greater than 1 character.</li>
            <li class="osg-ordered-list__item">Character is not a valid Roman Numeral Character.</li>
        </ol>
        <form action="{{ route('easyConvert') }}" method="POST" autocomplete="on">
            @csrf
            <div class="osg-grid">
                <div class="osg-grid__column--12 osg-grid__column--4-breakpoint-medium">
                    <div class="osg-input osg-margin-top-8">
                        <label class="osg-input__label">
                            Roman Numeral Letter
                            <input class="osg-input__input" maxlength="1" name="romanNumeral" type="text" autocomplete="on" placeholder="I, V, X, C, L or M" aria-describedby="required-1">
                        </label>
                        <div class="osg-input__required">* Required</div>
                        @error('romanNumeral')
                            <div class="osg-status-message osg-status-message--danger osg-margin-top-4">
                                <p class="osg-status-message__heading"><span class="osg-status-message__icon osg-icon--error-hexa" aria-hidden="true"></span>{{ $message }}</p>
                            </div>
                        @enderror
                        @isset($result)
                            <div class="osg-status-message osg-status-message--success osg-margin-top-4">
                                <p class="osg-status-message__heading"><span class="osg-status-message__icon osg-icon--success-square" aria-hidden="true"></span>Roman Numeral Letter {{ strtoupper($result['input']) }} is {{ $result['value'] }}</p>
                            </div>
                        @endisset
                    </div>
                </div>
            </div>
            <p>
                <button type="submit" class="osg-button osg-margin-top-4">Convert to number</button>
            </p>
        </form>
    </div>
@endsection
