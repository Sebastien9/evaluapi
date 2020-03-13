<?php
declare(strict_types=1);

namespace App\Domain\jobdating;

use JsonSerializable;

class job implements JsonSerializable
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string
     */
    private $jobname;

    /**
     * @var string
     */
    private $dayName;

    /**
     * @var string
     */
    private $cityName;

    
    /**
     * @var string
     */
    private $horaire;

    /**
     * @param int|null  $id
     * @param string    $jobname
     * @param string    $dayName
     * @param string    $cityName
     * @param string    $horaire
     */
    public function __construct(?int $id, string $jobname, string $dayName, string $cityName, string $horaire)
    {
        $this->id = $id;
        $this->jobname = strtolower($jobname);
        $this->dayName = ucday($dayName);
        $this->cityName = ucday($cityName);
        $this->horaire = ucday($horaire);

    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getjobname(): string
    {
        return $this->jobname;
    }

    /**
     * @return string
     */
    public function getdayName(): string
    {
        return $this->dayName;
    }

    /**
     * @return string
     */
    public function getcityName(): string
    {
        return $this->cityName;
    }

    /**
     * @return string
     */
    public function gethoraire(): string
    {
        return $this->horaire;
    }

/**
 * @param array $datas
 * @return bool
 */
public function update(object $datas):bool
{
    $response = false;
    foreach ($datas as $k => $v){
        if(!empty($this->{$k}) && $this->{$k} !== $v){
            $this->{$k} = $v;
            $response = true;
        }
    }
    return $response;
}


