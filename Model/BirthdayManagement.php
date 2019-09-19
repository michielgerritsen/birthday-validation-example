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

use MichielGerritsen\BirthdayVerify\Config;

class BirthdayManagement implements \MichielGerritsen\BirthdayVerify\Api\BirthdayManagementInterface
{
    /**
     * @var Config
     */
    private $config;

    public function __construct(
        Config $config
    ) {
        $this->config = $config;
    }

    /**
     * {@inheritdoc}
     */
    public function verify($day, $month, $year)
    {
        $minimumAge = $this->config->getMinimumAge();

        $date1 = new \DateTime('now');
        $date2 = new \DateTime($year . '-' . $month . '-' . $day);

        $diff = $date1->diff($date2);

        return $diff->y >= $minimumAge;
    }
}
