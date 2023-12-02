<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Resources\CategoryResource;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\StoreCategoryRequest;
use Auth;
/**
 * @group Categories
 *
 * APIs for managing user Categories.
 */


class CategoryController extends Controller
{
        /**
     * Get a list of all categories.
     *
     * @queryParam page int The page number (default is 1).
     * @queryParam per_page int The number of categories per page (default is 10).
     * @response {
     *    "status": "success",
     *    "data": [
     *        {
     *            "id": 1,
     *            "name": "Category 1",
     *            "des": "Description of Category 1",
     *            "created_at": "2023-01-01 12:00:00",
     *            "updated_at": "2023-01-01 12:30:00"
     *        },
     *        // Other categories
     *    ]
     * }
     */
    public function index()
    {
        if (!Auth::user()->tokenCan('read')) {
            abort(403,'Unauthorized');
        }
        $categories = Category::with('links')->paginate(5);
        return CategoryResource::collection($categories);
    }

        /**
     * Create a new category.
     *
     * @bodyParam name string required The name of the category.
     * @bodyParam des string required The description of the category.
     * @response {
     *    "status": "success",
     *    "data": {
     *        "id": 2,
     *        "name": "New Category",
     *        "des": "Description of New Category",
     *        "created_at": "2023-02-01 14:00:00",
     *        "updated_at": "2023-02-01 14:00:00"
     *    }
     * }
     */

    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->all());
        return new CategoryResource($category);

    }

    /**
     * Get details of a specific category.
     *
     * @urlParam id int required The ID of the category.
     * @response {
     *    "status": "success",
     *    "data": {
     *        "id": 1,
     *        "name": "Category 1",
     *        "des": "Description of Category 1",
     *        "created_at": "2023-01-01 12:00:00",
     *        "updated_at": "2023-01-01 12:30:00"
     *    }
     * }
     * @response 404 {
     *    "status": "error",
     *    "message": "Category not found"
     * }
     */
    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

        /**
     * Update a category.
     *
     * @urlParam id int required The ID of the category to update.
     * @bodyParam name string required max:255 The new name of the category.
     * @bodyParam des string The new description of the category.
     * @response {
     *    "status": "success",
     *    "data": {
     *        "id": 2,
     *        "name": "Updated Category",
     *        "des": "Updated Description",
     *        "created_at": "2023-02-01 14:00:00",
     *        "updated_at": "2023-02-01 15:00:00"
     *    }
     * }
     * @response 404 {
     *    "status": "error",
     *    "message": "Category not found"
     * }
     */

    public function update(StoreCategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        // return New CategoryResource($category);
        return response()->json(['message' => 'Resource updated successfully'], 200);
    }

        /**
     * Delete a category.
     *
     * @urlParam id int required The ID of the category to delete.
     * @response {
     *    "status": "success",
     *    "message": "Category deleted successfully"
     * }
     * @response 404 {
     *    "status": "error",
     *    "message": "Category not found"
     * }
     */

    public function destroy(Category $category)
    {
        // return new CategoryResource($category);
        $category->delete();
        return response()->json(['message' => 'Resource deleted successfully'], 204);
    }
}
