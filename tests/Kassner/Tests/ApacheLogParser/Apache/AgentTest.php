<?php

namespace Kassner\Tests\ApacheLogParser\Apache;

use Kassner\ApacheLogParser\ApacheLogParser;

class AgentTest extends \PHPUnit_Framework_TestCase
{

    public function testFormat()
    {
        $parser = new ApacheLogParser("%{User-agent}i");

        $entry = $parser->parse('Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.65 Safari/537.36');
        $this->assertEquals('Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.65 Safari/537.36', $entry->HeaderUseragent);

        $entry = $parser->parse('Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)');
        $this->assertEquals('Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', $entry->HeaderUseragent);
    }

}