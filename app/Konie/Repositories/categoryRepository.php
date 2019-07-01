<?php
namespace App\Konie\Repositories;

use Illuminate\Support\Facades\Auth;
use App\Category;

class categoryRepository 
{
	public function addCategory($request)
	{
		$category = new Category($request->all());
		$category->save();
	}

	public function updateCategory($request, $category_id)
	{
		$category = Category::findOrFail($category_id);
		$category->fill($request->all())->save();
	}

	public function destroyCategory($category_id)
	{
	 	$category = Category::findOrFail($category_id);
	 	return $category->delete();	
	}

	public function getAllCategories()
	{
		return Category::paginate(20);
	}

	public function getCategoryById($category_id)
	{
		return Category::findOrFail($category_id);
	}
}