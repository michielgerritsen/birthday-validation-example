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

use MichielGerritsen\BirthdayVerify\Config;
use MichielGerritsen\BirthdayVerify\Model\BirthdayManagement;
use PHPUnit\Framework\TestCase;

class BirthdayManagementNewTest extends TestCase
{
    /**
     * @magentoConfigFixture current_store catalog/birthday/minimum_age 19
     */
    public function testVerify()
    {
        $ob = \Magento\TestFramework\ObjectManager::getInstance();

        /** @var BirthdayManagement $instance */
        $instance = $ob->create(BirthdayManagement::class);

        $date = new \DateTime('now');
        $date->sub(new \DateInterval('P19Y'));

        $result = $instance->verify(
            $date->format('d'),
            $date->format('m'),
            $date->format('y')
        );

        $this->assertTrue($result);
    }
}
