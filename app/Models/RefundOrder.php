<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefundOrder extends Model
{
    use HasFactory;
    /**
     * REVIEW ATTRIBUTES
     * $this->attributes['id'] - int - contains the review primary key (id)
     * $this->comment['motive'] - string - contains the motive for the refund
     * $this->attributes['requestDate'] - datetime - contains the datetime the request mas made
     * $this->attributes['approvalDate'] - datetime - contains the datetime the request mas approved
     * $this->attributes['deliveryDate'] - datetime - contains the datetime refund was made
     * $this->attributes['state'] - string - contains the current state of the orrder
     */

    protected $fillable = ['motive', 'requestDate', 'approvalDate', 'deliveryDate', 'state'];

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
        return $this->attributes['requestDate'];
    }

    public function setRequestDate($requestDate)
    {
        $this->attributes['requestDate'] = $requestDate;
    }

    public function getApprovalDate()
    {
        return $this->attributes['approvalDate'];
    }

    public function setApprovalDate($approvalDate)
    {
        $this->attributes['approvalDate'] = $approvalDate;
    }

    public function getDeliveryDate()
    {
        return $this->attributes['deliveryDate'];
    }

    public function setDeliveryDate($deliveryDate)
    {
        $this->attributes['deliveryDate'] = $deliveryDate;
    }

    public function getState()
    {
        return $this->attributes['state'];
    }

    public function setState($state)
    {
        $this->attributes['state'] = $state;
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
