<?php

namespace Controllers;

class Projects
{

    private $commit;

    public function __construct($commit)
    {
        $this->commit = $commit;
    }

    public function changelog($project)
    {
        $latest = $this->commit->getLatest($project);
        return json_encode($latest);
    }
}
