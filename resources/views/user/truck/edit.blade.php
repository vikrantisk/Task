<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{ __('Trucks') }}
      </h2>
   </x-slot>
   <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
               <!-- Validation Errors -->
               <x-auth-validation-errors class="mb-4" :errors="$errors" />
               <form method="POST" action="{{ route('trucks.update', $truck->id) }}">
                  @csrf
                  @method("PATCH")
                  <!-- Make -->
                  <div>
                     <x-label for="make" :value="__('Make')" />
                     <x-input id="make" class="block mt-1 w-full" type="text" name="make" :value="old('make', $truck->make)" required autofocus />
                  </div>
                  <!-- Model -->
                  <div class="mt-4">
                     <x-label for="model" :value="__('Model')" />
                     <x-input id="model" class="block mt-1 w-full" type="text" name="model" :value="old('model', $truck->model)" required />
                  </div>
                  <!-- Year -->
                  <div class="mt-4">
                     <x-label for="year" :value="__('Year')" />
                     <x-input id="year" class="block mt-1 w-full" type="number" name="year" :value="old('year', $truck->year)" required />
                  </div>
                  <!-- Seats -->
                  <div class="mt-4">
                     <x-label for="seats" :value="__('Seats')" />
                     <x-input id="seats" class="block mt-1 w-full" type="number" name="seats" :value="old('seats', $truck->seats)" required />
                  </div>
                  <!-- Bed Length -->
                  <div class="mt-4">
                     <x-label for="bed_length" :value="__('Bed Length')" />
                     <x-input id="bed_length" class="block mt-1 w-full" type="number" name="bed_length" :value="old('bed_length', $truck->bed_length)" required />
                  </div>
                  <!-- Colour -->
                  <div class="mt-4">
                     <x-label for="colour" :value="__('Colour')" />
                     <x-input id="colour" class="block mt-1 w-full" type="color" name="colour" :value="old('colour', $truck->colour)" required />
                  </div>
                  <!-- VIN -->
                  <div class="mt-4">
                     <x-label for="vin" :value="__('VIN')" />
                     <x-input id="vin" class="block mt-1 w-full" type="text" name="vin" :value="old('vin', $truck->vin)" required />
                  </div>
                  <!-- Current Mileage -->
                  <div class="mt-4">
                     <x-label for="current_mileage" :value="__('Current Mileage')" />
                     <x-input id="current_mileage" class="block mt-1 w-full" type="number" name="current_mileage" :value="old('current_mileage', $truck->current_mileage)" step="0.01" required />
                  </div>
                  <!-- Service Interval -->
                  <div class="mt-4">
                     <x-label for="service_interval" :value="__('Service Interval')" />
                     <x-input id="service_interval" class="block mt-1 w-full" type="number" name="service_interval" :value="old('service_interval', $truck->service_interval)" required />
                  </div>
                  <!-- Next Service -->
                  <div class="mt-4">
                     <x-label for="next_service" :value="__('Next Service')" />
                     <x-input id="next_service" class="block mt-1 w-full" type="date" name="next_service" :value="old('next_service', $truck->next_service)" required />
                  </div>
                  
                  <div class="flex items-center justify-end mt-4">
                     <x-button class="ml-4">
                        {{ __('Update') }}
                     </x-button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</x-app-layout>