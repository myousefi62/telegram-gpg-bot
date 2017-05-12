<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PublicKey
 *
 * @package App\Model
 * @author Ivan Klymenchenko <iillexial@gmail.com>
 */
class PublicKey extends Model
{
    /**
     * @var string
     */
    protected $table = 'public_keys';

    /**
     * @var array
     */
    public $fillable = ['user_id', 'public_key'];
}