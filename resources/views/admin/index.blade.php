<x-admin_master>
    @section('content')
        @if(auth()->user()->userHasRole('admin'))
        <h1>Dashboard</h1>
        @endif
    @endsection
</x-admin_master>
