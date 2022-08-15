{{--
	Lenderkit OÜ is the owner or the licensee of all intellectual property rights in this file.
	These are protected by copyright laws and treaties around the world.
	You must not make copies via any medium or download any extracts from any part of this file unless expressly authorised to do so.
--}}

@section('right_sidebar')
    <datatables-filter inline-template table-id="siteRequests">
        @component('admin::components.grid_filter')
            @gridFilter('site_requests::site_requests_grid')
        @endcomponent
    </datatables-filter>
@endsection
