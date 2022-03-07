<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class PostController extends Controller
{
  public function store(Request $request) {
    $user = $request->get('user');
    $postData = $request->get('post');

    if (!$postData) {
      return response()->json(['error' => 'Invalid Request'], 401);
    }

    $post = Post::create([
      'user_id' => $user->id,
      'post' => $postData
    ]);

    return response()->json(['data' => $post]);
  }

  public function index(Request $request) {
    $lastId = $request->get('lastId');
    $posts = Post::when($lastId, function($query) use ($lastId) {
                    $query->where('id', '>', $lastId);
                  })
                  ->orderBy('id', 'asc')
                  ->limit(20)
                  ->get();

    return response()->json(['data' => $posts]);
  }

  public function show(Request $request, $postId) {
    $post = Post::where('id', $postId)
                ->first();

    if (!$post) {
      return response()->json(['error' => 'Post not found'], 404);
    }

    return response()->json(['data' => $post]);
  }

  public function update(Request $request, $postId) {
    $user = $request->get('user');
    $postData = $request->get('post');

    $post = Post::where('id', $postId)
                ->where('user_id', $user->id)
                ->first();

    if (!$post) {
      return response()->json(['error' => 'Post not found'], 404);
    }

    $post->post = $postData;
    $post->save();

    return response()->json(['data' => $post]);
  }

  public function delete(Request $request, $postId) {
    $user = $request->get('user');
    $post = Post::where('id', $postId)
                ->where('user_id', $user->id)
                ->first();

    if (!$post) {
      return response()->json(['error' => 'Post not found'], 404);
    }

    $post->delete();

    return response()->json(['data' => 'success']);
  }
}
