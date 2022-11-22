<?php

namespace App\Interfaces\Repositories;

interface BlogRepositoryInterface
{
    public function index(object $payload, string $sortField, string $sortOrder);
    public function save(object $payload);
    public function showBySlug(string $slug);
    public function show(int $blogId);
    public function update(object $payload, int $blogId);
    public function updateBlogImage(object $payload, int $blogId);
    public function delete(int $blogId);
}
