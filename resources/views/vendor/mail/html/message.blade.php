@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
{{--{{ config('app.name') }}--}}
<img src="{{asset('home/images/somarphoenix.png')}}" class="logo" alt="{{config('app.name')}}" style="width:100px;">
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
   <p>
       © {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
   </p>
@endcomponent
@endslot
@endcomponent
