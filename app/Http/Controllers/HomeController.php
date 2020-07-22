<?php

namespace App\Http\Controllers;
use Faker\Provider\Image;

use Illuminate\Http\Request;
use App\Resumes;
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
        return view('adminHome');
    }


    public function store(Request $request)
    {
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
        $request->resume->move(storage_path().'/uploads', $fileName);
       
      
        $input = $request->all();
        $resume = Resumes::create($input);

        return back()->with('success', 'Details Submitted Successfully.');


    }

    public function show(){

        $resume = Resumes::all();
        $user = User::all();
        return view('view', compact('resume','user'));
    }
}
