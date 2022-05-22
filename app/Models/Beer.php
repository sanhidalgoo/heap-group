<?php

// Authors: Juan Sebastián Díaz, Santiago Hidalgo

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'beers';

    /**
     * BEER ATTRIBUTES
     * $this->attributes['id'] - int - contains the beer primary key (id)
     * $this->attributes['name'] - string - contains the beer name
     * $this->attributes['brand'] - string - contains the beer brand
     * $this->attributes['origin'] - string - contains the beer location origin
     * $this->attributes['abv'] - decimal - contains the Alcohol By Volume value (0 <= value < 1)
     * $this->attributes['ingredient'] - string - contains the ingredient name
     * $this->attributes['flavor'] - string - contains the flavor type
     * $this->attributes['format'] - string - contains the beer format (can, 250ml bottle, etc)
     * $this->attributes['price'] - decimal - contains the beer price
     * $this->attributes['details'] - string - contains details about beer
     * $this->attributes['quantity_available'] - int - contains available amount of this beer
     * $this->attributes['image_url'] - string - contains the beer image url
     * $this->attributes['created_at'] - Date - Date of creation
     * $this->attributes['updated_at'] - Date - Date of update
     *
     *  BEERS RELATIONSHIPS
     *  users - User - User that selected this beer
     *  reviews - Review - Reviews that this beer contains
     *
     */

    protected $fillable = [
        'name',
        'brand',
        'origin',
        'abv',
        'ingredient',
        'flavor',
        'format',
        'price',
        'details',
        'quantity_available',
        'image_url',
    ];

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function setBrand($brand)
    {
        $this->attributes['brand'] = $brand;
    }

    public function getBrand()
    {
        return $this->attributes['brand'];
    }

    public function setOrigin($origin)
    {
        $this->attributes['origin'] = $origin;
    }

    public function getOrigin()
    {
        return $this->attributes['origin'];
    }

    public function setAbv($abv)
    {
        $this->attributes['abv'] = $abv;
    }

    public function getAbv()
    {
        return $this->attributes['abv'];
    }

    public function getAbvPercentage()
    {
        return $this->attributes['abv'] * 100;
    }

    public function setIngredient($ingredient)
    {
        $this->attributes['ingredient'] = $ingredient;
    }

    public function getIngredient()
    {
        return $this->attributes['ingredient'];
    }

    public function setFlavor($flavor)
    {
        $this->attributes['flavor'] = $flavor;
    }

    public function getFlavor()
    {
        return $this->attributes['flavor'];
    }

    public function setFormat($format)
    {
        $this->attributes['format'] = $format;
    }

    public function getFormat()
    {
        return $this->attributes['format'];
    }


    public function setPrice($price)
    {
        $this->attributes['price'] = $price;
    }

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function setDetails($details)
    {
        $this->attributes['details'] = $details;
    }

    public function getDetails()
    {
        return $this->attributes['details'];
    }

    public function setQuantity($quantity)
    {
        $this->attributes['quantity_available'] = $quantity;
    }

    public function getQuantity()
    {
        return $this->attributes['quantity_available'];
    }

    public function setURL($url)
    {
        $this->attributes['image_url'] = $url;
    }

    public function getURL()
    {
        return $this->attributes['image_url'];
    }

    public function getRating()
    {
        $this->attributes['average_rate'] = number_format($this->reviews->avg('score'), 1);
        return $this->attributes['average_rate'];
    }

    public function orderItems()
    {
        return $this->belongsToMany(OrderItem::class);
    }

    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
    public function scopeFilter($query)
    {
        if (request('price_min')) {
            $query->where('price', '>=', request('price_min'));
        }
        if (request('price_max')) {
            $query->where('price', '<=', request('price_max'));
        }
        return $query;
    }
}
