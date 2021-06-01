<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Fish;
use Illuminate\Http\Request;

class FishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $fish = Fish::all();

      return view ('admin.fish.index', compact ('fish'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.fish.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'weight' => 'required|numeric',
        'race' => 'nullable|string|max:255',
      ]);

      $data = $request->all();
      $data['slug'] = $this->generateSlug($data['name']);

      $fish = new Fish();
      $fish->create($data);

      return redirect()->route('admin.fish.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fish  $fish
     * @return \Illuminate\Http\Response
     */
    public function show(Fish $fish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fish  $fish
     * @return \Illuminate\Http\Response
     */
    public function edit(Fish $fish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fish  $fish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fish $fish)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fish  $fish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fish $fish)
    {
        //
    }
    private function generateSlug(string $title, bool $change = true)
{
  $slug = Str::slug($title, '-');

  if (!$change) {
    return $slug;
  }

  $slug_base = $slug;
  $contatore = 1;

  $post_with_slug = Fish::where('slug', '=', $slug)->first();
  while ($post_with_slug) {
    $slug = $slug_base . '-' . $contatore;
    $contatore++;

    $post_with_slug = Fish::where('slug', '=', $slug)->first();
  }
  return $slug;

}

}
