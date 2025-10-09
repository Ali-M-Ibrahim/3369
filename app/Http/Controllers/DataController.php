<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Credential;
use App\Models\Customer;
use App\Models\Service;
use Illuminate\Http\Request;

class DataController extends Controller
{
    function index()
    {
        //select * from customers where id=?;
        $data = Customer::find(3);
        $cred = $data->getCredential;
        $accounts = $data->getAccounts;
        $services = $data->getServices;


        //select * from credentials where id=2
        $data =  Credential::find(2);
        $cust = $data->getCustomer;
        $account = Account::find(1);
        $customeracc= $account->getCustomer;

        $service = Service::find(1);
        $relatedCustomers = $service->getCustomers;
        return $relatedCustomers;

    }
}
