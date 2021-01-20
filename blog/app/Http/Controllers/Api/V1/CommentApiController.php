<?php


namespace App\Http\Controllers\Api\V1;


use App\Http\Controllers\Controller;
use App\Services\CommentService;
use Illuminate\Http\Request;

class CommentApiController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function index() {
        return response($this->commentService->index(), 200);
    }

    public function show($id) {
        return response($this->commentService->show($id), 200);
    }

    public function store(Request $request) {
        return response($this->commentService->store($request), 200);
    }

    public function update(Request $request, $id) {
        return response($this->commentService->update($request, $id), 200);
    }

    public function destroy($id) {
        return response($this->commentService->destroy($id), 200);
    }
}
