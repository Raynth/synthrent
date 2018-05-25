<?php

namespace App\Model\user;

use App\Model\admin\Mark;

class Cart
{
    public $items = null;
    public $aantalItems = 0;
    public $subTotaal = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->aantalItems = $oldCart->aantalItems;
            $this->subTotaal = $oldCart->subTotaal;
        }
    }

    public function add($item, $id, $begindatum, $einddatum)
    {
        $storedItem['id'] = $item->id;
        $storedItem['merk'] = $item->merk->naam;
        $storedItem['naam'] = $item->naam;
        $storedItem['foto'] = $item->foto;
        $storedItem['begindatum'] = $begindatum;
        $storedItem['einddatum'] = $einddatum;
        $storedItem['dagen'] = date_diff(date_create($begindatum), date_create($einddatum))->format('%d');
        $storedItem['huurprijs'] = $item->huurprijs;
        $storedItem['totale_huurprijs'] = $item->huurprijs * $storedItem['dagen'];
        $this->aantalItems++;
        $this->items[$this->aantalItems] = $storedItem;
        $this->subTotaal += $storedItem['totale_huurprijs'];
    }

    public function removeItem($id)
    {
        $this->aantalItems--;
        $this->subTotaal -= $this->items[$id]['totale_huurprijs'];
        unset($this->items[$id]);
    }
}