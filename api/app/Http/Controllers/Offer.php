<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer as OfferModel;
use Illuminate\Support\Facades\DB;

class Offer extends Controller
{
    public function getOffers($options = null, $limit = 12, $owner = null)
    {
        if ($options === 'new') {
            $orderBy = 'created';
            $orderByDirection = 'DESC';
        } else {
            $orderBy = 'order_priority';
            $orderByDirection = 'ASC';
        }

        $offers = DB::table('offers')
            ->where(function ($query) use ($options, $owner) {
                if ($options === 'hot') {
                    $query->where('is_hot', 1);
                }

                if ($owner !== null) {
                    $query->where('owner', $owner);
                }
            })
            ->where('active', 1)
            ->orderBy($orderBy, $orderByDirection)
            ->limit($limit)
            ->get();

        foreach ($offers as $offer) {
            $offer->tags = $this->getOfferTags($offer->id);
            $offer->terms = $this->getOfferTerms($offer->id);
        }

        return $offers;
    }

    private function getOfferTags($offerId)
    {
        return DB::table('offers_tags')
            ->join('tags', 'tags.id', '=', 'offers_tags.tag_id')
            ->where('offer_id', $offerId)
            ->get();
    }

    public function getOffer($offerId)
    {
        $offer = DB::table('offers')
            ->where('id', $offerId)
            ->first();

        return json_encode([
            'offer'     => $offer,
            'images'    => $this->getOfferImages($offerId),
            'details'   => $this->getOfferDetails($offerId)
        ]);
    }

    private function getOfferImages($offerId)
    {
        $offersImages = DB::table('offers_images')
            ->where('offer_id', $offerId)
            ->orderBy('order_priority')
            ->get();

        return $offersImages;
    }

    private function getOfferDetails($offerId, $mainDescription = false)
    {
        $offersImages = DB::table('offers_details')
            ->where('offer_id', $offerId)
            ->orderBy('order_priority')
            ->get();

        return $offersImages;
    }

    public function getOfferTerms($offerId)
    {
        $offersTerms = DB::table('offers_terms')
            ->select(DB::raw(
                'CONCAT(date_format(date_from, "%d.%m.%Y"),
                 " - ", date_format(date_to, "%d.%m.%Y"),
                 " (", DATEDIFF(date_to, date_from), " dni)"
                 " (", price, " zł / os.)"
                 ) AS term'
            ), 'id')
            ->where('offer_id', $offerId)
            ->where('is_available', 1)
            ->where('date_from', '>', date('Y-m-d'))
            ->orderBy('date_from')
            ->get();

        return $offersTerms;
    }

    public function orderOffer($offerId, Request $request)
    {
        $customerEmail = $request->input('email');
        $chosenTermId = $request->input('term');
        $additionalMessage = $request->input('additional_message');
        $persons = $request->input('person');

        $chosenTerm = $this->getOfferTerm($chosenTermId);

        DB::table('orders')->insert([
            'offer_id'          => $offerId,
            'customer_email'    => $customerEmail,
            'term'              => $chosenTerm,
            'persons'           => $persons,
            'additional_message'=> $additionalMessage
        ]);

        try {
            $to      = 'bacak2@o2.pl';
            $subject = 'Złożono nowe zamówienie do oferty #' . $offerId;
            $message = 'Mail do kontatku: ' . $customerEmail . "\r\n";
            $message .= 'Wybrany termin: ' . $chosenTerm . "\r\n";
            $message .= 'Liczba osób' . $persons . "\r\n";

            if (!empty($additionalMessage)) {
                $message .= 'Dodatkowa informacja: ' . $additionalMessage . "\r\n";
            }

            mail($to, $subject, $message);
        } catch (\Exception $e) {}

        return [
            'status' => true
        ];
    }

    private function getOfferTerm($termId)
    {
        $offerTerm = DB::table('offers_terms')
            ->select(DB::raw(
                'CONCAT(date_format(date_from, "%d.%m.%Y"),
                 " - ", date_format(date_to, "%d.%m.%Y"),
                 " (", DATEDIFF(date_to, date_from), " dni)"
                 " (", price, " zł / os.)"
                 ) AS term'
            ))
            ->where('id', $termId)
            ->pluck('term')
            ->first();

        return $offerTerm;
    }

    public function getOfferTermAvailableSpots($termId)
    {
        $availableSpots = DB::table('offers_terms')
            ->where('id', $termId)
            ->pluck('available_spots')
            ->first();

        return $availableSpots;
    }
}
