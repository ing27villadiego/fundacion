<?php

namespace App\Http\Controllers\Account;


use App\Funpacol\Repositories\GodfatherRepo;
use App\Funpacol\Repositories\PostmenportfolioRepo;
use App\Funpacol\Repositories\PostmenRepo;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PostmenportfolioController extends Controller {


    protected $postmentportfolioRepo;
    protected $godfatherRepo;
    protected $postmentRepo;

    public function __construct(PostmenportfolioRepo $postmenportfolioRepo,
                                GodfatherRepo $godfatherRepo,
                                PostmenRepo $postmenRepo)
    {
        $this->postmentportfolioRepo = $postmenportfolioRepo;
        $this->postmentRepo = $postmenRepo;
        $this->godfatherRepo = $godfatherRepo;
    }

    public function index()
    {

        $postmenPortfolios = $this->postmentportfolioRepo->All();
        return view('account/postmen_portfolio/index', compact('postmenPortfolios'));
    }

    public function PostmenportfolioEdit($id)
    {
        $postmentportfolio = $this->postmentportfolioRepo->edit($id);
        $godfathers = $this->godfatherRepo->All()->pluck('first_name', 'id');
        $postments = $this->postmentRepo->All()->pluck('first_name', 'id');
        return view('account/postmen_portfolio/edit', compact('postmentportfolio', 'godfathers', 'postments'));
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

        return view('account/postmen_portfolio/create')
            ->with('postmens', $postmens)
            ->with('godfathers', $godfathers);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostmenportfolioRequest $request)
    {
        Postmenportfolio::create($request->all());
        return redirect(url('postmenPortfolio'));
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
        $postmenportfolio = Postmenportfolio::find($id);

        $godfathers = Godfather::select('id', DB::raw('CONCAT(first_name," ",last_name) as full_name'))
            ->orderBy('full_name')
            ->pluck('full_name', 'id');

        $postmens = Postmen::select('id', DB::raw('CONCAT(first_name," ",last_name) as full_name'))
            ->orderBy('full_name')
            ->pluck('full_name', 'id');

        return view('account/postmen_portfolio/edit')
            ->with('postmens', $postmens)
            ->with('godfathers', $godfathers)
            ->with('postmenportfolio', $postmenportfolio);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostmenportfolioRequest $request, $id)
    {
        $postmenportfolio = Postmenportfolio::find($id);
        $postmenportfolio->  fill($request->all());

        $postmenportfolio->save();

        return redirect(url('postmenPortfolio'));
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
