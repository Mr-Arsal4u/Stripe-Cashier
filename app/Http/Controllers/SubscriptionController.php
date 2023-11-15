<?php

namespace App\Http\Controllers;

use Exception;
use Stripe\Plan;
use Stripe\Stripe;
use Stripe\Customer;
use Illuminate\Http\Request;
use Laravel\Cashier\Subscription;
use App\Models\Plan as ModelsPlan;

class SubscriptionController extends Controller
{

    public function showPlanForm()
    {
        return view('stripe.create');
    }

    public function savePlan(Request $request)
    {
        // dd($request->all());
        Stripe::setApiKey(config('services.stripe.secret'));

        $amount = ($request->amount * 100);
        try {
            $plan =   Plan::create([
                'amount' => $amount,
                'currency' => $request->currency,
                'interval' => $request->billing_period,
                'interval_count' => $request->interval_count,

                'product' => [
                    'name' => $request->name
                ]
            ]);

            ModelsPlan::create([
                'plan_id' => $plan->id,
                'name' => $request->name,
                'price' => $plan->amount,
                'billing_method' => $plan->interval,
                'currency' => $plan->currency,
                'interval_count' => $plan->interval_count,

            ]);
        } catch (Exception $ex) {
            dd($ex->getMessage());
        }

        return 'success';
    }

    public function allPlan()
    {
        $basic = ModelsPlan::where('name', 'basic')->first();
        $standard = ModelsPlan::where('name', 'standard')->first();
        $professional = ModelsPlan::where('name', 'professional')->first();

        return view('stripe.plan', compact('basic', 'standard', 'professional'));
    }
    public function planCheckout($id)
    {
        $plan = ModelsPlan::where('plan_id', $id)->first();
        if (!$plan) {
            return back()->withErrors([
                'message' => 'Failed '
            ]);
        }
        return view('stripe.checkout', [
            'plan' => $plan,
            'intent' => auth()->user()->createSetupIntent()
        ]);
    }

    public function process(Request $request)
    {
        $user = $request->user();

        $user->newSubscription('default', $request->plan_id)
            ->create($request->payment_method);

        $request->session()->flash('alert-success', 'You are subscribed!');

        return redirect()->route('checkout', $request->plan_id);
    }

    public function allSubscription()
    {
        $subscriptions=Subscription::where('user_id',auth()->id())->get();
        return view('subscription',compact('subscriptions'));
    }

    public function cancel(Request $request)
    {
        $subscriptionName= $request->subscriptionName;

        if($subscriptionName){

             $user= auth()->user();
            $user->subscription($subscriptionName)->cancel();
            return 'cancelled';
        }
    }

    public function resume(Request $request)
    {            $user = auth()->user();

        $subscriptionName = $request->subscriptionName;

        if ($subscriptionName) {

            $user->subscription($subscriptionName)->resume();
            return 'Resumed';
        }
    }
}