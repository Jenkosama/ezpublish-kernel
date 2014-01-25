<?php
/**
 * PublishVersionSignal class
 *
 * @copyright Copyright (C) 1999-2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace eZ\Publish\Core\Repository\SignalSlot\Signal\ContentService;

use eZ\Publish\Core\Repository\SignalSlot\Signal;

/**
 * PublishVersionSignal class
 * @package eZ\Publish\Core\Repository\SignalSlot\Signal\ContentService
 */
class PublishVersionSignal extends Signal
{
    /**
     * Content ID
     *
     * @var mixed
     */
    public $contentId;

    /**
     * Version Number
     *
     * @var int
     */
    public $versionNo;
}
