<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CrimeType;
use App\Models\EmergencyType;
use App\Models\News;
use Database\Factories\NewsFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(20)->create();

        // News Factory
        News::factory(5)->create();
        // CrimeType::factory(2)->create();

        // Emergency types
        EmergencyType::create(
            [
            'name' => 'Road Traffic Anomalies',
            'description' => 'Road traffic anomaly detection is a very important aspect of intelligent traffic management system. Traffic anomaly may arise due to several reasons like unusual traffic incidents and malfunctioning of sensors deployed over the road network to capture traffic information.'
        ]);
        EmergencyType::create(
            [
            'name' => 'Accident',
            'description' => 'an unfortunate incident that happens unexpectedly and unintentionally, typically resulting in damage or injury.'
        ]);
        EmergencyType::create(
            [
            'name' => 'Fire / Explosion',
            'description' => 'Each year many people suffer burns caused by the uncontrolled ignition of the flammable chemicals and other materials they work with. Devastating.'
        ]);
        EmergencyType::create(
            [
            'name' => 'Natural Disaster',
            'description' => 'A natural disaster is "the negative impact following an actual occurrence of natural hazard in the event that it significantly harms a community'
        ]);


        // Crime Types
        CrimeType::create(
            [
            'name' => 'Murder or manslaughter',
            'description' => 'Bereavement is a painful experience for anyone, but when you lose someone because of the violent actions of another person – through murder or manslaughter – it can be particularly devastating.'
        ]);
        CrimeType::create(
            [
            'name' => 'Rape and sexual assault',
            'description' => 'Find out more about rape and sexual assault and how you can get help.'
        ]);
        CrimeType::create(
            [
            'name' => 'Robbery',
            'description' => 'A robbery is when someone takes something from you with violence or threats – usually (but not always) in the street or another public place.'
        ]);
        CrimeType::create(
            [
            'name' => 'Sexual harassment',
            'description' => 'Sexual harassment is any kind of unwanted behaviour of a sexual nature that makes you feel humiliated or intimidated, or that creates a hostile environment.'
        ]);
        CrimeType::create(
            [
            'name' => 'Stalking',
            'description' => 'Stalking is persistent and unwanted attention that makes you feel pestered and harassed.'
        ]);
        CrimeType::create(
            [
            'name' => 'Terrorism',
            'description' => 'Terrorist attacks are sudden and unpredictable and generally calculated to create a climate of fear or terror among the public. A terror attack can lead to an ongoing feeling of insecurity.'
        ]);
        CrimeType::create(
            [
            'name' => 'Violent crime',
            'description' => 'A violent crime is when someone physically hurts or threatens to hurt someone, and also includes crimes where a weapon is used.'
        ]);
        CrimeType::create(
            [
            'name' => 'Antisocial behaviour',
            'description' => "Antisocial behaviour is when you feel intimidated or distressed by a person's behaviour towards you."
        ]);
        CrimeType::create(
            [
            'name' => 'Arson',
            'description' => "Arson is when someone deliberately sets fire to someone else's property to damage it or to injure people."
        ]);
        CrimeType::create(
            [
            'name' => 'Burglary',
            'description' => 'A burglary is when someone breaks into a building with the intention of stealing, hurting someone or committing unlawful damage.'
        ]);
        CrimeType::create(
            [
            'name' => 'Childhood abuse',
            'description' => 'Child abuse can happen in different ways, and can include neglect as well as physical, emotional and sexual abuse.'
        ]);
        CrimeType::create(
            [
            'name' => 'kidnapping',
            'description' => 'Kidnapping is a serious crime that is prohibited by both federal and state laws. It is commonly defined as the taking of a person against his or her will, or restricting that person to a confined space.'
        ]);
        CrimeType::create(
            [
            'name' => 'Crime abroad',
            'description' => 'Crime abroad covers any criminal offence that happens to you while outside England and Wales. This page also includes information about crime on cruise ships.'
        ]);
        CrimeType::create(
            [
            'name' => 'Domestic abuse',
            'description' => 'Domestic abuse describes negative behaviours that one person exhibits over another within families or relationships.'
        ]);
        CrimeType::create(
            [
            'name' => 'Modern slavery',
            'description' => 'Modern slavery is a serious and often hidden crime. It comprises slavery, servitude, forced and compulsory labour and human trafficking, which is the harbouring and transportation of individuals for exploitation.'
        ]);
        CrimeType::create(
            [
            'name' => 'Assault and Battery',
            'description' => 'ssault and battery are two violent crimes that involve threatening harm or causing actual harm to another person.'
        ]);
       
    }
}