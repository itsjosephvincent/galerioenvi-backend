<?php

namespace App\Repositories;

use App\Interfaces\Repositories\BlogRepositoryInterface;
use App\Models\Blog;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class BlogRepository implements BlogRepositoryInterface
{
    public function index($payload, $sortField, $sortOrder)
    {
        return Blog::filter($payload->all())
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function save($payload)
    {
        $blog = new Blog();
        $blog->thumbnail_url = '';
        $blog->title = $payload->title;
        $blog->description = $payload->description;
        $blog->content = $payload->content;
        $blog->save();
        $insertMedia = Blog::findOrFail($blog->id);
        $insertMedia->addMediaFromRequest('thumbnail_url')->toMediaCollection('blog_media');
        $insertMedia->thumbnail_url = $insertMedia->getMedia('blog_media')->last()->getUrl();
        $insertMedia->save();

        return $blog->fresh();
    }

    public function show($blogId)
    {
        return Blog::findOrFail($blogId);
    }

    public function showBySlug($slug)
    {
        return Blog::where('slug', $slug)->first();
    }

    public function update($payload, $blogId)
    {
        $blog = Blog::findOrFail($blogId);
        $blog->title = $payload->title;
        $blog->description = $payload->description;
        $blog->content = $payload->content;
        $blog->save();

        return $blog->fresh();
    }

    public function updateBlogImage($payload, $blogId)
    {
        $blog = Blog::findOrFail($blogId);
        $media = Media::where('model_id', $blogId)->where('model_type', 'App\Models\Blog')->first();
        if ($media) {
            $media->forceDelete($media->id);
        }
        $blog->addMediaFromRequest('thumbnail_url')->toMediaCollection('blog_media');
        $blog->thumbnail_url = $blog->getMedia('blog_media')->last()->getUrl();
        $blog->save();

        return $blog->fresh();
    }

    public function delete($blogId)
    {
        return Blog::findOrFail($blogId)->delete();
    }
}
