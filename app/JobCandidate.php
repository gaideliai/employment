<?php

declare(strict_types=1);

namespace App;

class JobCandidate    
{
    private bool $experience;
    private string $name;

    public function isExperienced() : bool
    {
        // $this->experience = $_POST['experience'];
        return $this->experience;
    }

    public function getName() : string
    {
        // $this->name = $_POST['name'];
        return $this->name;
    }
}
