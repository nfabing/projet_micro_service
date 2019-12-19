<?php


namespace App\Fidelity;


use Exception;

class Hydrate
{

    /**
     * @param array $donnees
     * @throws Exception
     */
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            } else {
                throw new Exception('Setter non existant');
            }
        }
    }


}