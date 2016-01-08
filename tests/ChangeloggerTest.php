<?php

use Mockery as m;

class ChangeloggerTest extends \PHPUnit_Framework_Testcase
{

    public function testGivenAProjectNameShouldReturnAHistoryLog()
    {

        $expected = '[{"url":"23","sha":"6dcb09b5b57875f334f61aebed695e2e4193db5e"}]';

        $name = 'test';
   

        $m = m::mock('GGGithubGitCommits');
        $m->shouldReceive('listCommitsOnRepository')
            ->andReturn(json_decode($expected));
        $client = m::mock('\GitHubClient');
        $client->shouldReceive('setPage');
        $client->shouldReceive('setPageSize');
        $client->repos = new \StdClass();
        $client->repos->commits = $m; 

        $model = new Models\Commits($client);
        $controller = new Controllers\Projects($model);
        $response = $controller->changelog($name); 
        $this->assertEquals($expected, $response);
    
    }
}

