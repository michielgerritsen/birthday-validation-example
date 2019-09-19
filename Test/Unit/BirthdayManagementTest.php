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

namespace MichielGerritsen\BirthdayVerify\Test\Unit;

use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use MichielGerritsen\BirthdayVerify\Model\BirthdayManagement;
use PHPUnit\Framework\TestCase;

class BirthdayManagementTest extends TestCase
{
    public function testVerify()
    {
        $ob = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);

        /** @var BirthdayManagement $instance */
        $instance = $ob->getObject(BirthdayManagement::class);

        $result = $instance->verify('19', '09', '2019');

        $this->assertFalse($result);
    }
}
