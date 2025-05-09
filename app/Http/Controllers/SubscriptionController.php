<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Http\Requests\StoreSubscriptionRequest;
use App\Http\Requests\UpdateSubscriptionRequest;

class SubscriptionController extends Controller
{
/**
 * Display a listing of the resource.
 */
public function index()
{
    $subscriptions = Subscription::with('student')->get();
    return response()->json($subscriptions);
}

/**
 * Store a newly created resource in storage.
 */
public function store(StoreSubscriptionRequest $request)
{
    $subscription = Subscription::create($request->validated());
    return response()->json($subscription, 201);
}

/**
 * Display the specified resource.
 */
public function show(Subscription $subscription)
{
    return response()->json($subscription->load('student'));
}

/**
 * Update the specified resource in storage.
 */
public function update(UpdateSubscriptionRequest $request, Subscription $subscription)
{
    $subscription->update($request->validated());
    return response()->json($subscription);
}

/**
 * Remove the specified resource from storage.
 */
public function destroy(Subscription $subscription)
{
    $subscription->delete();
    return response()->json(null, 204);
}
}
