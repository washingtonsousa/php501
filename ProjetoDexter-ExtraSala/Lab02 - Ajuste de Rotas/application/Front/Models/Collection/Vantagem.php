<?php

namespace DexterApp\Front\Models\Collection;

/**
 * Coleção de vantagens
 */
class Vantagem extends \FilterIterator
{

    private $showHome;

    public function __construct(\Iterator $iterator, $showHome = false)
    {
        $this->showHome = $showHome;

        parent::__construct($iterator);
    }

    public function accept()
    {
        $vantagem = $this->getInnerIterator()->current();

        if ($this->showHome === true) {
            if ($vantagem->getShowHome() === false) {
                return false;
            }
        } else {
            if ($vantagem->getShowHome() === true) {
                return false;
            }
        }

        return true;
    }
}
