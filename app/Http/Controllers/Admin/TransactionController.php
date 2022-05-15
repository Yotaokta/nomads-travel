<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TransactionRequest;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::with([
            'transaction_detail', 'travel_package', 'user'
        ])->get();

        return view('pages.admin.transaction.index', [
            'transactions' => $transactions,
            'title' => 'Paket Travel Data'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionRequest $request)
    {
        // $traveldata = $request->validated();
        // $traveldata['slug'] = Str::slug($request['title']);
        // Transaction::create($traveldata);
        //  return redirect()->route('transaction.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::with([
            'transaction_detail', 'travel_package', 'users'
        ])->findOrFail($id);

        return view('pages.admin.transaction.detail', $transaction);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transactions = Transaction::where('id', $id)->firstorFail();

        return view('pages.admin.transaction.edit', [
            'transaction' => $transactions,
            'title' => 'Update DataTravel'
        ]);
    }

    public function update(TransactionRequest $request, $id)
    {   
        $transaction = $request->validated();

        Transaction::where('id', $id)->update($transaction);
         return redirect()->route('transaction.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transaction::where('id', $id)->delete();
        return redirect()->route('transaction.index');
    }
}
