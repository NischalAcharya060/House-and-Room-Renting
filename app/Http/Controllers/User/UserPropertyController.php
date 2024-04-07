<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class UserPropertyController extends Controller
{
    public function index()
    {
        // Get all properties
        $properties = Property::all();

        return view('user.property.index', ['properties' => $properties]);
    }

    public function show($id)
    {
        $property = Property::findOrFail($id);
        return view('user.property.show', compact('property'));
    }

    public function confirm(Request $request, $propertyId)
    {
        try {
            $property = Property::findOrFail($propertyId);

            $validator = Validator::make($request->all(), [
                'rental_duration' => 'required|numeric', // Adding validation rules
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            // Calculate the total amount based on rental duration and property price
            $rentalDuration = $request->input('rental_duration');
            $totalAmount = $property->price * $rentalDuration;

            // Create a new Rental instance
            $user = auth()->user();
            $rental = new Rental();
            $rental->user_id = $user->id;
            $rental->property_id = $property->id;
            $rental->total_amount = $totalAmount;
            $rental->rental_duration = $rentalDuration;

            // Save the rental to the database
            $rental->save();

            // Set the rental ID in the session
            $request->session()->put('rental.id', $rental->id);

            // Set other rental details in the session
            $request->session()->put('rental.total_amount', $rental->total_amount);

            return view('user.property.confirmation', compact('rental', 'property'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function rent(Property $property, Request $request)
    {
        try {
            // Check if the property is available for rent
            if ($property->status === 'available') {
                \DB::beginTransaction();

                $property->status = 'rented';
                $property->save();

                // Create a new rental record with the specified rental duration
                Rental::create([
                    'property_id' => $property->id,
                    'user_id' => Auth::id(),
                    'rental_duration' => $request->input('rental_duration'), // Get rental duration input from the form
                ]);

                \DB::commit();

                return redirect()->route('user.properties.index')->with('success', 'Property rented successfully.');
            } else {
                return redirect()->route('user.properties.index')->with('error', 'This property is already rented.');
            }
        } catch (\Exception $e) {
            \DB::rollback();

            return redirect()->route('user.properties.index')->with('error', 'An error occurred while renting the property.');
        }
    }

    public function Stripe_initiate(Request $request)
    {
        try {
            \Stripe\Stripe::setApiKey(config('app.sk'));

            // Retrieve rental data from the session
            $rentalId = session('rental.id');
            $totalAmount = session('rental.total_amount');

            // Ensure all required data is present
            if (!$rentalId || !$totalAmount) {
                throw new \Exception('Incomplete or missing rental information in session.');
            }

            // Retrieve rental details from the database using the rental ID
            $rental = Rental::findOrFail($rentalId);

            // Ensure the total amount matches the rental total amount
            if ($totalAmount != $rental->total_amount) {
                throw new \Exception('Mismatch in total amount.');
            }

            $rental->status = 'Payment Completed';

            $rental->save();

            // Create a Stripe Checkout session
            $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'NPR',
                        'product_data' => [
                            'name' => 'Rental for ' . $rental->rental_duration . ' months',
                        ],
                        'unit_amount' => $totalAmount * 100,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('user.bookings.stripe.success'),
            ]);

            return redirect()->away($session->url);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function Stripe_success()
    {
        return view('user.property.success');
    }

    public function myRenting()
    {
        $user = auth()->user();
        $rentedProperties = $user->rentals()->with('property')->paginate(5);

        return view('user.property.my_renting')->with('rentedProperties', $rentedProperties);
    }

}
