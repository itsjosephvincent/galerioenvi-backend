<?php

namespace App\Services;

use App\Http\Resources\BlogResource;
use App\Interfaces\Repositories\BlogRepositoryInterface;
use App\Interfaces\Services\BlogServiceInterface;
use App\Traits\SortingTraits;

class BlogService implements BlogServiceInterface
{
    use SortingTraits;

    private $blogRepository;

    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function blogList($payload)
    {
        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $blog = $this->blogRepository->index($payload, $sortField, $sortOrder);

        return BlogResource::collection($blog);
    }

    public function saveBlog($payload)
    {
        $blog = $this->blogRepository->save($payload);

        return new BlogResource($blog);
    }

    public function findBlogById($blogId)
    {
        $blog = $this->blogRepository->show($blogId);

        return new BlogResource($blog);
    }

    public function findBySlug($slug)
    {
        $blog = $this->blogRepository->showBySlug($slug);

        return new BlogResource($blog);
    }

    public function updateBlogById($payload, $blogId)
    {
        $blog = $this->blogRepository->update($payload, $blogId);

        return new BlogResource($blog);
    }

    public function updateBlogImageById($payload, $blogId)
    {
        $blog = $this->blogRepository->updateBlogImage($payload, $blogId);

        return new BlogResource($blog);
    }

    public function deleteBlogById($blogId)
    {
        $this->blogRepository->delete($blogId);
    }
}
