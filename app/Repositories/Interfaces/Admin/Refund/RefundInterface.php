<?php

namespace App\Repositories\Interfaces\Admin\Refund;

interface RefundInterface
{
    public function all();

    public function paginate($request,$limit,$refund_for);

    public function get($id);

    public function approvedRefund($id);

    public function payNow($id);

    public function rejectRefund($request);

     public function store($request);

}
