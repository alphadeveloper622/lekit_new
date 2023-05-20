<?php

namespace App\Repositories\Interfaces\Admin;

interface WholesaleProductInterface
{
    public function store($request);

    public function update($request);

    public function wholesalePrices($id);

}
