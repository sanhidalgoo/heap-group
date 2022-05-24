<?php

// Authors: Santiago Hidalgo, David Calle

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class OrderItem extends Model
{
    use HasFactory;
    /**
     * ORDER_ITEM ATTRIBUTES
     * $this->attributes['id'] - int - contains the review primary key (id)
     * $this->attributes['subtotal'] - float - contains subtotalprice of the item
     * $this->attributes['quantity'] - int - contains the quantity of the item
     * $this->attributes['beer_id'] - int - id of beer item
     * $this->attributes['order_id']- int - id of the order to which belongs the item
     * $this->attributes['created_at'] - Date - Date of creation
     * $this->attributes['updated_at'] - Date - Date of update
     *
     *  ORDER_ITEM RELATIONSHIPS
     *  beer - Beer - Beer of the Order Item
     *  order - Order - OrderItem belongs to a specific Order
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

    public function getBeerId()
    {
        return $this->attributes['beer_id'];
    }

    public function setBeerId($beerId)
    {
        $this->attributes['beer_id'] = $beerId;
    }

    public function getOrderId()
    {
        return $this->attributes['order_id'];
    }

    public function setOrderId($orderId)
    {
        $this->attributes['order_id'] = $orderId;
    }

    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
    }

    /*gets the beer related to the order item*/
    public function beer()
    {
        return $this->hasOne(Beer::class, 'id', 'beer_id');
    }

    /*gets the order related to the order item*/
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /*validates the values required for the creation of a new order item*/
    public static function validate(Request $request)
    {
        $request->validate([
            "subtotal" => "required|numeric|min:0|not_in:0",
            "quantity" => "required|numeric|min:0|not_in:0"
        ]);
    }
}
