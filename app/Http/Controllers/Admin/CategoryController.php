<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryCreateRequest;
use App\Repositories\Interface\CategoryRepository;

class CategoryController extends Controller
{

	private $repository = null;

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
		if ($this->repository->create($request->all()) {
			return response()->success();
		}

		return response()->error('Create Error');
	}

	public function modify(CategoryCreateRequest $request, Category $category)
	{																																																																																																																																																																																																																																																																																																																																																																																																																																																																																				
	}

}