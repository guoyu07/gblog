<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryCreateRequest;
use App\Repositories\Repository\CategoryRepository;

class CategoryController extends Controller
{

	private $repository = null;

	/**
	 * create new Instance
	 * 
	 * @param CategoryRepository $repository 
	 */
	public function __construct(CategoryRepository $repository)
	{
		$this->repository = $repository;
	}

	/**
	 * Create Category Record
	 * 
	 * @param  CategoryCreateRequest $request
	 * @return Response
	 */
	public function create(CategoryCreateRequest $request)
	{
		if ($this->repository->create($request->all())) {
			return response()->success();
		}

		return response()->error('Create Error');
	}

	/**
	 * Modify Category By Request
	 * 
	 * @param  CategoryCreateRequest $request 
	 * @param  Category              $category
	 * @return Response
	 */
	public function modify(CategoryCreateRequest $request, Category $category)
	{
		$category->update();																																																																																																																																																																																																																																																																																																																																																																																																																																																																													
	}

	/**
	 * Category List
	 * 
	 * @return Response
	 */
	public function lists()
	{
		$result = $this->repository
			->withCount('posts')
			->withCount('comments')
			->withCount('stars')
			->paginate();

		return response()->success($result);
	}

}