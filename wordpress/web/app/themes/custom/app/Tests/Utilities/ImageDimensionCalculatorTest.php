<?php

use App\Utilities\ImageDimensionCalculator;
use WP_Mock\Tools\TestCase;

class ImageDimensionCalculatorTest extends TestCase
{
    public function setUp(): void
    {
        \WP_Mock::setUp();
    }

    public function tearDown(): void
    {
        \WP_Mock::tearDown();
    }

    public function testContructor() {
        $calculator = new ImageDimensionCalculator([1600, 1200, 800, 400]);

        $this->assertEquals([1600, 1200, 800, 400], $calculator->dimensionWidths);
    }

    public function testAspectRatio() {
        $designWidth = 800;
        $designHeight = 560;

        $aspectRatio = ImageDimensionCalculator::getRatioUnit($designWidth, $designHeight);
        $this->assertEquals(800/560, $aspectRatio);

    }

    public function testNewDimensionsFromAspectRatio() {
        $designWidth = 800;
        $designHeight = 560;

        $calculator = new ImageDimensionCalculator([1600, 1200, 800, 400]);
        $aspectRatio = ImageDimensionCalculator::getRatioUnit($designWidth, $designHeight);
        $newDimensions = $calculator->getDimensionsForAspectRatio($aspectRatio);

        $expectedDimensions = [
            [
                'width' => 1600,
                'height' => 1120
            ],
            [
                'width' => 1200,
                'height' => 840
            ],
            [
                'width' => 800,
                'height' => 560
            ],
            [
                'width' => 400,
                'height' => 280
            ],
        ];

        $this->assertEquals($expectedDimensions, $newDimensions);

    }
}
