<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

trait ApiResponser
{

    /**
     * Success Message
     * @param $data
     * @param $code
     */
    private function successResponse( $data, $code )
    {
        return response()->json( $data, $code );
    }

    /**
     * Error Message
     * @param $message
     * @param $code
     */
    protected function errorResponse( $message, $code )
    {
        return response()->json( ['error' => $message, 'code' => $code], $code );
    }

    /**
     * return All json data
     * @param Collection $collection
     * @param $code
     * @return mixed
     */
    protected function showAll( Collection $collection, $code = 200 )
    {
        return $this->successResponse( ['data' => $collection], $code );
    }

    /**
     * Return a single json data
     * @param Model $model
     * @param $code
     * @return mixed
     */
    protected function showOne( Model $model, $code = 200 )
    {
        return $this->successResponse( ['data' => $model], $code );
    }

}
