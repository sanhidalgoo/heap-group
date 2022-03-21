<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Order extends Model
{
    use HasFactory;

    /**
     * ORDER ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['total'] - float - total bill of the order
     * $this->attributes['orderState'] - string - contains the order state. Initially the order state is pendind
     * $this->attributes['paymentMethod'] - string - contains the payment method for the order
     * $this->attributes['department'] - string - department of the destination
     * $this->attributes['city'] - string - city of the destination
     * $this->attributes['address'] - string - address of the destination
     */

    protected $fillable = ['total', 'orderState', 'paymentMethod', 'department', 'city', 'address'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getTotal()
    {
        return $this->attributes['total'];
    }

    public function setTotal($total)
    {
        $this->attributes['total'] = $total;
    }

    public function getOrderState()
    {
        return $this->attributes['orderState'];
    }

    public function setOrderState($orderState)
    {
        $this->attributes['orderState'] = $orderState;
    }

    public function getPaymentMethod()
    {
        return $this->attributes['paymentMethod'];
    }

    public function setPaymentMethod($paymentMethod)
    {
        $this->attributes['paymentMethod'] = $paymentMethod;
    }

    public function getDepartment()
    {
        return $this->attributes['department'];
    }

    public function setDepartment($department)
    {
        $this->attributes['department'] = $department;
    }

    public function getCity()
    {
        return $this->attributes['city'];
    }

    public function setCity($department)
    {
        $this->attributes['city'] = $department;
    }

    public function getAddress()
    {
        return $this->attributes['address'];
    }

    public function setAddress($address)
    {
        $this->attributes['address'] = $address;
    }

    public static function validate(Request $request)
    {
        $rules = [
            "total" => "required|numeric|min:0|not_in:0",
            "paymentMethod" => "required|in:CREDIT_CARD,CASH,PSE",
            "department" => "required",
            "city" => "required",
            "address" => "required"
        ];
        $request->validate($rules);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function refundOrder()
    {
        return $this->hasOne(RefundOrder::class);
    }
}
