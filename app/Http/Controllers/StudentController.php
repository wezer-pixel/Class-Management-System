<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\SubmittedAssignment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function redirect()
    {
        if (!Auth::user()) {
            return redirect("/login");
        }
    }

    public function home() 
    {
        if (Auth::check()) {
            $data = Auth::user(); // Get the currently logged-in user
            $assignment = Assignment::all();

            if ($data->user_type == '0') {
                
                return view('student.home', compact('data', 'assignment'));

            } elseif ($data->user_type == '1') {

                $students = User::where('user_type', '0')->pluck('name');
                $assignment = Assignment::all();

                return view('lec.home', compact('assignment', 'data', 'students'));
            }
        }
        
        return redirect('/register');
    }

    public function show_assignment() 
    {
        if (Auth::check()) {
            $data = Auth::user();

            if (Auth::user()->user_type == '1') {

                $students = User::where('user_type', '0')->pluck('name');
                $assignment = Assignment::all();

                return view('lec.assignment', compact('assignment', 'data', 'students'));

            } else if (Auth::user()->user_type == '0') {

                $students = User::where('user_type', '0')->pluck('name');
                $assignment = Assignment::all();

                return view('student.assignment', compact('assignment', 'data', 'students'));
            }
        }
        return redirect('/register');
    }

    public function upload_assign(Request $request)
    {
        if (Auth::check()) {

            if (Auth::user()->user_type == '1') {
                // Validate the form data
                $validatedData = $request->validate([
                    'title' => 'required|string',
                    'assignment' => 'required|file|mimes:pdf', // Ensure it's a PDF file
                ]);

                // Store the assignment
                if ($request->hasFile('assignment')) {
                    $file = $request->file('assignment');
                    $fileName = $file->getClientOriginalName();
                    $file->storeAs('assignments', $fileName, 'public'); // Store the file in the 'public' disk under the 'assignments' directory
                }

                // Create a new Assignment model and save it to the database
                $assignment = new Assignment();
                $assignment->title = $validatedData['title'];
                $assignment->assignment = $fileName; // Store the file name in the database
                $assignment->status = 'pending';
                $assignment->save();

                return redirect()->back();
            }
        }
        return redirect('/register');
    }
        

    public function assignment_show(Request $request, $id)
    {
        if (Auth::check()) {
            $data = Auth::user();
            $students = User::where('user_type', '0')->pluck('name');
            $assignment = Assignment::find($id);
    
            return view('student.show_assignment', compact('students', 'data', 'assignment'));
        }
    }


    public function download_assignment($filename)
    {
        $path = storage_path("app/public/assignments/{$filename}");

        if (file_exists($path)) {
            return response()->download($path, $filename);
        } else {
            // Handle the case where the file does not exist
            return redirect()->back()->with('error', 'File not found.');
        }
    }

    public function submit_assignment(Request $request, $id)
    {
        $assignment = Assignment::find($id);

        // Validate the request data, including the uploaded file
        $request->validate([
            'assignment' => 'required|mimes:pdf',
        ]);

        // Store the uploaded PDF file in the public storage directory
        $file = $request->file('assignment');
        $fileName = $file->getClientOriginalName();
        $file->storeAs('student_submissions', $fileName, 'public'); // Store the file in the 'public' disk under the 'student_submissions' directory


        // Associate the submission with the currently authenticated user
        $user = auth()->user();
        

        if ($assignment) {
            $submission = new SubmittedAssignment();
            $submission->user_id = $user->id;
            $submission->user_name = $user->name;
            $submission->assignment_id = $assignment->id;
            $submission->assignment_title = $assignment->title;
            $submission->unit-> $assignment->unit;
            $submission->file_name = $fileName;
            $submission->save();

            return redirect()->back()->with('success', 'Assignment submitted successfully.');
        }
        return redirect()->back()->with('error', 'Failed to add submission.');
    }
    



    public function submissions()
    {
        if (Auth::check()) {
            $data = Auth::user();
            if (Auth::user()->user_type == '1') {

                $submission = SubmittedAssignment::all();

                return view('lec.submissions', compact('submission', 'data'));
            }
        }
    }

    public function show_submissions(Request $request, $id)
    {
        if (Auth::check()) {
            $data = Auth::user();

            if (Auth::user()->user_type == '1') {

                $submission = SubmittedAssignment::find($id);
                
                return view('lec.show_assignment', compact('submission','data'));
            }
        }
    }

    public function download_submission($filename)
    {
        $path = storage_path("app/public/student_submissions/{$filename}");

        if (file_exists($path)) {
            return response()->download($path, $filename);
        } else {
            // Handle the case where the file does not exist
            return redirect()->back()->with('error', 'File not found.');
        }
    }


    public function update_score(Request $request, SubmittedAssignment $submission)
    {
        $request->validate([
            'score' => 'required|numeric|min:0|max:100',
        ]);

        $submission->score = $request->score;
        $submission->status = 'graded';
        $submission->save();

        return redirect()->back()->with('success', 'Score updated successfully.');
    }
}
