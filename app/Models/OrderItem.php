<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class OrderItem extends Model
{
    use HasFactory;
    /**
     * REVIEW ATTRIBUTES
     * $this->attributes['id'] - int - contains the review primary key (id)
     * $this->comment['subtotal'] - float - contains subtotalprice of the item
     * $this->attributes['quantity'] - int - contains the quantity of the item
     */

    protected $fillable = ['subtotal', 'quantity'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getSubtotal()
    {
        return $this->attributes['subtotal'];
    }

    public function setSubtotal($subtotal)
    {
        $this->attributes['subtotal'] = $subtotal;
    }

    public function getQuantity()
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity($quantity)
    {
        $this->attributes['quantity'] = $quantity;
    }

    public function getBeer()
    {
        return $this->attributes['beer_id'];
    }

    public function setBeer($beer)
    {
        $this->attributes['beer_id'] = $beer;
    }

    public function getOrder()
    {
        return $this->attributes['order_id'];
    }

    public function setOrder($order)
    {
        $this->attributes['order_id'] = $order;
    }

    public function beer()
    {
        return $this->hasOne(User::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public static function validate(Request $request)
    {
        $request->validate([
            "subtotal" => "required|numeric|min:0|not_in:0",
            "quantity" => "required|numeric|min:0|not_in:0"
        ]);
    }
}
