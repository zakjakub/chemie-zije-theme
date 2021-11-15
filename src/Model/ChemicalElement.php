<?php

namespace Zakjakub\ChemieZijeTheme\Model;

class ChemicalElement
{
    public int $protonNumber;
    public int $period;
    public int $periodicalGroup;
    public string $symbol;
    public string $nameCz;
    public string $nameEn;
    public string $nameLa;
    public string $relativeAtomicWeight;
    public string $electronConfiguration;
    public ?float $meltingPoint = null;
    public bool $sublimates;
    public ?float $boilingPoint = null;
    public ?float $density = null;
    public ?string $typicalOxidationStates = null;
    public ?float $electronegativity = null;
    public ?float $ionizationEnergy1 = null;
    public ?float $ionizationEnergy2 = null;
    public ?float $ionizationEnergy3 = null;
    public ?float $electronAffinity = null;

    public function __construct(
        int|string $proton_number,
        int|string $period,
        int|string $periodicalGroup,
        string $symbol,
        string $nameCz,
        string $nameEn,
        string $nameLa,
        string $relativeAtomicWeight,
        string $electronConfiguration,
        float|string|null $meltingPoint,
        bool|string|null $sublimates,
        float|string|null $boilingPoint,
        float|string|null $density,
        string|null $typicalOxidationStates,
        float|string|null $electronegativity,
        float|string|null $ionizationEnergy1,
        float|string|null $ionizationEnergy2,
        float|string|null $ionizationEnergy3,
        float|string|null $electronAffinity
    ) {
        $this->protonNumber = $proton_number;
        $this->period = $period;
        $this->periodicalGroup = $periodicalGroup;
        $this->symbol = $symbol;
        $this->nameCz = $nameCz;
        $this->nameEn = $nameEn;
        $this->nameLa = $nameLa;
        $this->relativeAtomicWeight = $relativeAtomicWeight;
        $this->electronConfiguration = $electronConfiguration;
        $this->meltingPoint = self::inputToFloat($meltingPoint);
        $this->sublimates = !empty($sublimates);
        $this->boilingPoint = self::inputToFloat($boilingPoint);
        $this->density = self::inputToFloat($density) ? null : (float)$density;
        $this->typicalOxidationStates = empty($typicalOxidationStates) ? null : $typicalOxidationStates;
        $this->electronegativity = self::inputToFloat($electronegativity);
        $this->ionizationEnergy1 = self::inputToFloat($ionizationEnergy1);
        $this->ionizationEnergy2 = self::inputToFloat($ionizationEnergy2);
        $this->ionizationEnergy3 = self::inputToFloat($ionizationEnergy3);
        $this->electronAffinity = self::inputToFloat($electronAffinity);
    }

    private static function inputToFloat(mixed $input): float|null
    {
        return empty($input) ? null : (float)str_replace(',', '.', $input);
    }

    final public static function fromRow(array $elementData, array $keys): self
    {
        return new ChemicalElement(
            $elementData[$keys['proton_number']] ?? null,
            $elementData[$keys['period']] ?? null,
            $elementData[$keys['periodical_group']] ?? null,
            $elementData[$keys['symbol']] ?? null,
            $elementData[$keys['name_cz']] ?? null,
            $elementData[$keys['name_en']] ?? null,
            $elementData[$keys['name_la']] ?? null,
            $elementData[$keys['relative_atomic_weight']] ?? null,
            $elementData[$keys['electron_configuration']] ?? null,
            $elementData[$keys['melting_point']] ?? null,
            $elementData[$keys['sublimates']] ?? null,
            $elementData[$keys['boiling_point']] ?? null,
            $elementData[$keys['density']] ?? null,
            $elementData[$keys['typical_oxidation_states']] ?? null,
            $elementData[$keys['electronegativity']] ?? null,
            $elementData[$keys['ionization_energy_1']] ?? null,
            $elementData[$keys['ionization_energy_2']] ?? null,
            $elementData[$keys['ionization_energy_3']] ?? null,
            $elementData[$keys['electron_affinity']] ?? null,
        );
    }
}
