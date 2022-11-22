<?php

namespace App\Interfaces\Services;

interface BlogServiceInterface
{
    public function blogList(object $payload);
    public function saveBlog(object $payload);
    public function findBlogById(int $blogId);
    public function findBySlug(string $slug);
    public function updateBlogById(object $payload, int $blogId);
    public function updateBlogImageById(object $payload, int $blogId);
    public function deleteBlogById(int $blogId);
}
