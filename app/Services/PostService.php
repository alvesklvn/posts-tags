<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Tag;

class PostService
{
    public function newPost(array $data)
    {
        $post = Post::create([
            'title' => $data['title'],
            'content' => $data['content']
        ]);

        if (array_key_exists('tags', $data)){
            $post->tags()->sync($data['tags']);
        }

        $post->refresh();
        return $post;
    }

    public function updatePost(array $data, Post $post)
    {
        $post->update($data);
        if (array_key_exists('tags', $data)){
            $post->tags()->sync($data['tags']);
        }
        $post->refresh();
        return $post;
    }

    public function newTag(Post $post, Tag $tag)
    {
        $post->tags()->attach($tag);
        return $post;
    }

    public function removeTag(Post $post, Tag $tag)
    {
        $post->tags()->detach($tag);
        return $post;
    }
}