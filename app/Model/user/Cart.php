<?php

namespace App\Model\user;

use App\Model\admin\ProductMark;

class Cart
{
    public $items = null;
    public $totalQuantity = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQuantity = $oldCart->totalQuantity;
            $this->totalPrice = $oldCart->totalPrice;

        }
    }

    public function add($item, $id, $begindatum, $einddatum)
    {
        $storedItem = $item;
        $storedItem['begindatum'] = $begindatum;
        $storedItem['einddatum'] = $einddatum;
        $storedItem['totalDays'] = date_diff(date_create($begindatum), date_create($einddatum))->format('%d');
        $storedItem['totalRentMoney'] = $item->huurprijs * $storedItem['totalDays'];
        $storedItem['productMarkName'] = ProductMark::find($item->product_mark_id)->naam;
        
        $this->totalQuantity++;
        $this->items[$this->totalQuantity] = $storedItem;
        $this->totalPrice += $storedItem['totalRentMoney'];
    }

    public function removeItem($id)
    {
        $this->totalQuantity--;
        $this->totalPrice -= $this->items[$id]->totalRentMoney;
        unset($this->items[$id]);
    }
}