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
		if ($this->repository->updateOrCreate(
			['id' => $request->input('id')],
			$request->only(['name', 'description', 'isstart', 'avatar']))) {

			return response()->success();
		}

		return response()->error('Create Error');
	}

	/**
	 * Modify Category By Request
	 *
	 * @param  Request $request
	 * @param  Category              $category
	 * @return Response
	 */
	public function changeStatus(Category $category)
	{
		$originStatus = 0 | $category->isstart;
		$category->isstart = ($originStatus === 1) ? 0 : 1;
		if ($category->save()) {
			return response()->success();
		}

		return response()->error('Create Error');
	}

	/**
	 * Delete Category
	 *
	 * @param  Category $category
	 * @return Response
	 */
	public function delete(Category $category)
	{
		if ($category->delete()) {
			return response()->success();
		}

		return response()->error('Create Error');
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
			->paginate();

		return response()->success($result);
	}

}
