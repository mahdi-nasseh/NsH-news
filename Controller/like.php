<?php
include '../init.php';
use Nshnews\Model\Post;


if(isset($_GET['add_like_id'])){
    $post = Post::with('user')->find($_GET['add_like_id']);
    $post->like()->create(['user_id' => $post->user->ID]);
    header('Location: ../View/single.php?post_id='.$post->ID);
}else if(isset($_GET['remove_like_id'])){
    $post = Post::with('user')->find($_GET['remove_like_id']);
    $post->like()->delete();
    header('Location: ../View/single.php?post_id='.$post->ID);
}