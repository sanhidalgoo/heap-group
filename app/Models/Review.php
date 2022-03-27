<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    /**
     * REVIEW ATTRIBUTES
     * $this->attributes['id'] - int - contains the review primary key (id)
     * $this->comment['comment'] - string - contains the review comment
     * $this->attributes['score'] - int - contains the review score
     * $this->attributes['created_at'] - Date - Date of creation
     * $this->attributes['updated_at'] - Date - Date of update
     */

    protected $fillable = ['comment', 'score'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getComment()
    {
        return $this->attributes['comment'];
    }

    public function setComment($comment)
    {
        $this->attributes['comment'] = $comment;
    }

    public function getScore()
    {
        return $this->attributes['score'];
    }

    public function setScore($score)
    {
        $this->attributes['score'] = $score;
    }

    public function getCreatedDate()
    {
        return $this->attributes['created_at'];
    }

    public function setCreatedDate($createdAt)
    {
        $this->attributes['created_at'] = $createdAt;
    }

    public function getUpdatedDate()
    {
        return $this->attributes['updated_at'];
    }

    public function setUpdatedDate($updatedAt)
    {
        $this->attributes['updated_at'] = $updatedAt;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
