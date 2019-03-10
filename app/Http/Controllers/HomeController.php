<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Quotation;
use App\News;
use App\exam;
use App\Admin;
use Auth;
use App\User;
use Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = User::where('id', '=', Auth::user()->id)->get();
        $news = News::latest()->get();        
            $quiz = DB::table('exams')
            ->select('question', 'ans1', 'ans2', 'ans3', 'ans4', 'cans')
            ->orderBy('id')            
            ->get();
            $usertable = User::get(['name', 'surname', 'quiz', 'sales']);
        $usertable = $usertable->sortByDesc(function ($user) {
            return $user->total;
        });          
        return view('home')->with('home', $news)->with('userq', $properties)->with('usertable', $usertable)->with('quiz', $quiz);
    }
    public function ajax() 
    {
        $properties = User::where('id', '=', Auth::user()->id)->get();
        $quiz = DB::table('exams')
        ->select('question', 'ans1', 'ans2', 'ans3', 'ans4', 'cans')
        ->orderBy('id')        
        ->get();
        return view('ajax')->with('user', $properties)->with('quiz', $quiz);
    }
    public function scores()
    {
        $usertable = User::get(['name', 'surname', 'quiz', 'sales']);
        $usertable = $usertable->sortByDesc(function ($user) {
            return $user->total;
        });
        $properties = User::where('id', '=', Auth::user()->id)->get();
        return view('scores')->with('user', $properties)->with('usertable', $usertable);
    }
    public function rewards()
    {
        return view('rewards');
    }
    public function regulamin()
    {
        return view('regulamin');
    }
    public function checkquiz()
    {}    
    public function showChangePasswordForm(){
        return view('changePassword');
    }
    public function changePassword(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Podane aktualne hasło jest nie prawidłowe. Proszę spróbuj jeszcze raz!");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","Nowe hasło nie może być takie same jak poprzednie. Proszę wpisz inne hasło.");
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success","Hasło zostało zmienione!");
    }
}
