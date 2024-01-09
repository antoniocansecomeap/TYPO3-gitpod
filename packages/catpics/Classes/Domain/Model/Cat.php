<?php

declare(strict_types=1);

namespace Catpics\Catpics\Domain\Model;


/**
 * This file is part of the "Cat Pics" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2024
 */

/**
 * Cat
 */
class Cat extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * Internal ID of cat
     *
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $catId = null;

    /**
     * Image URL
     *
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $imageUrl = null;

    /**
     * Image width
     *
     * @var int
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $imageWidth = null;

    /**
     * Image Height
     *
     * @var int
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $imageHeight = null;

    /**
     * Returns the catId
     *
     * @return string
     */
    public function getCatId()
    {
        return $this->catId;
    }

    /**
     * Sets the catId
     *
     * @param string $catId
     * @return void
     */
    public function setCatId(string $catId)
    {
        $this->catId = $catId;
    }

    /**
     * Returns the imageUrl
     *
     * @return string
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * Sets the imageUrl
     *
     * @param string $imageUrl
     * @return void
     */
    public function setImageUrl(string $imageUrl)
    {
        $this->imageUrl = $imageUrl;
    }

    /**
     * Returns the imageWidth
     *
     * @return int
     */
    public function getImageWidth()
    {
        return $this->imageWidth;
    }

    /**
     * Sets the imageWidth
     *
     * @param int $imageWidth
     * @return void
     */
    public function setImageWidth(int $imageWidth)
    {
        $this->imageWidth = $imageWidth;
    }

    /**
     * Returns the imageHeight
     *
     * @return int
     */
    public function getImageHeight()
    {
        return $this->imageHeight;
    }

    /**
     * Sets the imageHeight
     *
     * @param int $imageHeight
     * @return void
     */
    public function setImageHeight(int $imageHeight)
    {
        $this->imageHeight = $imageHeight;
    }
}
