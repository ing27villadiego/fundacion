<?php

namespace App\Http\Controllers\Account;

use App\Collection;
use App\Godfather;
use App\Postmen;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections = Collection::all();

        return view('account/collection/index')
            ->with('collections', $collections);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $godfathers = Godfather::select('id', DB::raw('CONCAT(code_godfather, " | ",first_name," ",last_name) as full_name'))
            ->orderBy('full_name')
            ->pluck('full_name', 'id');

        $postmens = Postmen::select('id', DB::raw('CONCAT(first_name," ",last_name) as full_name'))
            ->orderBy('full_name')
            ->pluck('full_name', 'id');

        return view('account/collection/create')
            ->with('postmens', $postmens)
            ->with('godfathers', $godfathers);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CollectionRequest $request)
    {
        Collection::create($request->all());
        return redirect(url('collection'));
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
        $collection = Collection::find($id);

        $godfathers = Godfather::select('id', DB::raw('CONCAT(code_godfather, " | ",first_name," ",last_name) as full_name'))
            ->orderBy('full_name')
            ->pluck('full_name', 'id');

        $postmens = Postmen::select('id', DB::raw('CONCAT(first_name," ",last_name) as full_name'))
            ->orderBy('full_name')
            ->pluck('full_name', 'id');

        return view('account/collection/edit')
            ->with('postmens', $postmens)
            ->with('godfathers', $godfathers)
            ->with('collection', $collection);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CollectionRequest $request, $id)
    {
        $collection = Collection::find($id);
        $collection->  fill($request->all());

        $collection->save();

        return redirect(url('collection'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
