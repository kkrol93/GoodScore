<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Quotation;
use App\News;
use App\Quiz;
use App\Admin;
use Auth;
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
        $usertable = DB::table('users')
            ->select('name', 'surname', 'quiz', 'sales')
            ->orderBy('quiz')
            ->limit(3)
            ->get();
            $quiz = DB::table('quiz')
            ->select('question', 'ans1', 'ans2', 'ans3', 'ans4', 'cans')
            ->orderBy('id')
            ->limit(1)
            ->get();
        return view('home')->with('home', $news)->with('user', $properties)->with('usertable', $usertable)->with('quiz', $quiz);;


    }

    public function scores()
    {
//        $usertable = DB::table('users')
//                ->select('name', 'surname', 'quiz', 'sales')
//                ->orderBy('quiz')
//                ->get();

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
    {
      $input = Request::all();
     if  question_name = $request->input('question_name = $request->input('ans');');
      return redirect('#');
    }


}
