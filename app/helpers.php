<?php

use App\Models\AddFund;
use App\Models\CustomerTriket;
use App\Models\Fund;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

function fund()
{
    return Fund::where('user_id', Auth::id())->first();
}

/**
 * Total Order Processing Cound
 */
function total_order()
{
    return Order::where('status', 1)->count();
}

/**
 *  Total Fund Pending Cound
 */

function fund_pending_cound()
{
    return AddFund::where('status', 1)->sum('dollar');
}

/**
 * Customer Triket 
 */
function all_triket()
{
    return CustomerTriket::where('status', 1)->get();
}
/**
 * Customer Triket count
 */
function all_triket_count()
{
    return CustomerTriket::where('status', 1)->count();
}

/**
 * Admin replay Triket
 */

function all_replay_triket()
{
    return CustomerTriket::where('user_id',Auth::id())->where('status', 2)->latest()->get();
}

/**
 * Customer Triket count
 */
function all_replay_count()
{
    return CustomerTriket::where('user_id',Auth::id())->where('status', 2)->count();
}
