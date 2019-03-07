<?php

namespace App\Http\Controllers;
use Request;
use App\Http\Requests;
use App\Http\Requests\CreateNewsRequest;
use App\Http\Requests\CreateExamRequest;
use App\Http\Requests\CreateUsersRequest;
use App\News;
use App\User;
use App\exam;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin');
    }
    public function newspanel()
    {
        $news = News::latest()->get();
        return view('news-panel')->with('news', $news);
    }
    public function newspost()
    {
      $input = Request::all();
      News::create($input);
      return redirect('#');
    }
    public function useradd()
    {
      $input = Request::all();
      User::create($input);
      return redirect('#');
    }
    public function editnews($id)
    {
     $news = News::find($id);
      return view('edit-news')->with('news', $news);
      $input = Request::all();
      News::update($input);
      return redirect('#');
    }
    public function updatenews($id, CreateNewsRequest $request)
    {
        $news = News::findorfail($id);
        $news->update($request->all());
        return redirect('/admin/news-panel');
    }
 
    public function destroynews($id)
    {
        $news = News::find($id);
        $news->delete();
        return redirect('/admin/news-panel');
    }
    
    public function userspanel()
    {
        $users = User::latest()->get();
        return view('users-panel')->with('users', $users);
    }
    public function scorespanel()
    {
        $usertable = User::get(['name', 'surname', 'quiz', 'sales']);
        $usertable = $usertable->sortByDesc(function ($user) {
            return $user->total;
        });
        $userSum = User::avg('sales');
        $userQuiz = User::avg('quiz');
       
        return view('scores-panel')->with('usertable', $usertable)->with('usersum', $userSum)->with('userQuiz', $userQuiz);
    }
    public function quizpanel()
    {
        return view('quiz-panel');
    }
    public function registerpanel()
    {
        return view('auth/register');
    }
    public function quizpost()
    {
      $input = Request::all();
      exam::create($input);
      return redirect('#');
    }
    public function exampanel()
    {
        $exam = exam::latest()->get();
        return view('quiz-panel')->with('exam', $exam);
    }
   
    public function editexam($id)
    {
     $exam = exam::find($id);
      return view('edit-quiz')->with('exam', $exam);
      $input = Request::all();
      exam::update($input);
      return redirect('#');
    }
    public function updateexam($id, CreateExamRequest $request)
    {
        $exam = exam::findorfail($id);
        $exam->update($request->all());
        return redirect('/admin/quiz-panel');
    }
 
    public function destroyexam($id)
    {
        $exam = exam::find($id);
        $exam->delete();
        return redirect('/admin/quiz-panel');
    }
    public function edituser($id)
    {
     $user = User::find($id);
      return view('edit-users')->with('user', $user);
      $input = Request::all();
      User::update($input);
      return redirect('#');
    }
    public function updateuser($id, CreateUsersRequest $request)
    {
        $user = User::findorfail($id);
        $user->update($request->all());
        return redirect('/admin/users-panel');
    }
 
    public function destroyuser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/admin/users-panel');
    }
}

