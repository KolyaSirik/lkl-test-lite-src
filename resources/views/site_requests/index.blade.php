{{--
	Lenderkit OÜ is the owner or the licensee of all intellectual property rights in this file.
	These are protected by copyright laws and treaties around the world.
	You must not make copies via any medium or download any extracts from any part of this file unless expressly authorised to do so.
--}}

@extends('admin::layouts.app')

@section('title', 'Site Requests')

@section('content')
    <section class="content-header">
        <h1>Site requests
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin::index') }}" title="Home">Home</a>
            </li>
            <li>
                <span>Site requests</span>
            </li>
        </ol>
        <div class="controls-buttons pull-right grid-buttons">
            <button class="btn btn-orange btn-single-icon" data-toggle="right-sidebar">
                <i class="lk-icon-sliders"></i>
            </button>
        </div>
    </section>
    <section class="content">
        <table id="siteRequests"
               class="table table-custom display nowrap dataTable"
               data-table-ajax="true"
               data-table-responsive
               data-url="{{ route('grids::items', 'site_requests::site_requests_grid') }}"
               data-has-opacity="true"
        >
            @gridHeader('site_requests::site_requests_grid')
        </table>
    </section>
@endsection

@include('site_requests::site_requests.filters.filter')
