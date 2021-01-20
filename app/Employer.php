<?php

declare(strict_types=1);

namespace App;

use App\JobCandidate;
use App\Storage;
use App\FileStorage;

class Employer    
{
    public function saveCandidateInfo() : void
    {
        $jobCandidate = new JobCandidate();

        if ( $jobCandidate->isExperienced() ) {
            $storage = new Storage;            
        } else {
            $storage = new FileStorage();
        }

        $storage->insert( $jobCandidate->getName() );
    }
}
