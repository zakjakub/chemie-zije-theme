<?php

namespace Zakjakub\ChemieZijeTheme\Model;

class ChemicalElement
{

    public int $proton_number;
    public string $symbol;
    public string $nameCz;
    public string $nameEn;
    public string $nameLa;
    public string $relativeAtomicWeight;
    public string $electronConfiguration;
    public float $meltingPoint;
    public bool $sublimates;
    public float $boilingPoint;
    public float $density;
    public string $typicalOxidationStates;
    public float $electronegativity;
    public float $ionizationEnergy1;
    public float $ionizationEnergy2;
    public float $ionizationEnergy3;
    public float $electronAffinity;

    public function __construct(
        int $proton_number,
        string $symbol,
        string $nameCz,
        string $nameEn,
        string $nameLa,
        string $relativeAtomicWeight,
        string $electronConfiguration,
        float $meltingPoint,
        bool $sublimates,
        float $boilingPoint,
        float $density,
        string $typicalOxidationStates,
        float $electronegativity,
        float $ionizationEnergy1,
        float $ionizationEnergy2,
        float $ionizationEnergy3,
        float $electronAffinity
    ) {
        $this->proton_number = $proton_number;
        $this->symbol = $symbol;
        $this->nameCz = $nameCz;
        $this->nameEn = $nameEn;
        $this->nameLa = $nameLa;
        $this->relativeAtomicWeight = $relativeAtomicWeight;
        $this->electronConfiguration = $electronConfiguration;
        $this->meltingPoint = $meltingPoint;
        $this->sublimates = $sublimates;
        $this->boilingPoint = $boilingPoint;
        $this->density = $density;
        $this->typicalOxidationStates = $typicalOxidationStates;
        $this->electronegativity = $electronegativity;
        $this->ionizationEnergy1 = $ionizationEnergy1;
        $this->ionizationEnergy2 = $ionizationEnergy2;
        $this->ionizationEnergy3 = $ionizationEnergy3;
        $this->electronAffinity = $electronAffinity;
    }

}