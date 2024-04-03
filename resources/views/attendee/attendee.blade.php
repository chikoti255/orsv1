<x-app-layout>
  <div class="mt-3 px-3">
          <div class="flex justify-between">
                <x-nav-link :href="route('attendee.registered')" :active="request()->routeIs('attendee.registered')">
                      <span class="material-symbols-outlined">
                      sort
                      </span>{{ __('All') }}
                </x-nav-link>

                <x-nav-link :href="route('attendee.checkedIn')" :active="request()->routeIs('attendee.checkedIn')">
                      <span class="material-symbols-outlined">
                      fact_check
                      </span>{{ __('Checked In') }}
                </x-nav-link>

                <x-nav-link :href="route('attendee.absent')" :active="request()->routeIs('attendee.absent')">
                        <span class="material-symbols-outlined">
                        problem
                        </span>{{ __('Absent') }}
                </x-nav-link>
        </div>

        <div class="relative mt-3">
            <input type="text" placeholder="Search by name or email" class="w-full pl-10 pr-4 py-2 border border-gray-300 focus:outline-none focus:border-indigo-500 sm:rounded-lg">

        </div>

          <div>
                @yield('content')
          </div>

  </div>
</x-app-layout>
