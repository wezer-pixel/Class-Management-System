<x-app-layout>
    <style>
    #message {
        display: none;
        background-color: #f1f1f1;
        color: #333;
        border: 1px solid #ddd;
        padding: 10px;
        margin-top: 10px;
        border-radius: 5px;
        position: relative;
    }
    </style>
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

        </div>

        <!-- section assignments -->   
        <section class="grid md:grid-cols-2 xl:grid-cols-4 gap-6 text-xl font-bold">
            Unit: {{ $assignment->unit }}
            <br>
            Title: {{ $assignment->title }}
            <br>
            Status: {{ $assignment->status }}
            <br>
            Score: {{ $assignment->score }}%
            <br>
            Deadline: {{ $assignment->time_expected }}
            
            @if ($assignment->assignment)
            <span></span>
            <form method="get" action="{{ url('download-assignment', ['filename' => $assignment->assignment]) }}" style="display:inline;">
                <button class="btn btn-success bg-purple-600 hover:bg-purple-800 p-2 text-white text-md rounded-md" type="submit">Download PDF</button>
            </form>
            @endif
    
        </section>
        <!-- end section assignments -->
        
        <!-- section upload assignment form-->
        <section>
            <div id="message" class="mt-4"></div>

            <p class="text-xl font-bold my-4 ">
                Download the Assignment above, Work on it and Upload it below.
                <br>
                Upload Your Assignment
            </p>
            
            <div>
                <form action="{{ url('submit_assignment/' . $assignment->id) }}" method="post" enctype="multipart/form-data">

                    @csrf
            
                    <div class="mb-4">
                        <label for="assignment" class="block text-gray-700 text-sm font-bold mb-2">Assignment File (PDF)</label>
                        <input type="file" id="assignment" name="assignment" accept=".pdf" class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500" required>
                    </div>
            
                    <button type="submit" class="bg-purple-600 hover:bg-purple-800 text-white font-bold py-2 px-4 rounded">Upload Assignment</button>
                </form>
            </div>
    
        </section>
        <!-- end section upload assignment form-->
        <section class="grid md:grid-cols-2 xl:grid-cols-4 xl:grid-rows-3 xl:grid-flow-col gap-6">
            <div class="flex flex-col md:col-span-2 md:row-span-2 bg-white shadow rounded-lg">
                <div class="px-6 py-5 font-semibold border-b border-gray-100">School Updates will appear here soon.

                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Et tempore corporis culpa tenetur atque a. Officiis dolor eius optio saepe? Architecto voluptatem doloremque porro expedita aperiam similique beatae ea dolores?
                </div>
            </div>

        </section>

        </main>
  </div>
  <script>
    const message = document.getElementById('message');
    
    @if (session('success'))
        message.style.backgroundColor = '#4CAF50';
        message.innerText = '{{ session('success') }}';
    @elseif (session('error'))
        message.style.backgroundColor = '#f44336';
        message.innerText = '{{ session('error') }}';
    @endif
    
    if (message.innerText) {
        message.style.display = 'block';
        setTimeout(() => {
            message.style.display = 'none';
        }, 4000);
    }
</script>

</x-app-layout>