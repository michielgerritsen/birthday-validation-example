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
use MichielGerritsen\BirthdayVerify\Model\BirthdayManagementNew;
use PHPUnit\Framework\TestCase;

class BirthdayManagementNewTest extends TestCase
{
    public function testVerify()
    {
        $ob = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);

        $ageCheckerMock = $this->createMock(\MichielGerritsen\BirthdayVerify\Service\AgeChecker::class);
        $ageCheckerMock->method('fromDate')->willReturn(18);

        /** @var BirthdayManagement $instance */
        $instance = $ob->getObject(BirthdayManagementNew::class, [
            'ageChecker' => $ageCheckerMock,
        ]);

        $date = new \DateTime('now');
        $date->sub(new \DateInterval('P18Y'));

        $result = $instance->verify(
            'asdf',
            'asdf',
            'asfd'
        );

        $this->assertTrue($result);
    }

    public function testVerifyTheDayBefore()
    {
        $ob = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);

        /** @var BirthdayManagement $instance */
        $instance = $ob->getObject(BirthdayManagement::class);

        $date = new \DateTime('now');
        $date->sub(new \DateInterval('P18Y'));
        $date->add(new \DateInterval('P1D'));

        $result = $instance->verify(
            $date->format('d'),
            $date->format('m'),
            $date->format('y')
        );

        $this->assertFalse($result);
    }
}
