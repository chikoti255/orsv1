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
          background-color: #4CAF50;
          border-radius: 4px;
        }
        .button {
          background-color: green;
        }
    </style>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                        <div class="flex justify-between space-x-4">
                              <div class="flex flex-col justify-center items-center border p-4">
                                    <p>125</p>
                                    <p>Registered</p>
                              </div>
                              <div class="flex flex-col justify-center items-center border p-4">
                                    <p>23</p>
                                    <p>Checked In</p>
                              </div>
                              <div class="flex flex-col justify-center items-center border p-4">
                                    <p>158</p>
                                    <p>Absent</p>
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
                  <button class="button text-white py-2 px-4 rounded-md">View Users</button>
                  <button class="button text-white py-2 px-4 rounded-md">Scan QR</button>
            </div>

        </div>



    </div>
</x-app-layout>
