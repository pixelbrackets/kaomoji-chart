<?php

use Pixelbrackets\KaomojiChart\KaomojiChart;
use PHPUnit\Framework\TestCase;

class KaomojiChartTest extends TestCase
{
    public function testChartsAreNotEmpty()
    {
        $this->assertNotEmpty(KaomojiChart::getKaomojis());
        $this->assertIsArray(KaomojiChart::getKaomojis());

        $this->assertNotEmpty(KaomojiChart::getCategories());
        $this->assertIsArray(KaomojiChart::getCategories());

        $this->assertIsArray(KaomojiChart::getKaomojisGroupedByCategory());
    }

    public function testGetKaomoji()
    {
        $this->assertEmpty(KaomojiChart::getKaomoji());
        $this->assertNotEmpty(KaomojiChart::getKaomoji('banzai'));
        $this->assertEmpty(KaomojiChart::getKaomoji('does-not-exist-1337'));
        $this->assertContains('¯\_(ツ)_/¯', KaomojiChart::getKaomoji('shrug'));
    }
}
