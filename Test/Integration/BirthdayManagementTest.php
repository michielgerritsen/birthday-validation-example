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

class BirthdayManagementTest extends TestCase
{
    public function verifyProvider()
    {
        $now = new \DateTimeImmutable('now');
        $eighteen = $now->sub(new \DateInterval('P18Y'));
        $nineteen = $now->sub(new \DateInterval('P19Y'));

        return [
            [$eighteen, 18],
            [$nineteen, 19],
        ];
    }

    /**
     * @dataProvider verifyProvider
     */
    public function testVerify($date, $minimumAge)
    {
        $ob = \Magento\TestFramework\ObjectManager::getInstance();

        $configMock = $this->createMock(Config::class);
        $configMock->method('getMinimumAge')->willReturn($minimumAge);

        /** @var BirthdayManagement $instance */
        $instance = $ob->create(BirthdayManagement::class);

        $result = $instance->verify(
            $date->format('d'),
            $date->format('m'),
            $date->format('y')
        );

        $this->assertTrue($result);
    }
}
