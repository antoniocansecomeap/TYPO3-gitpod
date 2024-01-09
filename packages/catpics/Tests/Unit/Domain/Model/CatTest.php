<?php

declare(strict_types=1);

namespace Catpics\Catpics\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 */
class CatTest extends UnitTestCase
{
    /**
     * @var \Catpics\Catpics\Domain\Model\Cat|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Catpics\Catpics\Domain\Model\Cat::class,
            ['dummy']
        );
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getCatIdReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getCatId()
        );
    }

    /**
     * @test
     */
    public function setCatIdForStringSetsCatId(): void
    {
        $this->subject->setCatId('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('catId'));
    }

    /**
     * @test
     */
    public function getImageUrlReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getImageUrl()
        );
    }

    /**
     * @test
     */
    public function setImageUrlForStringSetsImageUrl(): void
    {
        $this->subject->setImageUrl('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('imageUrl'));
    }

    /**
     * @test
     */
    public function getImageWidthReturnsInitialValueForInt(): void
    {
        self::assertSame(
            0,
            $this->subject->getImageWidth()
        );
    }

    /**
     * @test
     */
    public function setImageWidthForIntSetsImageWidth(): void
    {
        $this->subject->setImageWidth(12);

        self::assertEquals(12, $this->subject->_get('imageWidth'));
    }

    /**
     * @test
     */
    public function getImageHeightReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getImageHeight()
        );
    }

    /**
     * @test
     */
    public function setImageHeightForStringSetsImageHeight(): void
    {
        $this->subject->setImageHeight('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('imageHeight'));
    }
}
