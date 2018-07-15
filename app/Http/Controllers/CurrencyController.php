<?php

namespace App\Http\Controllers;

use App\Currency;
use Illuminate\Http\Request;
use App\Http\Requests\CurrencyRequest;
use Illuminate\Support\Facades\Gate;

class CurrencyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currencies = Currency::all();
        return view('currencies.index', ['currencies' => $currencies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('create', Currency::class)) {
            return redirect('/');
        }
        return view('currencies.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CurrencyRequest $request)
    {
        if (Gate::denies('create', Currency::class)) {
            return redirect('/');
        }
        $data = $request->only(['title', 'short_name', 'logo_url', 'price']);
        $currency = new Currency($data);
        $currency->save();
        $currencies = Currency::all();
        return view('currencies.index', ['currencies' => $currencies]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $currency = Currency::find($id);
        if ($currency === null || Gate::denies('view', $currency)) {
            return redirect('/');
        }
        return view('currencies.show', ['currency' => $currency]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $currency = Currency::find($id);
        if ($currency === null || Gate::denies('update', $currency)) {
            return redirect('/');
        }
        return view('currencies.edit', ['currency' => $currency]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CurrencyRequest $request, $id)
    {
        $currency = Currency::find($id);
        if ($currency === null || Gate::denies('update', $currency)) {
            return redirect('/');
        }
        $currency->title = $request->input('title');
        $currency->short_name = $request->input('short_name');
        $currency->logo_url = $request->input('logo_url');
        $currency->price = $request->input('price');
        $currency->save();
        return redirect()->route('currencies.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $currency = Currency::find($id);
        if ($currency === null || Gate::denies('delete', $currency)) {
            return redirect('/');
        }
        $currency->delete();
        return redirect()->route('currencies.index');
    }
}
