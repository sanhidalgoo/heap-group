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
     * $this->comment['comment'] - string - contains the review comment
     * $this->attributes['score'] - int - contains the review score
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
}
