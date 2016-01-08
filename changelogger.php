<?php

class Changelogger {

    const GIT_TITLE =  3;
    const GIT_DATE =  2;
    const GIT_AUTHOR =  1;
    const GIT_HASH =  0;
    const MAX_LOG =  100;

    public function getLog()
    {

        exec('git pull origin ');
        exec('git log --pretty=format:"%h | %an | %cd | %s" --date=short', $buffer);

    }


}


$chang = new Changelogger();

 $chang->getlog();