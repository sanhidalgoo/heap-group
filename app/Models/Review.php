<?php

// Authors: Santiago Hidalgo, David Calle

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
     *
     * REVIEW RELATIONSHIPS
     * user - User - user that makes the review
     * beer - Beer - review belongs to a specific beer
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

    public function getBeerId()
    {
        return $this->attributes['beer_id'];
    }

    public function setBeerId($beerId)
    {
        $this->attributes['beer_id'] = $beerId;
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

    /*gets the user the review belongs to */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*gets the beer related to the review*/
    public function beer()
    {
        return $this->belongsTo(Beer::class);
    }
}
