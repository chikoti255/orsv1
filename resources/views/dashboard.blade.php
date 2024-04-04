<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <!--{{ __('Dashboard') }}-->
            Attendance Summary
        </h2>
    </x-slot>

    <style>
        .progress-bar {
          width: 70%;
          height: 5px;
          background-color: #ddd;
          border-radius: 4px;
        }
        .progress {
          width: 100%;
          height: 100%;
          background-color: #cccccc;
          border-radius: 4px;
        }
        a.scan-button {
          background-color: #3399cc;
          cursor: pointer;
          text-decoration: none;
        }



    </style>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                        <div class="flex justify-between space-x-4">
                              <div style="color: white; background-color: #3399cc; font-weight: bold; border-radius: 7px;" class="flex flex-row justify-center items-center border p-4">
                                    <div>
                                        <span class="material-symbols-outlined">
                                        app_registration</span>
                                    </div>
                                    <div class="flex flex-col items-center">
                                        <p>125</p>
                                        <p>Registered</p>
                                    </div>
                              </div>
                              <div style="color: white; background-color: #3399cc; font-weight: bold; border-radius: 7px;" class="flex flex-row justify-center items-center border p-4">
                                    <div>
                                          <span class="material-symbols-outlined">
                                            select_check_box</span>
                                    </div>
                                    <div class="flex flex-col items-center">
                                            <p>23</p>
                                            <p>Checked In</p>
                                    </div>
                              </div>
                              <div style="color: white; background-color: #3399cc; font-weight: bold; border-radius: 7px;" class="flex flex-row justify-center items-center border p-4">
                                    <div>
                                          <span class="material-symbols-outlined">
                                            event_busy</span>
                                    </div>
                                    <div class="flex flex-col items-center">
                                          <p>158</p>
                                          <p>Absent</p>
                                    </div>
                              </div>
                        </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mt-4 mx-auto sm:px-6 lg:px-8">
          <h3 class="font-semibold">{{__('Details and summary')  }}</h3>
            <div class="bg-white overflow-hidden shadow-sm p-4">

                <div class="container mb-4">
                    <div class="flex justify-between items-center">
                        <p>{{__('Room 1')}}<p>
                          <div class="progress-bar">
                              <div class="progress"></div>
                          </div>
                    </div>
                </div>

                <div class="container mb-4">
                    <div class="flex justify-between items-center">
                        <p>{{__('Room 2')}}<p>
                          <div class="progress-bar">
                              <div class="progress"></div>
                          </div>
                    </div>
                </div>

                <div class="container">
                    <div class="flex justify-between items-center">
                        <p>{{__('Room 3')}}<p>
                          <div class="progress-bar">
                              <div class="progress"></div>
                          </div>
                    </div>
                </div>

            </div>

            <div class="flex justify-between px-4 mt-4">

                  <a href="{{ route('scanner') }}" class="scan-button text-white py-2 px-4 rounded-md"><span class="material-symbols-outlined">
                    qr_code_scanner
                    </span>Scan QR</a>
            </div>

        </div>



    </div>
</x-app-layout>
