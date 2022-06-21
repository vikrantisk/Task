<x-app-layout>
    @section('style')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    @endsection
    <x-slot name="header">
        <h2 class="flex justify-between font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cars') }}
            <a href="{{ route('cars.create') }}">+Add Car</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table id="car_list" class="display" style="width:100%">
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
                            @foreach($cars as $car)
                                <tr>
                                    <td>{{ $car->make }}</td>
                                    <td>{{ $car->model }}</td>
                                    <td>{{ $car->year }}</td>
                                    <td>{{ $car->seats }}</td>
                                    <td>{{ $car->colour }}</td>
                                    <td>
                                        <a href="{{ route('cars.show', $car->id) }}" class="text-blue-600 hover:text-blue-800 visited:text-purple-600">Edit</a> &nbsp; 
                                        <a href="javascript:void(0)" class="text-red-50" data-id="{{ $car->id }}" onclick="confirmDelete(this);">Delete</a> 
                                        <form id="delete-car-{{$car->id}}" action="{{ route('cars.delete', $car->id) }}" method="POST">
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
                $('#car_list').DataTable();
            });

            function confirmDelete(obj) 
            {
                var x = confirm('You won\'t be able to recover this car details once deleted');
                if(x) {
                    var id = $(obj).data('id');
                    document.getElementById('delete-car-'+id).submit();
                }
            }
            
        </script>
    @endsection
</x-app-layout>
