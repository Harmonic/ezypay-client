<?php

namespace Ezypay\Contract;

interface IResourceCustomer extends IResource
{
    public function findByReferenceId($id);
}