<?php

namespace App\Http\Controllers;
use Faker\Provider\Image;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Resume;
use App\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        return view('home');
    }
    
    public function adminHome()
    {
        $resumes = Resume::all();
        return view('adminHome', compact('resumes'));
    }


    public function store(Request $request)
    {
        $id = Auth::user()->id;

        $request->validate([
            'location' => 'required',
            'qualification' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'exprience' => 'required',
            'contact' => 'required',
            'bio' => 'required',
            'resume' => 'required|mimes:pdf,xlx,csv|max:2048',
        ], 
        
        [
            'location.required' => 'Location is required',
            'qualification.required' => 'Qualification can not be empty',
            'gender.required' => 'Gender is required',
            'dob.required' => 'Please fill your date of birth',
            'exprience.required' => 'Exprience is required',
            'contact.required' => 'Please enter your contact no.',
            'bio.required' => 'Please mention about yourself',
            'resume.required' => 'Please upload your resume',
        ]);
               
        $fileName = time().'.'.$request->resume->extension();   
       
        
        $resume = new Resume([
            'user_id'     => $id,
            'location'     => $request->input('brand'),
            'qualification' => $request->input('country'),
            'gender'     => $request->input('title'),
            'dob' => $request->input('category'),
            'exprience'   => $request->input('priority'),
            'contact'   => $request->input('summary'),
            'bio' => $request->input('objective'),
            'resume' => $request->resume->move(storage_path().'/uploads', $fileName),
        ]);

        $resume->save();

        return back()->with('success', 'Details Submitted Successfully.');


    }

    public function show(){

        $resume = Resumes::all();
        $user = User::all();
        return view('view', compact('resume','user'));
    }
}
