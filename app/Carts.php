<?php
namespace App;
class Carts
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item,$description){
        $storedItem = ['qty'=>0,'price'=>$item->report_sales_price,'item'=>$item];
        if ($this->items){
            if (array_key_exists($description,$this->items)){
                $storedItem = $this->items[$description];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->report_sales_price * $storedItem['qty'];
        $this->items[$description] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->report_sales_price;
    }

    public function removeItem($description){
        $this->totalQty -= $this->items[$description]['qty'];
        $this->totalPrice -= $this->items[$description]['price'];
        unset($this->items[$description]);

    }
}
