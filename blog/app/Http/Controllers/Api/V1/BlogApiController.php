<?php


namespace App\Http\Controllers\Api\V1;


use App\Http\Controllers\Controller;
use App\Services\BlogService;
use Illuminate\Http\Request;

class BlogApiController extends Controller
{
    protected $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function index() {
        try {
            return response($this->blogService->index(), 200);
        } catch (\Exception $e) {
            return response($e->getMessage(), 500);
        }
    }

    public function show($id) {
        return response($this->blogService->show($id));
    }

    public function store(Request $request) {
        return response($this->blogService->store($request));
    }

    public function update(Request $request, $id) {
        return response($this->blogService->update($request, $id));
    }

    public function destroy($id) {
        return response($this->blogService->destroy($id));
    }
}
