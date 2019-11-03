<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer as OfferModel;
use Illuminate\Support\Facades\DB;

class Offer extends Controller
{
    public function getOffers($options = null, $limit = 12, $owner = null)
    {
        $offers = DB::table('offers')
            ->where(function ($query) use ($options) {
                if ($options === 'hot') {
                    $query->where('is_hot', 1);
                }
            })
            ->where('active', 1)
            ->orderBy('created', 'DESC')
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
            ))
            ->where('offer_id', $offerId)
            ->where('is_available', 1)
            ->where('date_from', '>', date('Y-m-d'))
            ->orderBy('date_from')
            ->pluck('term');

        return $offersTerms;
    }

    public function orderOffer($offerId, Request $request)
    {
        $customerEmail = $request->input('email');
        $chosenTerm = $request->input('term');
        $additionalMessage = $request->input('additional_message');

        DB::table('orders')->insert([
            'offer_id'          => $offerId,
            'customer_email'    => $customerEmail,
            'term'              => $chosenTerm,
            'additional_message'=> $additionalMessage
        ]);

        try {
            $to      = 'bacak2@o2.pl';
            $subject = 'Złożono nowe zamówienie do oferty #' . $offerId;
            $message = 'Mail do kontatku: ' . $customerEmail . "\r\n";
            $message .= 'Wybrany termin: ' . $chosenTerm . "\r\n";

            if (!empty($additionalMessage)) {
                $message .= 'Dodatkowa informacja: ' . $additionalMessage . "\r\n";
            }

            mail($to, $subject, $message);
        } catch (\Exception $e) {}

        return [
            'status' => true
        ];
    }
}
