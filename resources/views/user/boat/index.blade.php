<x-app-layout>
    @section('style')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    @endsection
    <x-slot name="header">
        <h2 class="flex justify-between font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Boats') }}
            <a href="{{ route('boats.create') }}">+Add Boat</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table id="boat_list" class="display" style="width:100%">
                    <thead>
                            <tr>
                                <th>Make</th>
                                <th>Model</th>
                                <th>Year</th>
                                <th>Length</th>
                                <th>Width</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($boats as $boat)
                                <tr>
                                    <td>{{ $boat->make }}</td>
                                    <td>{{ $boat->model }}</td>
                                    <td>{{ $boat->year }}</td>
                                    <td>{{ $boat->length }}</td>
                                    <td>{{ $boat->width }}</td>
                                    <td>
                                        <a href="{{ route('boats.show', $boat->id) }}" class="text-blue-600 hover:text-blue-800 visited:text-purple-600">Edit</a> &nbsp; 
                                        <a href="javascript:void(0)" class="text-red-50" data-id="{{ $boat->id }}" onclick="confirmDelete(this);">Delete</a> 
                                        <form id="delete-boat-{{$boat->id}}" action="{{ route('boats.delete', $boat->id) }}" method="POST">
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
                $('#boat_list').DataTable();
            });

            function confirmDelete(obj) 
            {
                var x = confirm('You won\'t be able to recover this boat details once deleted');
                if(x) {
                    var id = $(obj).data('id');
                    document.getElementById('delete-boat-'+id).submit();
                }
            }
        </script>
    @endsection
</x-app-layout>
