<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewPostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\Tag;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct(private PostService $service)
    {
        
    }

    public function create(NewPostRequest $request)
    {
        $data = $request->validated();
        $post = $this->service->newPost($data);

        return new PostResource($post);
    }

    public function show(Post $post)
    {
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->validated();
        $updatedPost =  $this->service->updatePost($data, $post);

        return new PostResource($updatedPost);
    }

    public function addTag(Post $post, Tag $tag)
    {
        $updatedPost = $this->service->newTag($post, $tag);
        return new PostResource($updatedPost);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post, Tag $tag)
    {
        $updatedPost = $this->service->removeTag($post, $tag);
        return new PostResource($updatedPost);
    }
}
