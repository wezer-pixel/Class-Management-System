<x-app-layout>
    <div class="flex flex-row">
      <!-- Sidebar -->
      <aside class="hidden sm:flex sm:flex-col w-18 bg-gray-800 text-gray-500">
        <div class="flex flex-col p-2 space-y-2">
            <div class="bg-gray-500 mb-0 m-4 p-2 text-white text-xl rounded-lg">
                <a href="{{url('show_assignment')}}" class="nav-link mb-0 m-4 p-2">
                    Assignments
                  </a>
            </div>
            <div class="bg-gray-500 m-4 p-2 text-white text-xl rounded-lg">
                <a href="#" class="nav-link mb-0 m-4 p-2">
                    My Courses
                  </a>
            </div>
            <div class="bg-gray-500 m-4 p-2 text-white text-xl rounded-lg">
                <a href="#" class="nav-link mb-0 m-4 p-2">
                    Timetable
                  </a>
            </div>
            <div class="bg-gray-500 m-4 p-2 text-white text-xl rounded-lg">
                <a href="#" class="nav-link mb-0 m-4 p-2">
                    Library
                  </a>
            </div>
        </div>
      </aside>
  
      <!-- Main Content -->
      <div class="flex-grow bg-gray-100">

        <main class="p-6 sm:p-10 space-y-6">
        <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
            <div class="mr-6">
                @if ($data)
                    <h1 class="text-4xl font-semibold mb-2">Welcome To Your Student Dashboard {{ $data->name }}</h1>
                @else
                    <p>Student</p>
                @endif
            
            
            <h2 class="text-gray-600 ml-0.5">
                Access your education material here and submit your assignments safely and on time
            </h2>
            </div>
            <div class="flex flex-wrap items-start justify-end -mb-3">
            <button class="inline-flex px-5 py-3 text-purple-600 hover:text-purple-700 focus:text-purple-700 hover:bg-purple-100 focus:bg-purple-100 border border-purple-600 rounded-md mb-3">
                <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="flex-shrink-0 h-5 w-5 -ml-1 mt-0.5 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                </svg>
                Report Issue
            </button>
            <button class="inline-flex px-5 py-3 text-white bg-purple-600 hover:bg-purple-700 focus:bg-purple-700 rounded-md ml-6 mb-3">
                <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="flex-shrink-0 h-6 w-6 text-white -ml-1 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Show all Assignments
            </button>
            </div>
        </div>

        <section class="grid md:grid-cols-2 xl:grid-cols-2 gap-6">
            <!-- Card 1 -->

            @foreach ($assignment as $task)
            <div class="flex items-center p-8 bg-white shadow rounded-lg">
                
                <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-purple-600 bg-purple-100 rounded-full mr-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 3h2a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2h3m2 18v-4a2 2 0 00-2-2H7a2 2 0 00-2 2v4M7 7h2m4 0h2m-6 4h6" />
                    </svg>
                </div>
                
                <div>
                    <span class="block text-2xl font-bold">Title: {{$task->title}}</span>
                    <span class="block text-2xl font-bold">Unit: {{$task->unit}}</span>
                    <span class="block text-gray-500">Time expected: {{$task->time_expected}} </span>
                    <a href="{{url('show_assignment')}}">
                        <button class="btn btn-primary text-white bg-purple-600 my-2 p-1 rounded-sm">View Assignment</button>
                    </a>
                </div>   
                
            </div>
            @endforeach
           
        </section>
        <!-- end section assignments -->
        <section class="grid md:grid-cols-2 xl:grid-cols-4 xl:grid-rows-3 xl:grid-flow-col gap-6">
            <div class="flex flex-col md:col-span-2 md:row-span-2 bg-white shadow rounded-lg">
              <div class="px-6 py-5 font-semibold border-b border-gray-100">School Updates will appear here soon.</div>
              <div class="p-4 flex-grow">
                <div class="flex items-center justify-center h-full px-4 py-16 text-gray-400 text-xl font-semibold bg-gray-100 border-2 border-gray-200 border-dashed rounded-md">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Et tempore corporis culpa tenetur atque a. Officiis dolor eius optio saepe? Architecto voluptatem doloremque porro expedita aperiam similique beatae ea dolores?
                </div>
              </div>
            </div>

        </section>

        </main>
  </div>
</x-app-layout>