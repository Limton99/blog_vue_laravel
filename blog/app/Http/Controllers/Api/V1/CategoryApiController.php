<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index() {
        try {
            return response($this->categoryService->index(), 200);
        } catch (\Exception $e) {
            return response($e->getMessage(), 500);
        }
    }

    public function show($id) {
        return response($this->categoryService->show($id));
    }

    public function store(Request $request) {
        return response($this->categoryService->store($request));
    }

    public function update(Request $request, $id) {
        return response($this->categoryService->update($request, $id));
    }

    public function destroy($id) {
        return response($this->categoryService->destroy($id));
    }
}
