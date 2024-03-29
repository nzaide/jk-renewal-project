<?php

namespace App\Enums;

enum UniversityMajor: int
{
    case Accounting = 1;
    case Administrative = 2;
    case Advertising = 3;
    case Aeronautics = 4;
    case Agriculture = 5;
    case AircraftMaintenanceTechnology = 6;
    case Anatomy = 7;
    case Architecture = 8;
    case Arts = 9;
    case Astronomy = 10;
    case Auditing = 11;
    case Automotive = 12;
    case BankingAndFinance = 13;
    case Biology = 14;
    case Broadcasting = 15;
    case BusinessAdministrationAndManagement = 16;
    case Chemistry = 17;
    case Commerce = 18;
    case Communications = 19;
    case ComputerScience = 20;
    case ConstructionCostManagement = 21;
    case ConsularAndDiplomaticAffairs = 22;
    case Cosmetology = 23;
    case CreativeWriting = 24;
    case Criminology = 25;
    case CustomsAdministration = 26;
    case Dentistry = 27;
    case Design = 28;
    case Drafting = 29;
    case Economics = 30;
    case Education = 31;
    case Electronics = 32;
    case Engineering = 33;
    case EnglishMajor = 34;
    case Entrepreneurship = 35;
    case EuropeanOrAsianLanguages = 36;
    case Export = 37;
    case Fashion = 38;
    case Financial = 39;
    case FineArts = 40;
    case FoodTechnology = 41;
    case Geography = 42;
    case Geology = 43;
    case History = 44;
    case HotelStudies = 45;
    case HotelAndRestaurantManagement = 46;
    case HumanResource = 47;
    case IndustrialManagement = 48;
    case InformationTechnology = 49;
    case InfrastructureManagementSystem = 50;
    case InteriorDesign = 51;
    case InternationalStudies = 52;
    case Journalism = 53;
    case Law = 54;
    case LegalManagement = 55;
    case LibraryAndInformationScience = 56;
    case Linguistics = 57;
    case Literature = 58;
    case Logistics = 59;
    case Marine = 60;
    case MarketingManagement = 61;
    case MassCommunications = 62;
    case Mathematics = 63;
    case Mechanic = 64;
    case Mechanics = 65;
    case MedTech = 66;
    case Medicine = 67;
    case Military = 68;
    case ModernFrenchLetters = 69;
    case Multimedia = 70;
    case Music = 71;
    case NotCollegeGraduate = 72;
    case Nursing = 73;
    case NutritionFood = 74;
    case Pharmacy = 75;
    case Philosophy = 76;
    case PhysicalTherapy = 77;
    case Politics = 78;
    case Psychology = 79;
    case PublicRelations = 80;
    case Radiology = 81;
    case RealEstateManagement = 82;
    case Sciences = 83;
    case SocialWork = 84;
    case Sociology = 85;
    case Sports = 86;
    case StatisticsAndResearch = 87;
    case Taxation = 88;
    case Technician = 89;
    case Theology = 90;
    case Tourism = 91;
    case Trading = 92;

    /**
     * Converts the enum into its description
     *
     * @return mixed
     */
    public function text()
    {
        return match ($this) {
            self::Accounting => __('Accounting'),
            self::Administrative => __('Administrative'),
            self::Advertising => __('Advertising'),
            self::Aeronautics => __('Aeronautics'),
            self::Agriculture => __('Agriculture'),
            self::AircraftMaintenanceTechnology => __('Aircraft Maintenance Technology'),
            self::Anatomy => __('Anatomy'),
            self::Architecture => __('Architecture'),
            self::Arts => __('Arts'),
            self::Astronomy => __('Astronomy'),
            self::Auditing => __('Auditing'),
            self::Automotive => __('Automotive'),
            self::BankingAndFinance => __('Banking and Finance'),
            self::Biology => __('Biology'),
            self::Broadcasting => __('Broadcasting'),
            self::BusinessAdministrationAndManagement => __('Business Administration and Management'),
            self::Chemistry => __('Chemistry'),
            self::Commerce => __('Commerce'),
            self::Communications => __('Communications'),
            self::ComputerScience => __('Computer Science'),
            self::ConstructionCostManagement => __('Construction Cost Management'),
            self::ConsularAndDiplomaticAffairs => __('Consular and Diplomatic Affairs'),
            self::Cosmetology => __('Cosmetology'),
            self::CreativeWriting => __('Creative Writing'),
            self::Criminology => __('Criminology'),
            self::CustomsAdministration => __('Customs Administration'),
            self::Dentistry => __('Dentistry'),
            self::Design => __('Design'),
            self::Drafting => __('Drafting'),
            self::Economics => __('Economics'),
            self::Education => __('Education'),
            self::Electronics => __('Electronics'),
            self::Engineering => __('Engineering'),
            self::EnglishMajor => __('English Major'),
            self::Entrepreneurship => __('Entrepreneurship'),
            self::EuropeanOrAsianLanguages => __('European or Asian Languages'),
            self::Export => __('Export'),
            self::Fashion => __('Fashion'),
            self::Financial => __('Financial'),
            self::FineArts => __('Fine Arts'),
            self::FoodTechnology => __('Food Technology'),
            self::Geography => __('Geography'),
            self::Geology => __('Geology'),
            self::History => __('History'),
            self::HotelStudies => __('Hotel Studies'),
            self::HotelAndRestaurantManagement => __('Hotel and Restaurant Management'),
            self::HumanResource => __('Human Resource'),
            self::IndustrialManagement => __('Industrial Management'),
            self::InformationTechnology => __('Information Technology'),
            self::InfrastructureManagementSystem => __('Infrastructure Management System'),
            self::InteriorDesign => __('Interior Design'),
            self::InternationalStudies => __('International Studies'),
            self::Journalism => __('Journalism'),
            self::Law => __('Law'),
            self::LegalManagement => __('Legal Management'),
            self::LibraryAndInformationScience => __('Library and Information Science'),
            self::Linguistics => __('Linguistics'),
            self::Literature => __('Literature'),
            self::Logistics => __('Logistics'),
            self::Marine => __('Marine'),
            self::MarketingManagement => __('Marketing Management'),
            self::MassCommunications => __('Mass Communications'),
            self::Mathematics => __('Mathematics'),
            self::Mechanic => __('Mechanic'),
            self::Mechanics => __('Mechanics'),
            self::MedTech => __('Med Tech'),
            self::Medicine => __('Medicine'),
            self::Military => __('Military'),
            self::ModernFrenchLetters => __('Modern French Letters'),
            self::Multimedia => __('Multimedia'),
            self::Music => __('Music'),
            self::NotCollegeGraduate => __('Not College Graduate'),
            self::Nursing => __('Nursing'),
            self::NutritionFood => __('Nutrition Food'),
            self::Pharmacy => __('Pharmacy'),
            self::Philosophy => __('Philosophy'),
            self::PhysicalTherapy => __('PhysicalTherapy'),
            self::Politics => __('Politics'),
            self::Psychology => __('Psychology'),
            self::PublicRelations => __('Public Relations'),
            self::Radiology => __('Radiology'),
            self::RealEstateManagement => __('Real Estate Management'),
            self::Sciences => __('Sciences'),
            self::SocialWork => __('Social Work'),
            self::Sociology => __('Sociology'),
            self::Sports => __('Sports'),
            self::StatisticsAndResearch => __('Statistics and Research'),
            self::Taxation => __('Taxation'),
            self::Technician => __('Technician'),
            self::Theology => __('Theology'),
            self::Tourism => __('Tourism'),
            self::Trading => __('Trading'),
        };
    }
}
