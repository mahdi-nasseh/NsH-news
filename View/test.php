<?php

include '../init.php';

use Nshnews\Model\Category;
use Nshnews\Model\Post;
use Carbon\Carbon;
use Nshnews\Model\User;

//$post = Post::with('user')->find(3);
//$user = $post->user;
//print_r($user->ID);
//$post->like()->create(['user_id' => $user->ID]);


//$user = User::find(1);
//$post = Post::find(3);
//echo $post->like->where('user_id', $user->ID)->count();

$lastview = \Nshnews\Model\View::where('ip', $_SERVER['REMOTE_ADDR'])->where('created_at', '>=', date('Y-m-d H:i:s', time()-60))->where('post_id', '=',$post->ID)->orderBy('created_at', 'desc')->first();
var_dump($lastview);