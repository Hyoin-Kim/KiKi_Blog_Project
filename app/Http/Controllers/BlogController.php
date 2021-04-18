<?php

namespace App\Http\Controllers;

use Auth;
use DB;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Comment;
use App\Models\AlbumRecommend;
use App\Models\CommentRecommend;
use App\Models\RequestFriend;
use App\Models\Friend;
use App\Models\Message;
use App\User;


class BlogController extends Controller
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
        return view('blog.index');
    }
    public function getMessages()
    {
 
        $messages = Message::join('users','users.id','=','messages.user_id')
                            ->leftjoin('assets',function($q){
                                $q->on('assets.id','=','users.asset_id')
                                    ->on('assets.deleted',DB::raw(0));
                            })
                            ->where('friend_id',Auth::user()->id)
                            ->where('messages.deleted',0)
                            ->select(
                                'messages.*'
                                ,'users.name as user_name'
                                ,'assets.file_name as asset_file_name'
                                ,'assets.id as asset_id'
                                ,'assets.file_extension as asset_file_extension'
                            )
                            ->get();


        return view('blog.messages',[
            'messages'=>$messages
        ]);
        
    }



    public function getMypage()
    {
        $user = User::leftjoin('assets',function($q){
                        $q->on('assets.id','=','users.asset_id')
                            ->on('assets.deleted',DB::raw(0));
                        })
                        ->select(
                            'users.*'
                            ,'assets.file_name as asset_file_name'
                            ,'assets.id as asset_id'
                            ,'assets.file_extension as asset_file_extension'
                        )
                        ->find(Auth::user()->id);

        return view('blog.mypage',[
            'user' => $user
        ]);
    }

    public function getmodifyMypage()
    {
        $user = User::leftjoin('assets',function($q){
                $q->on('assets.id','=','users.asset_id')
                    ->on('assets.deleted',DB::raw(0));
                })
                ->select(
                    'users.*'
                    ,'assets.file_name as asset_file_name'
                    ,'assets.id as asset_id'
                    ,'assets.file_extension as asset_file_extension'
                )
                ->find(Auth::user()->id);

        return view('blog.modify_mypage',[
            'user' => $user

        ]);
    }

    public function getFriendAlbum(Request $request){

        $friend_id = $request->get('friend_id');
        $albums = Album::where('user_id',$friend_id)->get();


        return view('blog.friend_album_list',[
            'albums' => $albums


        ]);
    }

    public function getAlbum()
    {
        return view('blog.album',[

        ]);
    }


    public function getAlbumList(Request $request)
    {
        $view_type = $request->get("view_type");

        $albums = Album::leftJoin('assets',function($q){
                    $q->on('assets.id','=','albums.asset_id')
                        ->on('assets.deleted',DB::raw(0));
                })
                ->where('albums.deleted',0)
                ->where('albums.user_id',Auth::user()->id)
                ->orderBy('albums.id','desc');
        
        if($view_type == "all")
        {
            $albums = $albums->select(
                                'albums.*'
                                ,'assets.file_name as asset_file_name'
                                ,'assets.id as asset_id'
                                ,'assets.file_extension as asset_file_extension'
                            )
                            ->get();
        }
        else if($view_type == "selca")
        {
            $albums = $albums->where('is_selca',1)
                            ->select(
                                'albums.*'
                                ,'assets.file_name as asset_file_name'
                                ,'assets.id as asset_id'
                                ,'assets.file_extension as asset_file_extension'
                            )
                            ->get();
        }
        else if($view_type == "social")
        {
            $albums = $albums->where('is_social',1)
                            ->select(
                                'albums.*'
                                ,'assets.file_name as asset_file_name'
                                ,'assets.id as asset_id'
                                ,'assets.file_extension as asset_file_extension'
                            )
                            ->get();
        }
        else if($view_type == "important")
        {
            $albums = $albums->where('is_important',1)
                            ->select(
                                'albums.*'
                                ,'assets.file_name as asset_file_name'
                                ,'assets.id as asset_id'
                                ,'assets.file_extension as asset_file_extension'
                            )
                            ->get();
        }
        else
        {
            $albums = $albums->select(
                                'albums.*'
                                ,'assets.file_name as asset_file_name'
                                ,'assets.id as asset_id'
                                ,'assets.file_extension as asset_file_extension'
                            )
                            ->get();
        }

        return view('blog.album_list',[
            'albums' => $albums
        ]);
    }


    public function getFriend()
    {
        $friends = Friend::join('users','users.id','=','friends.friend_id')
                            ->leftjoin('assets',function($q){
                                $q->on('assets.id','=','users.asset_id')
                                    ->on('assets.deleted',DB::raw(0));
                            })
                            ->where('friends.user_id',Auth::user()->id)
                            ->where('friend_status',1)
                            ->where('friends.deleted',0)
                            ->select(
                                'friends.*'
                                ,'users.name as user_name'
                                ,'users.user_id as user_id'
                                ,'users.email as user_email'
                                ,'users.age as user_age'
                                ,'users.id as partner_id'
                                ,'assets.id as asset_id'
                                ,'assets.file_name as asset_file_name'
                                ,'assets.file_extension as asset_file_extension'
                            )
                            ->get();


        return view('blog.friend',[
            'friends'=>$friends
        ]);
    }

    public function getNews()
    {   

        $request_friends = RequestFriend::join('users','users.id','=','request_friends.user_id')
                                        ->leftjoin('assets',function($q){
                                            $q->on('assets.id','=','users.asset_id')
                                                ->on('assets.deleted',DB::raw(0));
                                        })
                                        ->where('friend_id',Auth::user()->id)
                                        ->where('friend_status',0)
                                        ->select(
                                            'request_friends.*'
                                            ,'users.name as user_name'
                                            ,'assets.file_name as asset_file_name'
                                            ,'assets.id as asset_id'
                                            ,'assets.file_extension as asset_file_extension'
                                        )
                                        ->get();

        $messages = Message::join('users','users.id','=','messages.user_id')
                            ->leftjoin('assets',function($q){
                                $q->on('assets.id','=','users.asset_id')
                                    ->on('assets.deleted',DB::raw(0));
                            })
                            ->where('friend_id',Auth::user()->id)
                            ->where('messages.deleted',0)
                            ->where('messages.news_deleted',0)
                            ->select(
                                'messages.*'
                                ,'users.name as user_name'
                                ,'assets.file_name as asset_file_name'
                                ,'assets.id as asset_id'
                                ,'assets.file_extension as asset_file_extension'
                            )
                            ->get();

        $comments = Comment::join('albums','albums.id','=','comments.album_id')
                            ->join('users as current_user','current_user.id','=','albums.user_id')
                            ->leftjoin('users as friend_user','friend_user.id','=','comments.user_id')
                            ->leftjoin('assets',function($q){
                                $q->on('assets.id','=','friend_user.asset_id')
                                    ->on('assets.deleted',DB::raw(0));
                            })
                            ->where('comments.user_id','!=',Auth::user()->id)
                            ->where('comments.deleted',0)
                            ->where('albums.user_id','=',Auth::user()->id)
                            ->select(
                                'comments.*'
                                ,'friend_user.name as friend_name'
                                ,'assets.file_name as asset_file_name'
                                ,'assets.id as asset_id'
                                ,'assets.file_extension as asset_file_extension'
                            )
                            ->get();

        \Log::info("comments123123".$comments);


        return view('blog.news',[
            'request_friends'=>$request_friends,
            'messages'=>$messages,
            'comments'=>$comments
        ]);
    }

    public function friendAlbum($id){
        if(Auth::check())
        {
            $friend = Friend::where('deleted',0)->where('user_id',Auth::user()->id)->where('friend_id',$id)->first();

            if(empty($friend))
            {
                return "친구추가부터 진행해주세요.";
            }
            else
            {
                return view('blog.friend_album',[
                    'current_friend_id' => $id
                ]);
            }
        }
        else
        {
            return "로그인을 먼저 진행해 주세요.";
        }
    }

    public function getFriendAlbumList(Request $request){
        $view_type = $request->get("view_type");
        $current_friend_id = $request->get('current_friend_id');

        $albums = Album::leftJoin('assets',function($q){
                    $q->on('assets.id','=','albums.asset_id')
                        ->on('assets.deleted',DB::raw(0));
                })
                ->where('albums.secret_type',0)
                ->where('albums.deleted',0)
                ->where('albums.user_id',$current_friend_id)
                ->orderBy('albums.id','desc');
        
        if($view_type == "all")
        {
            $albums = $albums->select(
                                'albums.*'
                                ,'assets.file_name as asset_file_name'
                                ,'assets.id as asset_id'
                                ,'assets.file_extension as asset_file_extension'
                            )
                            ->get();
        }
        else if($view_type == "selca")
        {
            $albums = $albums->where('is_selca',1)
                            ->select(
                                'albums.*'
                                ,'assets.file_name as asset_file_name'
                                ,'assets.id as asset_id'
                                ,'assets.file_extension as asset_file_extension'
                            )
                            ->get();
        }
        else if($view_type == "social")
        {
            $albums = $albums->where('is_social',1)
                            ->select(
                                'albums.*'
                                ,'assets.file_name as asset_file_name'
                                ,'assets.id as asset_id'
                                ,'assets.file_extension as asset_file_extension'
                            )
                            ->get();
        }
        else if($view_type == "important")
        {
            $albums = $albums->where('is_important',1)
                            ->select(
                                'albums.*'
                                ,'assets.file_name as asset_file_name'
                                ,'assets.id as asset_id'
                                ,'assets.file_extension as asset_file_extension'
                            )
                            ->get();
        }
        else
        {
            $albums = $albums->select(
                                'albums.*'
                                ,'assets.file_name as asset_file_name'
                                ,'assets.id as asset_id'
                                ,'assets.file_extension as asset_file_extension'
                            )
                            ->get();
        }

        return view('blog.friend_album_list',[
            'albums' => $albums
        ]);
    }



    public function completeFriend(Request $request){
        $request_id = $request->get('request_id');
        $friend_id = $request->get('friend_id');

        $request_friends=RequestFriend::find($request_id);
        $request_friends->friend_status=1;
        $request_friends->save();

        $friends = new Friend;
        $friends->user_id=Auth::user()->id;
        $friends->friend_id=$friend_id;
        $friends->request_id=$request_id;
        $friends->friend_status=1;
        $friends->save();

        $friends2 = new Friend;
        $friends2->user_id=$friend_id;
        $friends2->friend_id=Auth::user()->id;
        $friends2->request_id=$request_id;
        $friends2->friend_status=1;
        $friends2->save();

    }


    public function refuseFriend(Request $request){
        $friend_id = $request->get('friend_id');
        $request_friend = new RequestFriend;
        $request_friend->friend_status=2;
        $request_friend->save();
    }

    public function deleteNewsMessage(Request $request){
        $message_id = $request->get('message_id');
        $message =Message::find($message_id);
        $message->news_deleted=1;
        $message->save();
    }

    public function deleteMessage(Request $request){
        $message_id = $request->get('message_id');
        $message =Message::find($message_id);
        $message->deleted=1;
        $message->save();
    }



    public function getAddfriend()
    {

        return view('blog.addfriend');
    }

    public function getAddalbum()
    {

        return view('blog.addalbum');
    }

    public function addPhoto(Request $request)
    {   
        \Log::info("addphoto");
        $photo_title = $request->get('photo_title');
        $photo_description = $request->get('photo_description');
        $asset_id = $request->get('asset_id');

        $album = new Album;
        $album->title = $photo_title;
        $album->content = $photo_description;
        $album->user_id = Auth::user()->id;
        $album->asset_id = $asset_id == -1 ? 0 : $asset_id;
        $album->save();

        $album = Album::leftJoin('assets',function($q){
                            $q->on('assets.id','=','albums.asset_id')
                                ->on('assets.deleted',DB::raw(0));
                        })
                        ->select(
                            'albums.*'
                            ,'assets.file_name as asset_file_name'
                            ,'assets.id as asset_id'
                            ,'assets.file_extension as asset_file_extension'
                        )
                        ->find($album->id);

        \Log::info("album".$album);

        return view('blog.album_sample',[
            'album' => $album
        ]);
    }


    public function getalbumDetail(Request $request){

       
        $photo_id = $request->get('id');
        $album = Album::find($photo_id);
        $album->user_id = Auth::user()->id;

        \Log::info("photo_id".$photo_id);

        $comment_id = $request->get('comment_id');
        \Log::info("comment_id".$comment_id);



        $album = Album::leftJoin('assets',function($q){
                            $q->on('assets.id','=','albums.asset_id')
                                ->on('assets.deleted',DB::raw(0));
                        })
                        ->select(
                            'albums.*'
                            ,'assets.file_name as asset_file_name'
                            ,'assets.id as asset_id'
                            ,'assets.file_extension as asset_file_extension'
                        )
                        ->find($album->id);


        $comments = Comment::join('users','users.id','=','comments.user_id')
                        ->leftJoin('assets as comment_assets',function($q){
                                    $q->on('comment_assets.id','=','comments.asset_id')
                                        ->on('comment_assets.deleted',DB::raw(0));
                                })
                        ->leftjoin('assets as user_assets',function($q){
                                    $q->on('user_assets.id','=','users.asset_id')
                                        ->on('user_assets.deleted',DB::raw(0));
                        })
                        ->where('comments.deleted',0)
                        ->where('comments.album_id',$album->id)
                        // ->where('comments.user_id',Auth::user()->id)
                        ->select(
                            'comments.*'
                            ,'users.name as user_name'
                            ,'comment_assets.id as comment_asset_id'
                            ,'comment_assets.file_name as comment_asset_file_name'
                            ,'comment_assets.file_extension as comment_asset_file_extension'
                            ,'user_assets.file_name as user_asset_file_name'
                            ,'user_assets.id as user_asset_id'
                            ,'user_assets.file_extension as user_asset_file_extension'
                        )
                        ->orderBy('id','desc')
                        ->get();

        //현재 앨범에서 좋아요와 싫어요의 갯수를 가져오고 싶고 누가 좋아요와 싫어요를 눌렀는지 알고싶어요.
        //가져오는 기능이야(get) -> 누구나 좋아요와 싫어요를 누를수있지만 중복이 되어서는 안돼요.(Create Post, Put)
        $album_recommend_infos = (object)array();
        $comment_recommend_infos = (object)array();
        $album_recommends = AlbumRecommend::Join('users','users.id','=','album_recommends.user_id')
                                        ->leftJoin('assets',function($q){
                                            $q->on('assets.id','=','users.asset_id')
                                                ->on('assets.deleted',DB::raw(0));
                                        })
                                        ->where('album_recommends.deleted',0)
                                        ->where('album_id',$photo_id)
                                        ->select(
                                            'album_recommends.*'
                                            ,'users.name as user_name'
                                            ,'assets.file_name as asset_file_name'
                                            ,'assets.file_extension as asset_file_extension'
                                        )
                                        ->get();
        $comment_recommends = CommentRecommend::Join('comments', function($q){
                                                $q->on('comments.id','=','comment_recommends.comment_id')
                                                    ->on('comments.deleted',DB::raw(0));
                                            })
                                            ->Join('users','users.id','=','comment_recommends.user_id')
                                            ->leftJoin('assets',function($q){
                                                $q->on('assets.id','=','users.asset_id')
                                                    ->on('assets.deleted',DB::raw(0));
                                            })
                                            ->where('comment_recommends.deleted',0)
                                            ->where('comments.album_id',$photo_id)
                                            ->select(
                                            'comment_recommends.*'
                                            ,'users.name as user_name'
                                            ,'assets.file_name as asset_file_name'
                                            ,'assets.file_extension as asset_file_extension'
                                        )
                                        ->get()
                                        ->groupBy('comment_id');
        $like_count = 0;
        $dislike_count = 0;
        $is_like = "false";
        $is_dislike = "false";
        foreach($album_recommends as $album_recommend)
        {
            if($album_recommend->album_type == 1)
            {
                $like_count += 1;

                if($album_recommend->user_id == Auth::user()->id)
                {
                    $is_like = "true";
                }
            }
            else if($album_recommend->album_type ==2)
            {
                $dislike_count += 1;

                if($album_recommend->user_id == Auth::user()->id)
                {
                    $is_dislike = "true";
                }
            }
        }
        $album_recommend_infos->datas = $album_recommends;
        $album_recommend_infos->like_count = $like_count;
        $album_recommend_infos->dislike_count = $dislike_count;

        \Log::info("is_like".$is_like);
        \Log::info("is_dislike".$is_dislike);

        \Log::info("is_like_count".$like_count);
        \Log::info("is_dislike_count".$dislike_count);



        \Log::info("comment_recommends".$comment_recommends);

        foreach($comments as $comment)
        {   
            $comment_like_count = 0;
            $comment_dislike_count = 0;
            $comment_is_like = "false";
            $comment_is_dislike = "false";
            if(!empty($comment_recommends[$comment->id]))
            {   
                foreach($comment_recommends[$comment->id] as $comment_recommend)
                {
                    if($comment_recommend->comment_type ==1)
                    {
                        $comment_like_count += 1;

                        if($comment_recommend->user_id== Auth::user()->id)
                        {
                            $comment_is_like="true";
                        }
                    }
                    else if($comment_recommend->comment_type==2)
                    {
                        $comment_dislike_count += 1;

                        if($comment_recommend->user_id == Auth::user()->id)
                        {
                            $comment_is_dislike="true";
                        }
                    }
                }
            }
            $comment->comment_is_like = $comment_is_like;
            $comment->comment_dislike_count = $comment_is_dislike;
            $comment->comment_like_count = $comment_like_count;
            $comment->comment_dislike_count = $comment_dislike_count;
        }

        // foreach($comment_recommends as $comment_recommend)
        // {   
        //     foreach($comment_recommend as $recommend)
        //     {
        //         if($recommend->comment_type ==1)
        //         {
        //             $comment_like_count += 1;

        //             if($recommend->user_id== Auth::user()->id)
        //             {
        //                 $comment_is_like="true";
        //             }
        //         }
        //         else if($recommend->comment_type==2)
        //         {
        //             $comment_dislike_count += 1;

        //             if($recommend->user_id == Auth::user()->id)
        //             {
        //                 $comment_is_dislike="true";
        //             }
        //         }
        //     }
        // }
        // $comment_recommend_infos->datas = $comment_recommends;
        // $comment_recommend_infos->comment_like_count = $comment_like_count;
        // $comment_recommend_infos->comment_dislike_count = $comment_dislike_count;


        // \Log::info("comment_is_like".$comment_is_like);
        // \Log::info("comment_is_dislike".$comment_is_dislike);
        // \Log::info("comment_like_count".$comment_like_count);
        // \Log::info("comment_dislike_count".$comment_dislike_count);

        return view('blog.albumdetail',[
            'album' => $album,
            'comments' => $comments,
            'album_recommend_infos' => $album_recommend_infos,
            // 'comment_recommend_infos' => $comment_recommend_infos,
            'is_like' => $is_like,
            'is_dislike' => $is_dislike,
            // 'comment_is_like' => $comment_is_like,
            // 'comment_is_dislike' => $comment_is_dislike
        ]);
    }
    public function addFriend(Request $request)
    {
        $friend_id = $request->get('friend_id');
        
        $user = User::where('user_id',$friend_id)->first();

        if(empty($user)){
            return "failed";
        }else {
            $request_friend = new RequestFriend;
            $request_friend->user_id = Auth::user()->id;
            $request_friend->friend_id = $user->id;
            $request_friend->save();

            return "success";
        }
    }

    public function sendMessage(Request $request){
        $content = $request->get('content');
        $partner_id = $request->get('partner_id');

        $message = new Message;
        $message->message_content=$content;
        $message->user_id=Auth::user()->id;
        $message->friend_id=$partner_id;
        $message->save();
    }


    
    public function addComment(Request $request)
    {

        \Log::info("addcomment");
        $photo_comment = $request->get('photo_comment');
        $asset_id = $request->get('asset_id');
        $album_id = $request->get('album_id');

        $comment = new Comment;
        $comment->user_id = Auth::user()->id;
        $comment->user_comment = empty($photo_comment) ? "" : $photo_comment;
        $comment->album_id = empty($album_id) ? 0 : $album_id;
        $comment->asset_id = $asset_id == -1 ? 0 : $asset_id;
        $comment->save();

        $comment = Comment::join('users','users.id','=','comments.user_id')
                            ->select(
                                'comments.*'
                                ,'users.name as user_name'
                            )
                            ->find($comment->id);

        $comment = Comment::leftJoin('assets',function($q){
                            $q->on('assets.id','=','comments.asset_id')
                                ->on('assets.deleted',DB::raw(0));
                        })
                        ->select(
                            'comments.*'
                            ,'assets.file_name as asset_file_name'
                            ,'assets.id as asset_id'
                            ,'assets.file_extension as asset_file_extension'
                        )
                        ->find($comment->id);

        $user = User::leftjoin('assets',function($q){
                $q->on('assets.id','=','users.asset_id')
                    ->on('assets.deleted',DB::raw(0));
                })
                ->select(
                    'users.*'
                    ,'assets.file_name as asset_file_name'
                    ,'assets.id as asset_id'
                    ,'assets.file_extension as asset_file_extension'
                )
                ->find(Auth::user()->id);


        return view("blog.comment_sample",[
            'comment' => $comment,
            'user' => $user
        ]);

    }


    public function CommentSample(Request $request){
        return view('blog.comment_sample');

    }



    public function deletePhoto(Request $request)
    {
        $photo_id = $request->get('photo_id');

        $album = Album::find($photo_id);
        $album->deleted = 1;
        $album->save();
    }

    public function deleteFriend(Request $request){
        $friend_id =$request->get('friend_id');

        $friend =Friend::where('user_id',Auth::user()->id)->where('friend_id',$friend_id)->first();
        $friend->deleted=1;
        $friend->save();


        $friend =Friend::where('user_id',$friend_id)->where('friend_id',Auth::user()->id)->first();
        $friend->deleted=1;
        $friend->save();
    }



    public function likeComment(Request $request)
    {
        $comment_id = $request->get('comment_id');
        $type = $request->get('type');
        $is_like = $request->get('is_like');
        $is_dislike = $request->get('is_dislike');

        $comment_recommends = CommentRecommend::where('comment_id',$comment_id)->where('user_id',Auth::user()->id)->where('deleted',0)->get();

        if(empty($comment_recommends)|| count($comment_recommends)==0)
        {
            $comment_recommend = new CommentRecommend;
            $comment_recommend->user_id=Auth::user()->id;
            $comment_recommend->comment_id=$comment_id;
            $comment_recommend->comment_type=$type;
            $comment_recommend->save();
        }else{
            foreach($comment_recommends as $comment_recommend)
            {
                $comment_recommend->deleted=1;
                $comment_recommend->save();
            }
            if(!($is_like == "true" && $type =="1") && !($is_dislike =="true" && $type == "2"))
            {
                $comment_recommend = new CommentRecommend;
                $comment_recommend->user_id=Auth::user()->id;
                $comment_recommend->comment_id=$comment_id;
                $comment_recommend->comment_type=$type;
                $comment_recommend->save();
            }
        }

    }
    //뿌려주는것은 2가지종류가있잖아. 로드할때, ajax로 로드가 되고나서 화면에 뿌릴때
    //1. 페이지를 들어가(로드됨) 2. 좋아요 또는 싫어요를 누를거
    public function likeAlbum(Request $request){

        $album_id = $request->get('album_id');
        $type = $request->get('type');
        $is_like = $request->get('is_like');
        $is_dislike = $request->get('is_dislike');

        $album_recommends = AlbumRecommend::where('album_id',$album_id)->where('user_id',Auth::user()->id)->where('deleted',0)->get();

        \Log::info("album_recommends".$album_recommends);
        if(empty($album_recommends) || count($album_recommends) == 0)
        {   
            $album_recommend = new AlbumRecommend;
            $album_recommend->user_id=Auth::user()->id;
            $album_recommend->album_id=$album_id;
            $album_recommend->album_type=$type;
            $album_recommend->save(); 
        }
        else
        {   
            foreach($album_recommends as $album_recommend)
            {
                $album_recommend->deleted = 1;
                $album_recommend->save();
            }

            if(!($is_like == "true" && $type == "1") && !($is_dislike == "true" && $type == "2"))
            {
                $album_recommend = new AlbumRecommend;
                $album_recommend->user_id=Auth::user()->id;
                $album_recommend->album_id=$album_id;
                $album_recommend->album_type = $type;
                $album_recommend->save();
            }
        }
    }

    public function clickHide(Request $request)
    {
        $photo_id = $request->get('photo_id');
        $album=album::find($photo_id);
        $album->secret_type=1;
        $album->save();
    }

    public function clickOpen(Request $request)
    {
        $photo_id = $request->get('photo_id');
        $album=album::find($photo_id);
        $album->secret_type=0;
        $album->save();
    }


    public function deleteComment(Request $request)
    {

        $comment_id = $request->get('comment_id');

         \Log::info("comment_id : ".$comment_id);

        $comment = Comment::find($comment_id);
        \Log::info("comment : ".$comment);
        $comment->deleted = 1;
        $comment->save();
    }



    public function updateProfile(Request $request)
    {
        $user_name = $request->get('user_name');
        $user_id = $request->get('user_id');
        $user_email = $request->get('user_email');
        $user_age = $request->get('user_age');
        $asset_id = $request->get('asset_id');

        $user =User::find(Auth::user()->id);
        $user->asset_id=$asset_id == -1 ? 0 : $asset_id;
        $user->name=$user_name;
        $user->user_id=$user_id;
        $user->email=$user_email;
        $user->age=$user_age;
        $user->save();

        $user = User::leftjoin('assets',function($q){
                                $q->on('assets.id','=','users.asset_id')
                                    ->on('assets.deleted',DB::raw(0));
                                })
                                ->select(
                                    'users.*'
                                    ,'assets.file_name as asset_file_name'
                                    ,'assets.id as asset_id'
                                    ,'assets.file_extension as asset_file_extension'
                                )
                                ->find($user->id);
        return $user;
    }

    public function updatePhoto(Request $request)
    {


        $photo_id = $request->get('photo_id');
        $update_title = $request->get('update_title');
        $update_description = $request->get('update_description');
        $asset_id = $request->get('asset_id');

        \Log::info("photo_id".$photo_id);
        $album = Album::find($photo_id);
        \Log::info("updatephoto".$album);
        $album->asset_id=$asset_id ==-1 ? 0 : $asset_id;
        $album->title = $update_title;
        $album->content = $update_description;
        $album->user_id = Auth::user()->id;
        $album->save();


        $album = Album::leftjoin('assets',function($q){
                                $q->on('assets.id','=','albums.asset_id')
                                    ->on('assets.deleted',DB::raw(0));
                                })
                                ->select(
                                    'albums.*'
                                    ,'assets.file_name as asset_file_name'
                                    ,'assets.id as asset_id'
                                    ,'assets.file_extension as asset_file_extension'
                                )
                                ->find($album->id);

        return $album;
    }


    public function updatePhotoType(Request $request)
    {   
        $photo_id = $request->get("photo_id");
        $photo_type = $request->get('photo_type');

        $album = Album::find($photo_id);

        if($photo_type == "selca")
        {
            $album->is_selca = 1;
            $album->is_social = 0;
            $album->is_important = 0;
        }
        else if($photo_type == "social")
        {
            $album->is_selca = 0;
            $album->is_social = 1;
            $album->is_important = 0;
        }
        else if($photo_type == "important")
        {
            $album->is_selca = 0;
            $album->is_social = 0;
            $album->is_important = 1;
        }

        $album->save();
    }



}
