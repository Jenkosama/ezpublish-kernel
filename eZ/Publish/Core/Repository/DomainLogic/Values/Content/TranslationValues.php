<?php
/**
 * File containing the eZ\Publish\Core\Repository\DomainLogic\Values\Content\TranslationValues class.
 *
 * @copyright Copyright (C) 1999-2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace eZ\Publish\Core\Repository\DomainLogic\Values\Content;

use eZ\Publish\API\Repository\Values\Content\TranslationValues as APITranslationValues;

/**
 * This value object is used for adding a translation to a version
 *
 * @property-write FieldCollection $fields
 */
class TranslationValues extends APITranslationValues
{
    /**
     * @var FieldCollection
     */
    public $fields;

    /**
     * Adds a translated field to the field collection in the given language
     * This method is also be implemented by ArrayAccess so that
     * $fields[$fieldDefIdentifier] = $value is an equivalent call
     *
     * @param string $fieldDefIdentifier the identifier of the field definition
     * @param mixed $value Either a plain value which is understandable by the field type or an instance of a Value class provided by the field type
     */
    public function setField( $fieldDefIdentifier, $value )
    {
        // @todo: implement
    }
}
