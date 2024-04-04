<x-app-layout>
  <script src="https://cdn.tailwindcss.com"></script>


<style>

</style>

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

        <!--search -->

          <div>
                @yield('content')
          </div>

  </div>
</x-app-layout>
