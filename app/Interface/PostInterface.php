<?php

namespace App\Interface;

interface PostInterface
{
    public function index();

    public function indexAPI();

    public function create();

    public function storeUser($request);

    public function show($id);

    public function edit($id);

    public function updateUser($id, $request);

    public function destroyUser($id);
}
