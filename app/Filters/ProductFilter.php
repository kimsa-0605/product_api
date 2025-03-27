<?php
namespace App\Filters;

use Illuminate\Http\Request;

class ProductFilter extends ApiFilter {
    protected $safeParams = [
        'name'=> ['ceq'], 
        'description'=> ['ceq'], 
        'unit_price'=> ['eq', 'gt', 'lt'], 
        'promotion_price'=> ['eq', 'gt', 'lt'] ,
        'new'=> ['eq']
    ];

    protected $columnMap = [
        'unitPrice'=> 'unit_price',
        'promotionPrice' => 'promotion_price'
    ];

    protected $operatorMap = [
        'ceq' => 'like',
        'eq' => '=',
        'gt' => '>=',
        'lt' => '<='
    ];
}