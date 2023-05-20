<?php

namespace App\Repositories\Interfaces\Admin;

interface StoreCategoryLanguageInterface
{
    public function get($id);

    public function getByLang($id, $request);

    public function all();

    public function paginate($limit);

    public function store($request);

    public function update($request);

}
