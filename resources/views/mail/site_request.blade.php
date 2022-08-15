{{--
	Lenderkit OÜ is the owner or the licensee of all intellectual property rights in this file.
	These are protected by copyright laws and treaties around the world.
	You must not make copies via any medium or download any extracts from any part of this file unless expressly authorised to do so.
--}}

@extends('core::layouts.mail')

@section('content_intro')
    <p style="{{ $style['paragraph'] }}">
        {{ $siteRequest->message }}
    </p>
@endsection

@section('salutation', '')
