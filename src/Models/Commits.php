<?php

namespace Models;

class Commits
{
    private $client;
    private $owner = 'fclarat';
    
    public function __construct($client)
    {
        $this->client = $client;
    }

    public function getLatest($project)
    {
        $this->client->setPage(1);
        $this->client->setPageSize(10);
        $commits = $this->client->repos->commits
            ->listCommitsOnRepository($this->owner, $project);

        return $commits;
    }
}
