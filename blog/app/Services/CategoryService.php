<?php
namespace App\Services;

use Illuminate\Http\Request;

interface CategoryService
{
    public function index();
    public function show($id);
    public function store(Request $request);
    public function update(Request $request, $id);
    public function destroy($id);
}
