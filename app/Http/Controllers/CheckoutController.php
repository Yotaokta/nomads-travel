<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Models\TransactionDetails;
use App\Models\TransactionPackage;
use Illuminate\Support\Facades\Auth;


class CheckoutController extends Controller
{
    
    public function home($transactionId)
    {
        $transactionDetail = Transaction::with(['transaction_detail', 'travel_package', 'user'])->findOrFail($transactionId);
         return view('pages.checkout', [ 
            'title' => 'Checkout Page of Bromo, Malang' ,
            'transactions' => $transactionDetail
        ]);
    }

    public function process($travelPackageId)
    {
            $travelById = TravelPackage::findOrFail($travelPackageId);

            $transaction = Transaction::create([
                'travel_package_id' => $travelPackageId,
                'users_id' => Auth::user()->id,
                'additional_visa' => 0,
                'transactional_total' => $travelById->price,
                'transactional_status' => 'IN_CART'
            ]);

            TransactionDetails::create([
                'transactions_id' => $transaction->id,
                'username' => Auth::user()->username,
                'nationality' => 'ID',
                'is_visa' => false,
                'doe_passport' => Carbon::now()->addYears(5)
            ]);

            return redirect()->route('checkout', $transaction->id);
    }

    public function create(Request $request, $detail_id)
    {
            $request->validate([
                'username' => 'required|string|exists:users,username',
                'nationality' => 'required|string',
                'is_visa' => 'required|boolean',
                'doe_passport' => 'required'
            ]);

            $memberInvited = $request->only(['username', 'nationality', 'is_visa', 'doe_passport']);
            $memberInvited['transactions_id'] = $detail_id;

            TransactionDetails::create($memberInvited);

            $transactionById = Transaction::with('travel_package')->find($detail_id);

            if (!$request->is_visa) {
                   return redirect()->route('checkout', $detail_id);
            }

            $transactionById->transactional_total += 2500000;
            $transactionById->additional_visa += 2500000;

            $transactionById->transactional_total += $transactionById->travel_package->price;

            $transactionById->save();

            return redirect()->route('checkout', $detail_id);
    }

    public function remove($detail_id)
    {
        $checkoutById = TransactionDetails::findOrFail($detail_id);
        $transaction =  Transaction::with(['transaction_detail', 'travel_package'])->findOrFail($checkoutById->transactions_id);

          if ($checkoutById->is_visa) {
                   $transaction->transaction_total -= 2500000;
                   $transaction->additional_visa -= 2500000;
            }

            $transaction->transaction_total -= $transaction->travel_package->price;

            $transactionById->save();
            $checkoutById->delete();

            return redirect()->route('checkout', $checkoutById->transaction_id);
    }

    public function success(int $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->transactional_status = 'PENDING';

        $transaction->save();

        return view('pages.success', [
            'title' => "Transaksi Sukses"
        ]);
    }


}
