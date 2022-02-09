<?php

namespace App\Http\Controllers;

use App\Models\UserFollow;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserFollowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Post $post)
    {
       $user = User::where('id',$post->user_id )->first();
       
        $user_fololows = UserFollow::where('follower_id', Auth::id())->where('following_id',$post->user_id )->first();
        if(!$user_fololows){
            $user_fololows = UserFollow::create([
                "follower_id"=> Auth::id(),
                "following_id"=>$post->id,
                "follower_name"=>$user->name,
                "user_image"=>$user->image_path
            ]);
            return $user_fololows;
        }else{
            $user_fololows->delete();
            return "userunfollows";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userfollower()
    {
        $report = UserFollow::where('following_id', Auth::id())->get();
        
         return response([
            "followers" => $report,
            "No.follower" => $report->count(),
        ]);
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserFollow  $userFollow
     * @return \Illuminate\Http\Response
     */
    public function show(UserFollow $userFollow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserFollow  $userFollow
     * @return \Illuminate\Http\Response
     */
    public function edit(UserFollow $userFollow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserFollow  $userFollow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserFollow $userFollow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserFollow  $userFollow
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserFollow $userFollow)
    {
        //
    }
}
