<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Following extends Model
{
    //
    protected $hidden = [
        //'user_id' , 'updated_at'
    ];
    public static function FollowingUsersArr($Arr)
    {
        
        $follow=  Following::whereIn('followings.follower_id',$Arr)->join('users as f','f.id','=','followings.user_id')
        ->join('users as u','user_id','=','followings.follower_id')
        ->select('followings.id','followings.updated_at','u.id as u_id',
        'u.image_link as user_image_link','u.name as user_name','f.id as followed_id',
        'f.image_link as followed_image_link','f.name as followed_name')->get();
        $t = array();
        $j=0;
       foreach($follow as $l)
        {
            $l = collect($l);
            $l ->put('update_type',2);
           $t[$j]=$l;
           $j++;
        }
        $follow = collect($t);
        return $follow;
    }

}
