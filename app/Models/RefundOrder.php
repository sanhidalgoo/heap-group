<?php

// Authors: David Calle

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefundOrder extends Model
{
    use HasFactory;
    /**
     * REFUND_ORDER ATTRIBUTES
     * $this->attributes['id'] - int - contains the review primary key (id)
     * $this->comment['motive'] - string - contains the motive for the refund
     * $this->attributes['requestDate'] - datetime - contains the datetime the request mas made
     * $this->attributes['approvalDate'] - datetime - contains the datetime the request mas approved
     * $this->attributes['deliveryDate'] - datetime - contains the datetime refund was made
     * $this->attributes['state'] - string - contains the current state of the orrder
     *
     * REFUND_ORDER RELATIONSHIPS
     * order - Order - RefundOrder is associated with a specific order
     */

    protected $fillable = ['motive', 'request_date', 'approval_date', 'delivery_date', 'state'];

    public static $STATES = ['PENDING' => 'Pending', 'CANCELLED' => 'Cancelled', 'SHIPPED' => 'Shipped', 'DELIVERED' => 'Delivered', 'MISSING' => 'Missing'];

    public function getMotive()
    {
        return $this->attributes['motive'];
    }

    public function setMotive($motive)
    {
        $this->attributes['motive'] = $motive;
    }

    public function getRequestDate()
    {
        return $this->attributes['request_date'];
    }

    public function setRequestDate($requestDate)
    {
        $this->attributes['request_date'] = $requestDate;
    }

    public function getApprovalDate()
    {
        return $this->attributes['approval_date'];
    }

    public function setApprovalDate($approvalDate)
    {
        $this->attributes['approval_date'] = $approvalDate;
    }

    public function getDeliveryDate()
    {
        return $this->attributes['delivery_date'];
    }

    public function setDeliveryDate($deliveryDate)
    {
        $this->attributes['delivery_date'] = $deliveryDate;
    }

    public function getState()
    {
        return $this->attributes['state'];
    }

    public function setState($state)
    {
        $this->attributes['state'] = $state;
    }

    public function setOrderId($orderId)
    {
        $this->attributes['order_id'] = $orderId;
    }

    public function getOrderId()
    {
        return $this->attributes['order_id'];
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
