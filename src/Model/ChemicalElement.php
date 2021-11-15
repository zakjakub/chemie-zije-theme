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
    public ?string $color = null;
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
        string|null $color = null,
        float|string|null $meltingPoint = null,
        bool|string|null $sublimates = null,
        float|string|null $boilingPoint = null,
        float|string|null $density = null,
        string|null $typicalOxidationStates = null,
        float|string|null $electronegativity = null,
        float|string|null $ionizationEnergy1 = null,
        float|string|null $ionizationEnergy2 = null,
        float|string|null $ionizationEnergy3 = null,
        float|string|null $electronAffinity = null
    ) {
        $this->protonNumber = (int)self::cleanString($proton_number);
        $this->period = (int)self::cleanString($period);
        $this->periodicalGroup = (int)self::cleanString($periodicalGroup);
        $this->symbol = self::cleanString($symbol);
        $this->nameCz = self::cleanString($nameCz);
        $this->nameEn = self::cleanString($nameEn);
        $this->nameLa = self::cleanString($nameLa);
        $this->relativeAtomicWeight = self::cleanString($relativeAtomicWeight);
        $this->electronConfiguration = self::cleanString($electronConfiguration);
        $this->color = self::cleanString($color);
        $this->meltingPoint = self::inputToFloat(self::cleanString($meltingPoint));
        $this->sublimates = !empty(self::cleanString($sublimates));
        $this->boilingPoint = self::inputToFloat(self::cleanString($boilingPoint));
        $this->density = self::inputToFloat(self::cleanString($density));
        $this->typicalOxidationStates = self::cleanString($typicalOxidationStates);
        $this->electronegativity = self::inputToFloat(self::cleanString($electronegativity));
        $this->ionizationEnergy1 = self::inputToFloat(self::cleanString($ionizationEnergy1));
        $this->ionizationEnergy2 = self::inputToFloat(self::cleanString($ionizationEnergy2));
        $this->ionizationEnergy3 = self::inputToFloat(self::cleanString($ionizationEnergy3));
        $this->electronAffinity = self::inputToFloat(self::cleanString($electronAffinity));
    }

    private static function cleanString(mixed $columnContent = null): string|null
    {
        return empty($columnContent = trim($columnContent)) ? null : (string)$columnContent;
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
            $elementData[$keys['color']] ?? null,
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
