<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;
use App\Models\Board;

class BoardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $boards = Board::join('users','users.id','=','boards.user_id')
                        ->where('deleted',0)
                        ->where('boards.user_id',Auth::user()->id)
                        ->orderBy('id','desc')
                        ->select(
                            'boards.*'
                            ,'users.name as user_name'
                        )
                        ->get();

        return view('board.write',[
            'boards' => $boards
        ]);
    }

    public function friendBoard(Request $request){
        $friend_id =$request->get('friend_id');
        $boards = Board::join('users','users.id','=','boards.user_id')
                        ->where('deleted',0)
                        ->where('boards.user_id',$friend_id)
                        ->orderBy('id','desc')
                        ->select(
                            'boards.*'
                            ,'users.name as user_name'
                        )
                        ->get();

                        

        return view('board.write',[
            'boards' => $boards
        ]);

    }

    public function getWriteboard()
    {

        return view('board.writeboard');
    }

    public function addBoard(Request $request){

        \Log::info("addboard");
        $note_title=$request->post('note_title');
        $note_description=$request->post('note_description');




        $board= new Board;
        $board->title=$note_title;
        $board->content=$note_description;
        $board->user_id=Auth::user()->id;
        $board->save();

        return view('board.writeboard',[
            'board'=>$board

        ]);
    }

    public function deleteBoard(Request $request){
        $note_id=$request->get("note_id");
        $board = Board::find($note_id);
        $board->deleted=1;
        $board->save();



    }

    public function updateBoard(Request $request)
    {
        $note_id = $request->get("note_id");
        $update_title = $request->get("update_title");
        $update_description = $request->get("update_description");

        $board = Board::find($note_id);
        $board->title=$update_title;
        $board->content=$update_description;
        $board->user_id=Auth::user()->id;
        $board->save();

        return $board;

    }




}
