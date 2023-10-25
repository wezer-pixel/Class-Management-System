<x-app-layout>
    <div class="flex flex-row">
      <!-- Sidebar -->
      <aside class="hidden sm:flex sm:flex-col w-18 bg-gray-800 text-gray-500">
        <div class="flex flex-col p-2 space-y-2 mx-2">
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
      <div class="flex-grow bg-gray-100">

        <main class="p-6 sm:p-10 space-y-6">
        <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
            <div class="mr-6">
                @if ($data)
                    <h1 class="text-4xl font-semibold mb-2">Welcome To Your School Dashboard {{ $data->name }}</h1>
                @else
                    <p>Sir</p>
                @endif
            
            
            <h2 class="text-gray-600 ml-0.5 text-2xl">
                Manage assignments
            </h2>
            </div>

        </div>

        <section>
            <div class="flex flex-col p-2 bg-white shadow rounded-lg">
                <div class="overflow-x-auto mx-2">
                    <h1 class="text-xl font-bold text-gray-500 mb-4">Assignments Given</h1>
                    <table class="min-w-full border divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-2 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                <th class="px-2 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Assignment</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Use a loop to iterate over your data and generate rows -->
                            @foreach ($assignment as $task)
                            <tr>
                                <td class="px-2 py-2 whitespace-nowrap">{{$task->title}}</td>
                                <td class="px-2 py-2 whitespace-nowrap">{{$task->assignment}}</td>    
                            </tr>
                            @endforeach

                        </tbody>
                    </table>                   
                </div>
                <!-- End Table assignments -->
            </div>           
        </section>
        <!-- section add assignment -->
        <section>
            <div class="flex flex-col p-2 bg-white shadow rounded-lg">
                <div class="overflow-x-auto mx-2">
                    <div class="my-4 mx-2">
                        <h1 class="text-xl font-bold text-gray-500 mb-4">Add Assignment</h1>
                        <div class="max-w-md ">
                            <form action="{{url('upload_assign')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-4">
                                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                                    <input type="text" id="title" name="title" class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500" required>
                                </div>
                        
                                <div class="mb-4">
                                    <label for="assignment" class="block text-gray-700 text-sm font-bold mb-2">Assignment File (PDF)</label>
                                    <input type="file" id="assignment" name="assignment" accept=".pdf" class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500" required>
                                </div>
                        
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Upload Assignment</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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