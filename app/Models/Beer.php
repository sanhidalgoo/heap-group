<?php

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

    public static function validate($request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|gte:0',
            'brand' => 'required|max:255',
            'origin' => 'required|max:255',
            'abv' => 'required|numeric|gte:0|lte:1',
            'ingredient' => 'required|max:255',
            'flavor' => 'required|max:255',
            'format' => 'required|max:255',
            'price' => 'required|numeric',
            'details' => '',
            'quantity_available' => 'required|numeric',
            'image_url' => 'required|max:2048',
        ]);
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function getBrand()
    {
        return $this->attributes['brand'];
    }

    public function getOrigin()
    {
        return $this->attributes['origin'];
    }

    public function getAbv()
    {
        return $this->attributes['abv'] * 100;
    }

    public function getIngredient()
    {
        return $this->attributes['ingredient'];
    }

    public function getFlavor()
    {
        return $this->attributes['flavor'];
    }

    public function getFormat()
    {
        return $this->attributes['format'];
    }

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function getDetails()
    {
        return $this->attributes['details'];
    }

    public function getQuantity()
    {
        return $this->attributes['quantity_available'];
    }

    public function getURL()
    {
        return $this->attributes['image_url'];
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->get();
    }
}
