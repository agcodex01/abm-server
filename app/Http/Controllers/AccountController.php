<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Http\Services\AccountService;
use App\Models\Account;
use App\Permission\Permission;
use App\Permission\PermissionCapabilities;

class AccountController extends Controller
{
    public function __construct(
        private AccountService $accountService,
        private Permission $permission
    ) {
    }

    /**
     * Display a listing of the accounts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(string $biller)
    {
        $this->permission->throwIfAccessDenied(
            PermissionCapabilities::VIEW_ACCOUNTS_LABEL
        );

        return $this->accountService->findAllByBillerId($biller);
    }

    public function useBalance(Account $account)
    {
        $this->permission->throwIfAccessDenied(
            PermissionCapabilities::VIEW_ACCOUNTS_LABEL
        );

        return $this->accountService->useBalance($account);
    }

    public function findOrCreate(AccountRequest $request)
    {
        $this->permission->throwIfAccessDenied(
            PermissionCapabilities::VIEW_ACCOUNTS_LABEL
        );

        return $this->accountService->findOrCreate($request->validated());
    }
}
