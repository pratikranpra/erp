<?php

namespace App\Http\Controllers;

use App\Models\OtherUser;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\OtherUserRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class OtherUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $otherUsers = OtherUser::orderBy('id', 'desc')->paginate();

        return view('other_users.index', compact('otherUsers'))
            ->with('i', ($request->input('page', 1) - 1) * $otherUsers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $otherUser = new OtherUser();

        return view('other_users.create', compact('otherUser'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OtherUserRequest $request): RedirectResponse
    {
        OtherUser::create($request->validated());

        return Redirect::route('other_users.index')
            ->with('success', 'OtherUser created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $otherUser = OtherUser::find($id);

        return view('other_users.show', compact('otherUser'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $otherUser = OtherUser::find($id);

        return view('other_users.edit', compact('otherUser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OtherUserRequest $request, OtherUser $otherUser): RedirectResponse
    {
        $otherUser->update($request->validated());

        return Redirect::route('other_users.index')
            ->with('success', 'OtherUser updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        OtherUser::find($id)->delete();

        return Redirect::route('other_users.index')
            ->with('success', 'OtherUser deleted successfully');
    }

    public function status(Request $request, OtherUser $otherUser)
    {
        $status_arr = ['active', 'inactive'];
        
        if($request->id > 0 && in_array($request->status, $status_arr)){
            $otherUser = OtherUser::find($request->id);
            $otherUser->update(['status' => $request->status]);
            
            return response()->json([ 'status' => 'success', 'message' => 'OtherUser updated successfully' ]);
        }else{
            return response()->json([ 'status' => 'error', 'message' => 'Invalid request' ]);
        }
    }
}
