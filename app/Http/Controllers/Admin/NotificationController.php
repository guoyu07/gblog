<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
	public function message()
	{
		return response()->success([
			[
				'user' => [
					'id' => 2,
					'avatar' => ''
				],
				'created_at' => '两天前',
				'desc' => '你有一条',
				'created_at_detail' => '2015-12-12 12:12:00'
			],
			[
				'user' => [
					'id' => 2,
					'avatar' => ''
				],
				'created_at' => '两天前',
				'desc' => '你有一条',
				'created_at_detail' => '2015-12-12 12:12:00'
			],
			[
				'user' => [
					'id' => 2,
					'avatar' => ''
				],
				'created_at' => '两天前',
				'desc' => '你有一条',
				'created_at_detail' => '2015-12-12 12:12:00'
			],
			[
				'user' => [
					'id' => 2,
					'avatar' => ''
				],
				'created_at' => '两天前',
				'desc' => '你有一条',
				'created_at_detail' => '2015-12-12 12:12:00'
			]
		]);
	}


	public function messageBox()
	{
		return response()->success([
			[
				'created_at' => '两天前',
				'desc' => '你有一条',
				'url' => '#'
			],
			[
				'created_at' => '两天前',
				'desc' => '你有一条',
				'url' => '#'
			],
			[
				'created_at' => '两天前',
				'desc' => '你有一条',
				'url' => '#'
			]
		]);
	}
}

