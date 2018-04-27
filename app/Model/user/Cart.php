<?php

namespace App\Model\user;

use App\Model\admin\ProductMark;

class Cart
{
    public $items = null;
    public $aantalItems = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->aantalItems = $oldCart->aantalItems;
            $this->totalPrice = $oldCart->totalPrice;

        }
    }

    public function add($item, $id, $begindatum, $einddatum)
    {
        $storedItem['id'] = $item->id;
        $storedItem['merk'] = $item->product_mark->naam;
        $storedItem['naam'] = $item->naam;
        $storedItem['foto'] = $item->foto;
        $storedItem['begindatum'] = $begindatum;
        $storedItem['einddatum'] = $einddatum;
        $storedItem['aantalDagen'] = date_diff(date_create($begindatum), date_create($einddatum))->format('%d');
        $storedItem['huurprijs'] = $item->huurprijs;
        $storedItem['totaalHuurprijs'] = $item->huurprijs * $storedItem['aantalDagen'];
        $this->aantalItems++;
        $this->items[$this->aantalItems] = $storedItem;
        $this->totalPrice += $storedItem['totaalHuurprijs'];
    }

    public function removeItem($id)
    {
        $this->aantalItems--;
        $this->totalPrice -= $this->items[$id]->totaalHuurprijs;
        unset($this->items[$id]);
    }
}