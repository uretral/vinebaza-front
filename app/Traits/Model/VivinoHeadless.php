<?php
namespace App\Traits\Model;

trait VivinoHeadless
{
    public $connection = 'vivino';
    public $guarded = [];
    public $incrementing = false;
}
