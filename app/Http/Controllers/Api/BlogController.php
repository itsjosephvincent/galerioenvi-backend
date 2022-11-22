<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogPhotoUpdateRequest;
use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Interfaces\Services\BlogServiceInterface;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $blogService;

    public function __construct(BlogServiceInterface $blogService)
    {
        $this->blogService = $blogService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->blogService->blogList($request)->response();
    }

    public function store(BlogStoreRequest $request): JsonResponse
    {
        $payload = (object) $request->only([
            'thumbnail_url',
            'title',
            'description',
            'content'
        ]);

        return $this->blogService->saveBlog($payload)->response();
    }

    public function show($blogId): JsonResponse
    {
        return $this->blogService->findBlogById($blogId)->response();
    }

    public function showBySlug($slug): JsonResponse
    {
        return $this->blogService->findBySlug($slug)->response();
    }

    public function update(BlogUpdateRequest $request, $blogId): JsonResponse
    {
        $payload = (object) $request->only([
            'title',
            'description',
            'content'
        ]);

        return $this->blogService->updateBlogById($payload, $blogId)->response();
    }

    public function updateBlogPhoto(BlogPhotoUpdateRequest $request, $blogId): JsonResponse
    {
        $payload = (object) $request->only([
            'thumbnail_url'
        ]);

        return $this->blogService->updateBlogImageById($payload, $blogId)->response();
    }

    public function destroy($blogId)
    {
        $this->blogService->deleteBlogById($blogId);
    }
}
