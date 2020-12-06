<?php

namespace App\Http\Controllers;

use App\Card;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CardsController extends Controller
{
    public function index()
    {
        return view('cards.index');
    }

    public function store(Request $request)
    {

        $validated = $request->validate(['card' => 'required|integer']);

        $cardNumber = Carbon::now()->addDay($validated['card'])->format("Ymd");
        $card = Card::create(['card_number' => $cardNumber, 'user_id' => auth()->user()->id]);
        $card->card_number = $cardNumber . "-" . $card->id;

        $card->save();

        return back();

    }

    public function destroy(Card $card)
    {
        $card->delete();
        return back();
    }

}
