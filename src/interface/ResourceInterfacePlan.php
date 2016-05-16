<?php

interface resourceInterfacePlan extends resourceInterface
{
    //TODO : move to resourceDelete interface
    public function deactivate($id);
}
?>