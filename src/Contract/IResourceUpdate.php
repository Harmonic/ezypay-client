<?php

namespace Ezypay\Contract;

interface IResourceUpdate
{
    public function update($id, array $data);
}