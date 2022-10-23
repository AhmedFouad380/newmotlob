<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyPackage;
use App\Models\CompanyPayment;
use App\Models\Package;
use App\Models\Payment;
use Illuminate\Http\Request;
use \Fawaterk\Fawaterk;
use Auth;

class PaymentController extends Controller
{
    public function PaymentUrl($id){
        if($package = Package::where('id',$id)->first()){
            $payment = new Payment();
            $payment->date=\Carbon\Carbon::parse()->format('Y-m-d');
            $payment->package_id=$id;
            $payment->states='pending';
            $payment->type = $package->type;
            $payment->user_id=Auth::guard('web')->user()->id;
            $payment->save();

            $vendorKey = '4c0f785961f3821d53046710c522e7ce8d501aefe0e21f7e4e';
// prepare the data in the correct format.
            $cartItems = [
                [ 'name' => 'cv', 'price' => 10, 'quantity' => 1],
            ];
            $customer = [
                "first_name"=> Auth::guard('web')->user()->info->firstname,
                "last_name"=> Auth::guard('web')->user()->info->lastname,
                'email'   => Auth::guard('web')->user()->email,
                'phone'   => Auth::guard('web')->user()->phone,
                'address' => Auth::guard('web')->user()->Country->name
            ];
            $shipping = 0;
            $cartTotal = 10;
            $redirectUrl = array(
                "successUrl" => "https://mattlob.com/SuccessPayment?order_id=".$payment->id,
                "failUrl" => "https://mattlob.com/RejectPayment?order_id=".$payment->id,
                "pendingUrl" => "https://mattlob.com/PendingPayment?order_id=".$payment->id

            );

            $currency = 'EGP';

            $data = [
                "vendorKey"     => $vendorKey,
                "cartItems"     => $cartItems,
                "cartTotal"     => $cartTotal,
                'shipping'      => $shipping,
                "customer"      => $customer,
                'redirectionUrls'   => $redirectUrl,
                'currency'      => $currency
            ];
// fill the object with the correct data
            $response = $this->send( $data );
            if(isset($response->data)){
                return  redirect($response->data->url);
            }else{
                return  $response;
            }

        }else{
            return back();
        }
    }

    public function send( array $data )
    {
        $data = json_encode($data);

        $ch = curl_init('https://app.fawaterk.com/api/v2/createInvoiceLink');

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Authorization: Bearer 4c0f785961f3821d53046710c522e7ce8d501aefe0e21f7e4e',
                'Content-Length: ' . strlen($data))
        );


        $curlResult = curl_exec($ch);

        return json_decode($curlResult);
    }

    public function PendingPayment(Request $request){

        $invoice= $request->invoice_id;
        $payment = Payment::find($request->order_id);
        $payment->invoice_id=$invoice;
        $payment->save();

        return redirect('cv-maker-step10')->with('PendingPayment','PendingPayment');

    }

    public function SuccessPayment(Request $request){

        $invoice= $request->invoice_id;
        $payment = Payment::find($request->order_id);
        $payment->invoice_id=$invoice;
        $payment->states='payed';
        $payment->type='time';
        $payment->save();

        return redirect('cv-maker-step10')->with('SuccessPayment','SuccessPayment');

    }

    public function RejectPayment(Request $request){
        $invoice= $request->invoice_id;
        $payment = Payment::find($request->order_id);
        $payment->invoice_id=$invoice;
        $payment->states='reject';
        $payment->save();

        return redirect('cv-maker-step10')->with('RejectPayment','RejectPayment');

    }
    public function PendingCompanyPayment(Request $request){

        $invoice= $request->invoice_id;
        $payment = CompanyPayment::find($request->order_id);
        $payment->invoice_id=$invoice;
        $payment->save();

        return redirect('CompanyPackage')->with('PendingPayment','PendingPayment');

    }

    public function SuccessCompanyPayment(Request $request){

        $invoice= $request->invoice_id;
        $payment = CompanyPayment::find($request->order_id);
        $payment->invoice_id=$invoice;
        $payment->states='payed';
        $payment->save();
        $company = Company::findOfFail($payment->company_id);
        $company->company_type='private';
        $company->save();

        return redirect('CompanyPackage')->with('SuccessPayment','SuccessPayment');

    }

    public function RejectCompanyPayment(Request $request){
        $invoice= $request->invoice_id;
        $payment = CompanyPayment::find($request->order_id);
        $payment->invoice_id=$invoice;
        $payment->states='rejected';
        $payment->save();

        return redirect('CompanyPackage')->with('RejectPayment','RejectPayment');

    }
    public function PaymentPackage($id){
        if($package = CompanyPackage::where('id',$id)->first()){
            $payment = new CompanyPayment();
            $payment->date=\Carbon\Carbon::parse()->format('Y-m-d');
            $payment->package_id=$id;
            $payment->states='pending';
            $payment->company_id=Auth::guard('company')->user()->id;
            $payment->save();

            $vendorKey = '4c0f785961f3821d53046710c522e7ce8d501aefe0e21f7e4e';
// prepare the data in the correct format.
            $cartItems = [
                [ 'name' => $package->title, 'price' => $package->price, 'quantity' => 1],
            ];
            $customer = [
                "first_name"=> Auth::guard('company')->user()->first_name,
                "last_name"=> Auth::guard('company')->user()->last_name,
                'email'   => Auth::guard('company')->user()->email,
                'phone'   => Auth::guard('company')->user()->phone,
                'address' => Auth::guard('company')->user()->Country->name
            ];
            $shipping = 0;
            $cartTotal = $package->price;
            $redirectUrl = array(
                "successUrl" => "https://mattlob.com/SuccessCompanyPayment?order_id=".$payment->id,
                "failUrl" => "https://mattlob.com/RejectCompanyPayment?order_id=".$payment->id,
                "pendingUrl" => "https://mattlob.com/PendingCompanyPayment?order_id=".$payment->id

            );

            $currency = 'EGP';

            $data = [
                "vendorKey"     => $vendorKey,
                "cartItems"     => $cartItems,
                "cartTotal"     => $cartTotal,
                'shipping'      => $shipping,
                "customer"      => $customer,
                'redirectionUrls'   => $redirectUrl,
                'currency'      => $currency
            ];
// fill the object with the correct data
            $response = $this->send( $data );
            if(isset($response->data)){
                return  redirect($response->data->url);
            }else{
                return  $response;
            }

        }else{
            return back();
        }
    }
}
