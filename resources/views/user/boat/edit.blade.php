<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{ __('Boats') }}
      </h2>
   </x-slot>
   <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
               <!-- Validation Errors -->
               <x-auth-validation-errors class="mb-4" :errors="$errors" />
               <form method="POST" action="{{ route('boats.update', $boat->id) }}">
                  @csrf
                  @method('PATCH')
                  <!-- Make -->
                  <div>
                     <x-label for="make" :value="__('Make')" />
                     <x-input id="make" class="block mt-1 w-full" type="text" name="make" :value="old('make', $boat->make)" required autofocus />
                  </div>
                  <!-- Model -->
                  <div class="mt-4">
                     <x-label for="model" :value="__('Model')" />
                     <x-input id="model" class="block mt-1 w-full" type="text" name="model" :value="old('model', $boat->model)" required />
                  </div>
                  <!-- Year -->
                  <div class="mt-4">
                     <x-label for="year" :value="__('Year')" />
                     <x-input id="year" class="block mt-1 w-full" type="number" name="year" :value="old('year', $boat->year)" required />
                  </div>
                  <!-- Length -->
                  <div class="mt-4">
                     <x-label for="length" :value="__('Length')" />
                     <x-input id="length" class="block mt-1 w-full" type="number" name="length" :value="old('length', $boat->length)" required />
                  </div>
                  <!-- Width -->
                  <div class="mt-4">
                     <x-label for="width" :value="__('Width')" />
                     <x-input id="width" class="block mt-1 w-full" type="number" name="width" :value="old('width', $boat->width)" required />
                  </div>
                  <!-- HIN -->
                  <div class="mt-4">
                     <x-label for="hin" :value="__('HIN')" />
                     <x-input id="hin" class="block mt-1 w-full" type="text" name="hin" :value="old('hin', $boat->hin)" required />
                  </div>
                  <!-- Current Mileage -->
                  <div class="mt-4">
                     <x-label for="current_hours" :value="__('Current Hours')" />
                     <x-input id="current_hours" class="block mt-1 w-full" type="number" name="current_hours" :value="old('current_hours', $boat->current_hours)" step="0.01" required />
                  </div>
                  <!-- Service Interval -->
                  <div class="mt-4">
                     <x-label for="service_interval" :value="__('Service Interval')" />
                     <x-input id="service_interval" class="block mt-1 w-full" type="number" name="service_interval" :value="old('service_interval', $boat->service_interval)" required />
                  </div>
                  <!-- Next Service -->
                  <div class="mt-4">
                     <x-label for="next_service" :value="__('Next Service')" />
                     <x-input id="next_service" class="block mt-1 w-full" type="date" name="next_service" :value="old('next_service', $boat->next_service)" required />
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