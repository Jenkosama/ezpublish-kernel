<?php
/**
 * File contains: ezp\Publish\PublicAPI\Tests\Service\SectionTest class
 *
 * @copyright Copyright (C) 1999-2012 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace ezp\Publish\PublicAPI\Tests\Service;
use ezp\Publish\PublicAPI\Tests\Service\Base as BaseServiceTest,
    ezp\PublicAPI\Values\Content\Section,
    ezp\PublicAPI\Values\Content\SectionCreateStruct,
    ezp\PublicAPI\Values\Content\SectionUpdateStruct,
    ezp\Base\Exception\NotFound;

/**
 * Test case for Section Service using InMemory storage class
 *
 */
class SectionTest extends BaseServiceTest
{
    /**
     * Test service function for creating sections
     * @covers \ezp\Publish\PublicAPI\Content\SectionService::create
     */
    public function testCreate()
    {
        //$this->repository->setCurrentUser( $this->repository->getUserService()->loadUser( 14 ) );
        $service = $this->repository->getSectionService();
        $struct = new SectionCreateStruct();
        $struct->identifier = 'test';
        $struct->name = 'Test';

        $newSection = $service->createSection( $struct );
        //self::assertEquals( $newSection->id, 2 );
        self::assertEquals( $newSection->identifier, $struct->identifier );
        self::assertEquals( $newSection->name, $struct->name );
    }

    /**
     * Test service function for creating sections
     * @covers \ezp\Publish\PublicAPI\Content\SectionService::create
     * @expectedException \ezp\Base\Exception\Forbidden
     */
    public function testCreateForbidden()
    {
        self::markTestSkipped( "@todo: Re add when permissions are re added" );
        $service = $this->repository->getSectionService();
        $struct = new SectionCreateStruct();
        $struct->identifier = 'test';
        $struct->name = 'Test';

        $newSection = $service->createSection( $struct );
    }

    /**
     * Test service function for loading sections
     * @covers \ezp\Publish\PublicAPI\Content\SectionService::load
     */
    public function testLoad()
    {
        //$this->repository->setCurrentUser( $this->repository->getUserService()->loadUser( 14 ) );
        $service = $this->repository->getSectionService();
        $section = $service->loadSection( 1 );
        self::assertEquals( 1, $section->id );
        self::assertEquals( 'standard', $section->identifier );
        self::assertEquals( 'Standard', $section->name );
    }

    /**
     * Test service function for loading sections
     *
     * @covers \ezp\Publish\PublicAPI\Content\SectionService::load
     * @expectedException \ezp\Base\Exception\NotFound
     */
    public function testLoadNotFound()
    {
        $service = $this->repository->getSectionService();
        $service->loadSection( 999 );
    }

    /**
     * Test service function for update sections
     * @covers \ezp\Publish\PublicAPI\Content\SectionService::update
     */
    public function testUpdate()
    {
        //$this->repository->setCurrentUser( $this->repository->getUserService()->loadUser( 14 ) );
        $service = $this->repository->getSectionService();
        $tempSection = $service->loadSection( 1 );
        $struct = new SectionUpdateStruct();
        $struct->identifier = 'test';
        $struct->name = 'Test';

        $service->updateSection( $tempSection, $struct );
        $section = $service->loadSection( 1 );
        self::assertEquals( $struct->identifier, $section->identifier );
        self::assertEquals( $struct->name, $section->name );
    }

    /**
     * Test service function for update sections
     *
     * @covers \ezp\Publish\PublicAPI\Content\SectionService::update
     * @expectedException \ezp\Base\Exception\Forbidden
     */
    public function testUpdateForbidden()
    {
        self::markTestSkipped( "@todo: Re add when permissions are re added" );
        $service = $this->repository->getSectionService();
        $section = $service->loadSection( 1 );
        $service->updateSection( $section, new SectionUpdateStruct() );
    }

    /**
     * Test service function for deleting sections
     *
     * @covers \ezp\Publish\PublicAPI\Content\SectionService::delete
     */
    public function testDelete()
    {
        //$this->repository->setCurrentUser( $this->repository->getUserService()->loadUser( 14 ) );
        $service = $this->repository->getSectionService();
        $struct = new SectionCreateStruct();
        $struct->identifier = 'test';
        $struct->name = 'Test';

        $newSection = $service->createSection( $struct );
        $service->deleteSection( $newSection );

        try
        {
            $service->loadSection( $newSection->id );
            self::fail( 'Section is still returned after being deleted' );
        }
        catch ( NotFound $e )
        {
        }
    }

    /**
     * Test service function for deleting sections
     *
     * @covers \ezp\Publish\PublicAPI\Content\SectionService::delete
     * @expectedException \ezp\Base\Exception\Forbidden
     */
    public function testDeleteForbidden()
    {
        self::markTestSkipped( "@todo: Re add when permissions are re added" );
        $service = $this->repository->getSectionService();
        $struct = new SectionCreateStruct();
        $struct->identifier = 'test';
        $struct->name = 'Test';

        $newSection = $service->createSection( $struct );
        $service->deleteSection( $newSection );
    }
}
