<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Http\Services\AccountService;
use App\Models\Account;
use App\Models\Biller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    private AccountService $accountService;

    public function __construct(AccountService $accountService) {
        $this->accountService = $accountService;
    }
    /**
     * Display a listing of the accounts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(string $biller)
    {
        return $this->accountService->findAllByBillerId($biller);
    }

    public function useBalance(Account $account)
    {
        return $this->accountService->useBalance($account);
    }

    public function findOrCreate(AccountRequest $request)
    {
        return $this->accountService->findOrCreate($request->validated());
    }
}
