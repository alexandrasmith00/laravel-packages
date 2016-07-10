<?php namespace LexiSmith\LaravelRefer;

use Illuminate\Support\Facades\Facade;

class ReferralFacade extends Facade
{
    protected static function getFacadeAccessor() { 
        return 'laravel-refer';
    }
}