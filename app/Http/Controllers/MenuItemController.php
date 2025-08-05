<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('menus.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // Add other validation rules as needed
        ]);

        $menuItem = MenuItem::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'category' => $request->input('category'),
            'available' => $request->input('available', true),
            // Add other fields as needed
        ]);

        return response()->json([
            'success' => true,
            'data' => $menuItem,
            'message' => 'Table created successfully.',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(MenuItem $menuItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MenuItem $menuItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MenuItem $menuItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuItem $menuItem)
    {
        //
    }

    public function getData()
    {
        return DataTables::of(MenuItem::query())
            ->addColumn('action', function ($row) {
                $id = $row->id;

                $btn = '
                        <button type="button" class="inline-flex items-center px-2 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded mr-1 cursor-pointer" onClick="viewTable(' . $id . ')">
                            <i class="bx bxs-user-account" style="font-size: 20px;" title="View">View</i>
                        </button>
                        <button type="button" class="inline-flex items-center px-2 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded mr-1 cursor-pointer" onClick="editTable(' . $id . ')">
                            <i class="bx bxs-edit" style="font-size: 20px;" title="Edit">Edit</i>
                        </button>
                        <button type="button" class="inline-flex items-center px-2 py-1 bg-red-500 hover:bg-red-600 text-white rounded cursor-pointer" onClick="deleteTable(' . $id . ')">
                            <i class="bx bx-trash" style="font-size: 20px;" title="Delete">Delete</i>
                        </button>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
