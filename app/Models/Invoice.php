<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;


    public function Company(){
        return   $this->belongsTo(Company::class ,'company_id')->withDefault([
            'phone'=>'',
        ]);;
    }


    public function Admin(){
        return   $this->belongsTo(Admin::class ,'admin_id')->withDefault([
            'name'=>''
        ]);
    }
    public function Details(){
        return $this->HasMany(InvoiceDetail::class , 'invoice_id');
    }

    public function InvoicePayments(){
        return $this->HasMany(InvoicePayments::class , 'invoice_id');

    }

}
