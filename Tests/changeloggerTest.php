<?php
/**
 * Created by PhpStorm.
 * User: fclarat
 * Date: 08/01/16
 * Time: 12:32
 */

require_once dirname(__FILE__) . '/../changelogger.php';

class ChangeloggerTest extends PHPUnit_Framework_TestCase {

    function testCanCreateAChangelogger() {
        $changelogger = new Changelogger();
    }

    function testReturnLog() {
        $changelogger = new Changelogger();
        $changelogger->getLog();
    }

}