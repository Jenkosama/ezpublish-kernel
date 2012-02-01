<?php
namespace eZ\Publish\API\Repository\Values\Content\Query\Criterion;
use eZ\Publish\API\Repository\Values\Content\Query\Criterion;

/**
 * A NOT logical criterion
 *
 */
class LogicalNot extends LogicalOperator
{
    /**
     * Creates a new NOT logic criterion.
     *
     * Will match of the given criterion doesn't match
     *
     * @param array(Criterion) $criteria One criterion, as a an array
     *
     * @throws InvalidArgumentException if more than one criterion is given in the array parameter
     */
    public function __construct( Criterion $criterion )
    {
        parent::__construct( array( $criterion ) );
    }
}
