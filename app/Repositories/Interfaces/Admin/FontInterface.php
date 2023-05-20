<?php

namespace App\Repositories\Interfaces\Admin;

interface FontInterface{

    public function paginate();

    public function get($id);

    public function store($request);

    public function update($request);

    public function statusChange($request);

    public function delete($id);
}
