<?php

// Authors: Santiago Hidalgo, David Calle


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
     * $this->attributes['order_state'] - string - contains the order state. Initially the order state is pending
     * $this->attributes['payment_method'] - string - contains the payment method for the order
     * $this->attributes['department'] - string - department of the destination
     * $this->attributes['city'] - string - city of the destination
     * $this->attributes['address'] - string - address of the destination
     * $this->attributes['created_at'] - Date - Date of creation
     * $this->attributes['updated_at'] - Date - Date of update
     */

    protected $fillable = ['total', 'order_state', 'payment_method', 'department', 'city', 'address'];

    public static $STATES = ['PENDING' => 'PENDING', 'CANCELLED' => 'CANCELLED', 'SHIPPED' => 'SHIPPED', 'DELIVERED' => 'DELIVERED', 'MISSING' => 'MISSING'];

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
        return $this->attributes['order_state'];
    }

    public function setOrderState($orderState)
    {
        $this->attributes['order_state'] = $orderState;
    }

    public function getPaymentMethod()
    {
        return $this->attributes['payment_method'];
    }

    public function setPaymentMethod($paymentMethod)
    {
        $this->attributes['payment_method'] = $paymentMethod;
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

    public function getUserId()
    {
        return $this->attributes['user_id'];
    }

    public function setUserId($userId)
    {
        $this->attributes['user_id'] = $userId;
    }

    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
    }

    public static function validate(Request $request)
    {
        $request->validate([
            "paymentMethod" => "required|in:CREDIT_CARD,CASH,PSE",
            "department" => "required",
            "city" => "required",
            "address" => "required"
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function refundOrder()
    {
        return $this->hasOne(RefundOrder::class);
    }
}
