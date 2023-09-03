<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Produck;

class CategoryController extends Controller
{
    public function index(Category $category){
        
        $title = 'Produk';
        $category = $category;

        
        return view('category.index', compact('category', 'title'));
    }
}
