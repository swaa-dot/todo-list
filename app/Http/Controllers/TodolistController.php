<?php

namespace App\Http\Controllers;

use App\Models\todolist;
use App\Http\Requests\StoretodolistRequest;
use App\Http\Requests\UpdatetodolistRequest;
use Illuminate\Http\Request;



class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $todolists = Todolist::all();

    return view('todolist.index', compact('todolists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todolist.createTodo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoretodolistRequest $request)
    {
         $validated = $request->validate([
        'name' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'mulai' => 'required|date',
        'berakhir' => 'required|date|after_or_equal:mulai',
        'status' => 'in:in_progress,completed',
    ]);

    $todolist = Todolist::create($validated);

    

    return redirect()->route('todolists.index')->with('success', 'Todo berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(todolist $todolist)
    {
        return view('todolists.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
           $todo = \App\Models\Todolist::findOrFail($id);
    return view('todolists.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'mulai' => 'required|date',
        'berakhir' => 'required|date|after_or_equal:mulai',
        'status' => 'required|in:in_progress,completed',
    ]);

    $todo =Todolist::findOrFail($id);
    $todo->update($request->all());

    return redirect()->route('todolists.index')->with('success', 'Todo berhasil diperbarui!');
}

// ✅ Sudah keluar dari update(), sekarang bikin destroy()
public function destroy($id)
{
    $todo = Todolist::findOrFail($id);
    $todo->delete();

    return redirect()->route('todolists.index')->with('success', 'Data berhasil dihapus.');
}
}
 

