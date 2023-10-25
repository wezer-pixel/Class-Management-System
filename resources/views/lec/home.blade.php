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
                <a href="{{url('submissions')}}" class="nav-link mb-0 m-4 p-2">
                    Submissions
                  </a>
            </div>
            <div class="bg-gray-500 m-4 p-2 text-white text-xl rounded-lg">
                <a href="#" class="nav-link mb-0 m-4 p-2">
                    Timetable
                  </a>
            </div>
        </div>
      </aside>
  
      <!-- Main Content -->
      <div class="flex-grow bg-gray-100 w-full">

        <main class="p-6 sm:p-10 space-y-6">
            <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
                <div class="mr-6">
                    @if ($data)
                        <h1 class="text-4xl font-semibold mb-2">Welcome To Your School Dashboard {{ $data->name }}</h1>
                    @else
                        <p>Sir</p>
                    @endif
                
                
                    <h2 class="text-gray-600 ml-0.5">
                        Assign tasks to students and mark their assignments
                    </h2>
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
                        <button class="btn btn-primary text-white bg-purple-600 my-2 p-2 rounded-md">View Assignments</button>
                    </a>
                </div>                   
            </div>
            @endforeach

        </section>
        <!-- end section assignments -->
        <section class="grid md:grid-cols-2 xl:grid-cols-4 xl:grid-rows-3 xl:grid-flow-col gap-6">
            <div class="flex flex-col md:col-span-2 md:row-span-2 bg-white shadow rounded-lg">
              <div class="px-6 py-5 font-semibold border-b border-gray-100">School Events and Planning</div>
              
                <div class="flex items-center justify-center h-full px-4 py-16 text-gray-400 text-xl font-semibold bg-gray-100 border-2 border-gray-200 rounded-md">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Et tempore corporis culpa tenetur atque a. Officiis dolor eius optio saepe? Architecto voluptatem doloremque porro expedita aperiam similique beatae ea dolores?
                </div>
              
            </div>

        </section>

        </main>
  </div>
</x-app-layout>