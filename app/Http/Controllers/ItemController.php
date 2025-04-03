<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\ItemImage;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ItemRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $items = Item::with('imageDetails')->orderBy('id', 'desc')->paginate();

        return view('item.index', compact('items'))
            ->with('i', ($request->input('page', 1) - 1) * $items->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $item = new Item();
        $product_type = ['ready' => 'Readymade', 'mfg' => 'Manufactured'];
        $all_cats = Category::all();
        $all_subcats = Category::where('parent_id', '>', 0)->get();

        return view('item.create', compact('item', 'product_type', 'all_cats', 'all_subcats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemRequest $request): RedirectResponse
    {
        $item = Item::create($request->validated());
        Log::debug($request);

        // Main image
        if ($request->hasFile('main_image')) {
            $mainImage = $request->file('main_image');
            $extension = $mainImage->getClientOriginalExtension(); 
            $mainImageName = Str::random(40) . '_main.' . $extension; 
            $mainImagePath = $mainImage->storeAs('images/items', $mainImageName, 'public');

            Log::debug('Main Image Path: ' . $mainImagePath);
            
            ItemImage::create([
                'name'          => $mainImageName,
                'image_type'    => 'main', 
                'items_id'      => $item->id
            ]);
        } else {
            Log::debug('No main image uploaded');
        }

        // Sub images
        if ($request->hasFile('sub_images')) {
            foreach ($request->file('sub_images') as $file) {
                $extension = $file->getClientOriginalExtension(); 
                $subImageName = Str::random(40) . '_sub.' . $extension; 
                $subImagePath = $file->storeAs('images/items', $subImageName, 'public');

                Log::debug('Sub Image Path: ' . $subImagePath);
                
                ItemImage::create([
                    'name'          => $subImageName,
                    'image_type'    => 'sub', 
                    'items_id'      => $item->id
                ]);
            }
        } else {
            Log::debug('No sub images uploaded');
        }

        return Redirect::route('items.index')
            ->with('success', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $item = Item::with('imageDetails')->find($id);

        return view('item.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $item = Item::find($id);
        $product_type = ['ready' => 'Ready made', 'mfg' => 'Manufactured'];
        $all_cats = Category::all();
        $all_subcats = Category::where('parent_id', '>', 0)->get();

        return view('item.edit', compact('item', 'product_type', 'all_cats', 'all_subcats'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemRequest $request, Item $item): RedirectResponse
    {
        $item->update($request->validated());

        return Redirect::route('items.index')
            ->with('success', 'Item updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Item::find($id)->delete();

        return Redirect::route('items.index')
            ->with('success', 'Item deleted successfully');
    }

    public function status(Request $request, Category $category)
    {
        $status_arr = ['active', 'inactive'];
        
        if($request->id > 0 && in_array($request->status, $status_arr)){
            $category = Item::find($request->id);
            $category->update(['status' => $request->status]);
            
            return response()->json([ 'status' => 'success', 'message' => 'Item updated successfully' ]);
        }else{
            return response()->json([ 'status' => 'error', 'message' => 'Invalid request' ]);
        }
    }
}
