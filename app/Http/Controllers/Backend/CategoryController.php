<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(5);
        return view('backend.categories.index')->with(['categories' => $categories]);
    }

    public function restore($id)
    {
        $categories = Category::withTrashed()->where('id', $id)->restore();

        return redirect()->route('backend.categories.delete');
    }

    public function delete(Request $request)
    {
        $categories = Category::onlyTrashed()->get();
        return view('backend.categories.softDelete', [
            'categories' => $categories,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        $data = $request->only('name');
        // DB::table('categories')->insert([
        //     'name' => $data['name'],
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);

        $category = new Category();
        $category->name = $data['name'];
        $category->save();
        $request->session()->flash('success', 'Thêm mới danh mục thành công!');
        return redirect()->route('backend.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = DB::table('categories')->find($id);

        return view('backend.categories.edit')->with([
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        $data = $request->only(['name']);

        // DB::table('categories')->where('id', $id)->update([
        //     'name' => $data['name'],
        //     'updated_at' => now()
        // ]);
        $category = Category::find($id);
        $category->name = $data['name'];
        $category->save();
        $request->session()->flash('success', 'Cập nhật danh mục thành công!');
        return redirect()->route('backend.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // DB::table('categories')->where('id', $id)->delete();
        Category::destroy($id);
        $request->session()->flash('success', 'Đã xóa danh mục!');
        return redirect()->route('backend.categories.index');
    }
}
