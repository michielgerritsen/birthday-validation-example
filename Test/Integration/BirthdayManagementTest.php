<?php
/**
 *    ______            __             __
 *   / ____/___  ____  / /__________  / /
 *  / /   / __ \/ __ \/ __/ ___/ __ \/ /
 * / /___/ /_/ / / / / /_/ /  / /_/ / /
 * \______________/_/\__/_/   \____/_/
 *    /   |  / / /_
 *   / /| | / / __/
 *  / ___ |/ / /_
 * /_/ _|||_/\__/ __     __
 *    / __ \___  / /__  / /____
 *   / / / / _ \/ / _ \/ __/ _ \
 *  / /_/ /  __/ /  __/ /_/  __/
 * /_____/\___/_/\___/\__/\___/
 *
 */

namespace MichielGerritsen\BirthdayVerify\Test\Integration;

use MichielGerritsen\BirthdayVerify\Model\BirthdayManagement;
use PHPUnit\Framework\TestCase;

class BirthdayManagementTest extends TestCase
{
    public function testVerify()
    {
        $ob = \Magento\TestFramework\ObjectManager::getInstance();

        /** @var BirthdayManagement $instance */
        $instance = $ob->create(BirthdayManagement::class);

        $result = $instance->verify('19', '09', '2019');

        $this->assertTrue($result);
    }
}
