<?php

declare(strict_types=1);

namespace Catpics\Catpics\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use TYPO3Fluid\Fluid\View\ViewInterface;

/**
 * Test case
 */
class CatControllerTest extends UnitTestCase
{
    /**
     * @var \Catpics\Catpics\Controller\CatController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\Catpics\Catpics\Controller\CatController::class))
            ->onlyMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllCatsFromRepositoryAndAssignsThemToView(): void
    {
        $allCats = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $catRepository = $this->getMockBuilder(\Catpics\Catpics\Domain\Repository\CatRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $catRepository->expects(self::once())->method('findAll')->will(self::returnValue($allCats));
        $this->subject->_set('catRepository', $catRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('cats', $allCats);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }
}
