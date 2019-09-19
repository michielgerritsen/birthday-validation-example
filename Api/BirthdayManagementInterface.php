<?php
namespace MichielGerritsen\BirthdayVerify\Api;

interface BirthdayManagementInterface
{
    /**
     * POST for birthday api
     * @param string $day
     * @param string $month
     * @param string $year
     * @return bool
     */
    public function verify($day, $month, $year);
}
