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
            
            
            <h2 class="text-gray-600 ml-0.5 text-xl">
                @if($submission)
                Student Name: <span class="text-black font-bold"> {{ $submission->user_name }} </span>
                <br>
                Course Unit: <span class="text-black font-bold"> {{ $submission->unit }} </span>
                <br>
                Assignment: <span class="text-black font-bold"> {{ $submission->assignment_title }} </span>
                <br>
                Status: <span class="text-black font-bold"> {{ $submission->status }} </span>
                <br>
                Score: <span class="text-black font-bold"> {{ $submission->score }} % </span>
                @endif
            </div>
        </div>

        <!-- section for assignment details -->
        <section>
          <div class="flex flex-col p-2 bg-white shadow rounded-lg">
            <div class="overflow-x-auto mx-2">
              <h1 class="text-2xl font-semibold mb-1 ml-2 mt-2">Assignment Details</h1>
              <p class="text-gray-600 ml-2 text-xl">Download assignment to view</p>
              <br>
              <div id="message" class="p-2 rounded-lg"></div>
              
              @if ($submission->file_name)
              
              <form method="get" action="{{ url('download_submission', ['filename' => $submission->file_name]) }}" style="display:inline;">
                  <button class="btn btn-success bg-purple-600 p-2 text-white text-md rounded-md ml-2" type="submit">Download PDF</button>
              </form>
              @endif
              
              <!-- form to update score -->
              
              <h1 class="text-2xl font-semibold mb-1 mt-4 ml-2">Update Score</h1>
              <div id="message" class="p-2 rounded-lg"></div>
              <form method="post" action="{{ url('update_score', ['submission' => $submission->id]) }}">
                @csrf
                @method('patch')
            
                  <div class="bg-white rounded-lg p-4 shadow-md">
                    <div class="mb-4">
                      <label for="score" class="block text-gray-700 text-sm font-bold mb-2">Score:</label>
                      <input type="number" name="score" id="score" value="{{ $submission->score }}" class="px-3 py-2 border rounded-lg">
                    </div>
            
                    <button type="submit" class="bg-purple-500 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline-purple active:bg-purple-600">Update Score</button>
                  </div>
                </form>
            </div>
          </div>
        </section>



        <!-- section for school updates -->
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