<x-app-layout>
    @section('style')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    @endsection
    <x-slot name="header">
        <h2 class="flex justify-between font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Trucks') }}
            <a href="{{ route('trucks.create') }}">+Add Truck</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table id="truck_list" class="display" style="width:100%">
                    <thead>
                            <tr>
                                <th>Make</th>
                                <th>Model</th>
                                <th>Year</th>
                                <th>Seats</th>
                                <th>Colour</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($trucks as $truck)
                                <tr>
                                    <td>{{ $truck->make }}</td>
                                    <td>{{ $truck->model }}</td>
                                    <td>{{ $truck->year }}</td>
                                    <td>{{ $truck->seats }}</td>
                                    <td>{{ $truck->colour }}</td>
                                    <td>
                                        <a href="{{ route('trucks.show', $truck->id) }}" class="text-blue-600 hover:text-blue-800 visited:text-purple-600">Edit</a> &nbsp; 
                                        <a href="javascript:void(0)" class="text-red-50" data-id="{{ $truck->id }}" onclick="confirmDelete(this);">Delete</a> 
                                        <form id="delete-truck-{{$truck->id}}" action="{{ route('trucks.delete', $truck->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @section('script')
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#truck_list').DataTable();
            });

            function confirmDelete(obj) 
            {
                var x = confirm('You won\'t be able to recover this truck details once deleted');
                if(x) {
                    var id = $(obj).data('id');
                    document.getElementById('delete-truck-'+id).submit();
                }
            }
        </script>
    @endsection
</x-app-layout>
