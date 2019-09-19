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

namespace MichielGerritsen\BirthdayVerify\Model;

use MichielGerritsen\BirthdayVerify\Service\AgeChecker;

class BirthdayManagementNew implements \MichielGerritsen\BirthdayVerify\Api\BirthdayManagementInterface
{
    /**
     * @var AgeChecker
     */
    private $ageChecker;

    public function __construct(
        AgeChecker $ageChecker
    ) {
        $this->ageChecker = $ageChecker;
    }

    /**
     * {@inheritdoc}
     */
    public function verify($day, $month, $year)
    {
        $age = $this->ageChecker->fromDate(new \DateTime($year . '-' . $month . '-' . $day));

        return $age >= 18;
    }
}
