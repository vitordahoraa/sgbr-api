<?php

namespace App\Services\v1;

use Illuminate\Http\Request;

class LocalQuery{
    protected $fillable = [
        'name' => ['eq', 'ne'],
        'slug' => ['eq', 'ne'],
        'city' => ['eq', 'ne'],
        'state' => ['eq', 'ne'],
        'createdAt' => ['eq', 'ne','lt','gt', 'gte', 'lte'],
        'updatedAt' => ['eq', 'ne','lt','gt','gte', 'lte']
        
    ];

    protected $columnMap = [
        'createdAt' => 'created_at',
        'updatedAt' => 'updated_at',
    ];

    protected $operatorMap =[
        'eq' => '=',
        'ne' => '!=',
        'lt' => '<',
        'gt' => '>',
        'gte' => '>=',
        'lte' => '<=',
    ];

    public function transform(Request $request){
        $query=[];

        foreach($this->fillable as $parm => $operators){
            $tempQuery = $request->query($parm);
            
            
            if(!isset($tempQuery)){
                continue;
            }
            
            $column = $this->columnMap[$parm] ?? $parm;
            
            foreach($operators as $op){
                
                if(isset($tempQuery[$op])){
                    $query[]=[$column, $this->operatorMap[$op],$tempQuery[$op]];
                }
            }

        }
        
        return $query;
    }
}