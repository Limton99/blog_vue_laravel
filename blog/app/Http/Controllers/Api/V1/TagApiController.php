<?php


namespace App\Http\Controllers\Api\V1;


use App\Http\Controllers\Controller;
use App\Services\TagService;
use Illuminate\Http\Request;

class TagApiController extends Controller
{
    protected $tagService;

    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }

    public function index() {
        try {
            return response($this->tagService->getAll(), 200);
        } catch (\Exception $e) {
            return response($e->getMessage(), 500);
        }

    }

    public function show($id) {
        return response($this->tagService->show($id));
    }

    public function store(Request $request) {
        return response($this->tagService->store($request));
    }

    public function update(Request $request, $id) {
        return response($this->tagService->update($request, $id));
    }

    public function destroy($id) {
        return response($this->tagService->destroy($id));
    }
}
