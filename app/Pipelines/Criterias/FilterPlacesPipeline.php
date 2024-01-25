<?php

namespace App\Pipelines\Criterias;

use App\Pipelines\PipelineFactory;
use Illuminate\Http\Request;

class FilterPlacesPipeline extends PipelineFactory
{
    protected function apply($builder)
    {
        $keywword = request()->keyword;

        $builder = $builder->where('name', 'LIKE', "%$keywword%");
        
        return $builder;
    }
}
