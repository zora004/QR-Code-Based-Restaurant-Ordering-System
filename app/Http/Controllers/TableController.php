<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('tables.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $table = \App\Models\Table::create([
            'uuid' => Str::uuid(),
            'name' => 'Table ' . rand(1, 100),
        ]);
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

        $uuid = (string) Str::uuid();


        $tableViewUrl = url('/tables/' . $uuid . '/view');

        // Generate QR code image as PNG
        $qrImage = QrCode::format('png')->size(200)->generate($tableViewUrl);

        // Define the file path
        $fileName = 'qrcodes/' . $uuid . '.png';

        // Save the QR code image to storage/app/public/qrcodes
        Storage::disk('public')->put($fileName, $qrImage);

        // Get the public URL to the QR code image
        $qrImageUrl = Storage::url($fileName);

        $table = Table::create([
            'uuid' => $uuid,
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'qr_location' => $qrImageUrl,
            // Add other fields as needed
        ]);

        return response()->json([
            'success' => true,
            'data' => $table,
            'qr_image' => $qrImageUrl,
            'message' => 'Table created successfully.',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Table $table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Table $table)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Table $table)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table $table)
    {
        //
    }

    public function view($uuid)
    {
        $table = Table::where('uuid', $uuid)->firstOrFail();
        $menus = MenuItem::all(); // Fetch all menus
        return view('tables.menu', compact('table', 'menus'));
    }

    public function getData()
    {
        return DataTables::of(Table::query())
            ->addColumn('qr_image', function ($row) {
                $id = $row->id;
                $imgUrl = asset($row->qr_location);

                $img = '<a href="' . $imgUrl . '" target="_blank">
                    <img src="' . $imgUrl . '" alt="QR Code" class="w-16 h-16 cursor-pointer">
                </a>';
                return $img;
            })
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
            ->rawColumns(['action', 'qr_image'])
            ->make(true);
    }
}
