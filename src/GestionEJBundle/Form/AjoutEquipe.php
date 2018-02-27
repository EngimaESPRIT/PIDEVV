<?php

namespace GestionEJBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Tests\Extension\Core\Type\NumberTypeTest;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class AjoutEquipe extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')->add('capital',ChoiceType::class,array(
            'choices'=>array(
'Abu Dhabi'=>'Abu Dhabi' ,
'Abuja'=>'Abuja',
'Accra'=>'Accra',
'Adamstown'=>'Adamstown',
'Addis Ababa'=>'Addis Ababa',
'Algiers'=>'Algiers',
'Alofi'=>'Alofi',
'Amman'=>'Amman',
'Amsterdam'=>'Amsterdam',
'Andorra la Vella'=>'Andorra la Vella',
'Ankara'=>'Ankara',
'Antananarivo'=>'Antananarivo',
'Apia'=>'Apia',
'Ashgabat'=>'Ashgabat',
'Asmara'=>'Asmara',
'Astana'=>'Astana',
'Asunción'=>'Asunción',
'Athens'=>'Athens',
'Avarua'=>'Avarua',
'Baghdad'=>'Baghdad',
'Baku'=>'Baku',
'Bamako'=>'Bamako',
'Bandar Seri Begawan'=>'Bandar Seri Begawan',
'Bangkok'=>'Bangkok',
'Bangui'=>'Bangui',
'Banjul'=>'Banjul',
'Basseterre'=>'Basseterre',
'Beijing'=>'Beijing',
'Beirut'=>'Beirut',
'Belgrade'=>'Belgrade',
'Belmopan'=>'Belmopan',
'Berlin'=>'Berlin',
'Bern'=>'Bern',
'Bishkek'=>'Bishkek',
'Bissau'=>'Bissau',
'Bogotá'=>'Bogotá',
'Brasília'=>'Brasília',
'Bratislava'=>'Bratislava',
'Brazzaville'=>'Brazzaville',
'Bridgetown'=>'Bridgetown',
'Brussels'=>'Brussels',
'Bucharest'=>'Bucharest',
'Budapest'=>'Budapest',
'Buenos Aires'=>'Buenos Aires',
'Bujumbura'=>'Bujumbura',
'Cairo'=>'Cairo',
'Canberra'=>'Canberra',
'Caracas'=>'Caracas',
'Castries'=>'Castries',
'Cayenne'=>'Cayenne',
'Charlotte Amalie'=>'Charlotte Amalie',
'Chisinau'=>'Chisinau',
'Cockburn Town'=>'Cockburn Town',
'Conakry'=>'Conakry',
'Copenhagen'=>'Copenhagen',
'Dakar'=>'Dakar',
'Damascus'=>'Damascus',
'Dhaka'=>'Dhaka',
'Dili'=>'Dili',
'Djibouti'=>'Djibouti',
'Dodoma'=>'Dodoma',
'Dar es Salaam'=>'Dar es Salaam',
'Doha'=>'Doha',
'Douglas'=>'Douglas',
'Dublin'=>'Dublin',
'Dushanbe'=>'Dushanbe',
'Edinburgh of the Seven Seas'=>'Edinburgh of the Seven Seas',
'El Aaiún'=>'El Aaiún (declared)',
'Episkopi Cantonment'=>'Episkopi Cantonment',
'Flying Fish Cove'=>'Flying Fish Cove',
'Freetown'=>'Freetown',
'Funafuti'=>'Funafuti',
'Gaborone'=>'Gaborone',
'George Town'=>'George Town',
'Georgetown'=>'Georgetown',
'Gibraltar'=>'Gibraltar',
'Grytviken'=>'Grytviken',
'Guatemala City'=>'Guatemala City',
'Gustavia'=>'Gustavia',
'Hagåtña'=>'Hagåtña',
'Hamilton'=>'Hamilton',
'Hanga Roa'=>'Hanga Roa',
'Hanoi'=>'Hanoi',
'Harare'=>'Harare',
'Hargeisa'=>'Hargeisa',
'Havana'=>'Havana',
'Helsinki'=>'Helsinki',
'Honiara'=>'Honiara',
'Islamabad'=>'Islamabad',
'Jakarta'=>'Jakarta',
'Jamestown'=>'Jamestown',
'Jerusalem'=>'Jerusalem',
'Gaza'=>'Gaza',
'Juba'=>'Juba',
'Kabul'=>'Kabul',
'Kampala'=>'Kampala',
'Kathmandu'=>'Kathmandu',
'Khartoum'=>'Khartoum',
'Kiev'=>'Kiev',
'Kigali'=>'Kigali',
'Kingston'=>'Kingston',
'Kinshasa'=>'Kinshasa',
'Kuala Lumpur'=>'Kuala Lumpur',
'Putrajaya'=>'Putrajaya',
'Kuwait City'=>'Kuwait City',
'Libreville'=>'Libreville',
'Lilongwe'=>'Lilongwe',
'Lima'=>'Lima',
'Lisbon'=>'Lisbon',
'Ljubljana'=>'Ljubljana',
'Lomé'=>'Lomé',
'London'=>'London',
'Luanda'=>'Luanda',
'Lusaka'=>'Lusaka',
'Luxembourg'=>'Luxembourg',
'Madrid'=>'Madrid',
'Majuro'=>'Majuro',
'Malabo'=>'Malabo',
'Malé'=>'Malé',
'Managua'=>'Managua',
'Manama'=>'Manama',
'Manila'=>'Manila',
'Maputo'=>'Maputo',
'Marigot'=>'Marigot',
'Maseru'=>'Maseru',
'Mata-Utu'=>'Mata-Utu',
'Mbabane'=>'Mbabane',
'Lobamba'=>'Lobamba',
'Melekeok'=>'Melekeok',
'Ngerulmud'=>'Ngerulmud',
'Mexico City'=>'Mexico City',
'Minsk'=>'Minsk',
'Mogadishu'=>'Mogadishu',
'Monaco'=>'Monaco',
'Monrovia'=>'Monrovia',
'Montevideo'=>'Montevideo',
'Moroni'=>'Moroni',
'Moscow'=>'Moscow',
'Muscat'=>'Muscat',
'Nairobi'=>'Nairobi',
'Nassau'=>'Nassau',
'Naypyidaw'=>'Naypyidaw',
'NDjamena'=>'NDjamena',
'New Delhi'=>'New Delhi',
'Niamey'=>'Niamey',
'Nicosia'=>'Nicosia',
'Nouakchott'=>'Nouakchott',
'Nouméa'=>'Nouméa',
'Nukualofa'=>'Nukualofa',
'Nuuk'=>'Nuuk',
'Oranjestad'=>'Oranjestad',
'Oslo'=>'Oslo',
'Ottawa'=>'Ottawa',
'Ouagadougou'=>'Ouagadougou',
'Pago Pago'=>'Pago Pago',
'Palikir'=>'Palikir',
'Panama City'=>'Panama City',
'Papeete'=>'Papeete',
'Paramaribo'=>'Paramaribo',
'Paris'=>'Paris',
'Philipsburg'=>'Philipsburg',
'Phnom Penh'=>'Phnom Penh',
'Plymouth'=>'Plymouth',
'Brades Estate'=>'Brades Estate',
'Podgorica'=>'Podgorica',
'Cetinje'=>'Cetinje',
'Port Louis'=>'Port Louis',
'Port Moresby'=>'Port Moresby',
'Port Vila'=>'Port Vila',
'Port-au-Prince'=>'Port-au-Prince',
'Port of Spain'=>'Port of Spain',
'Porto-Novo'=>'Porto-Novo',
'Cotonou'=>'Cotonou',
'Prague'=>'Prague',
'Praia'=>'Praia',
'Pretoria '=>'Pretoria ',
'Bloemfontein '=>'Bloemfontein ',
'Cape Town'=>'Cape Town',
'Pristina'=>'Pristina',
'Pyongyang'=>'Pyongyang',
'Quito'=>'Quito',
'Rabat'=>'Rabat',
'Reykjavík'=>'Reykjavík',
'Riga'=>'Riga',
'Riyadh'=>'Riyadh',
'Road Town'=>'Road Town',
'Rome'=>'Rome',
'Roseau'=>'Roseau',
'Saipan'=>'Saipan',
'San José'=>'San José',
'San Juan'=>'San Juan',
'San Marino'=>'San Marino',
'San Salvador'=>'San Salvador',
'Sanaa'=>'Sanaa',
'Santiago'=>'Santiago',
'Valparaíso'=>'Valparaíso',
'Santo Domingo'=>'Santo Domingo',
'São Tomé'=>'São Tomé',
'Sarajevo'=>'Sarajevo',
'Seoul'=>'Seoul',
'Singapore'=>'Singapore',
'Skopje'=>'Skopje',
'Sofia'=>'Sofia',
'Sri Jayawardenepura Kotte'=>'Sri Jayawardenepura Kotte',
'Colombo'=>'Colombo',
'St. Georges'=>'St. Georges',
'StHelier'=>'StHelier',
'StJohns'=>'StJohns',
'St Peter Port'=>'St Peter Port',
'St. Pierre'=>'St. Pierre',
'Stanley'=>'Stanley',
'Stepanakert'=>'Stepanakert',
'Stockholm'=>'Stockholm',
'Sucre'=>'Sucre',
'La Paz'=>'La Paz',
'Sukhumi'=>'Sukhumi',
'Suva'=>'Suva',
'Taipei'=>'Taipei',
'Tallinn'=>'Tallinn',
'Tarawa'=>'Tarawa',
'Tashkent'=>'Tashkent',
'Tbilisi'=>'Tbilisi',
'Kutaisi'=>'Kutaisi',
'Tegucigalpa'=>'Tegucigalpa',
'Tehran'=>'Tehran',
'Thimphu'=>'Thimphu',
'Tirana'=>'Tirana',
'Tiraspol'=>'Tiraspol',
'Tokyo'=>'Tokyo',
'Tórshavn'=>'Tórshavn',
'Tripoli'=>'Tripoli',
'Tskhinvali'=>'Tskhinvali',
'Tunis'=>'Tunis',
'Ulan Bator'=>'Ulan Bator',
'Vaduz'=>'Vaduz',
'Valletta'=>'Valletta',
'The Valley'=>'The Valley',
'Vatican City'=>'Vatican City',
'Victoria'=>'Victoria',
'Vienna'=>'Vienna',
'Vientiane'=>'Vientiane',
'Vilnius'=>'Vilnius',
'Warsaw'=>'Warsaw',
'Washington, D.C.'=>'Washington, D.C.',
    'Wellington'=>  'Wellington',
'West Island'=>'West Island',
'Willemstad'=>'Willemstad',
'Windhoek'=>'Windhoek',
'Yamoussoukro'=>'Yamoussoukro',
'Abidjan '=>'Abidjan ',
'Yaoundé'=>'Yaoundé',
'Yaren'=>'Yaren',
'Yerevan'=>'Yerevan',
'Zagreb'=>'Zagreb',





            )
        ))
            ->add('participations',IntegerType::class,array('attr'=>array('min'=>0)))->add('continent',ChoiceType::class,array('choices'=>array(
                'Afrique'=>'Afrique',
                'Asie'=>'Asie',
                'Amerique du sud'=>'Amerique du sud',
                'Amerique du nord'=>'Amerique du nord',
                'Europe'=>'Europe',
                'Oceanie'=>'Oceanie',
            )))->add('victoires',IntegerType::class,array('attr'=>array('min'=>0)))->add('entraineur')->add('classementfifa',IntegerType::class,array('attr'=>array('min'=>0)))->add('butscm',IntegerType::class,array('attr'=>array('min'=>0),'label'=>'Buts'))->add('matchwins',IntegerType::class,array('attr'=>array('min'=>0),'label'=>'Victoires'))->add('matchlosses',IntegerType::class,array('attr'=>array('min'=>0),'label'=>'Defaites'))->add('matchdraws',IntegerType::class,array('attr'=>array('min'=>0),'label'=>'Nuls'))->add('drapeau',FileType::class,array('data_class'=>null))->add('photoequipe',FileType::class,array('data_class'=>null))->add('Logo',FileType::class,array('data_class'=>null))->add('Groupe',ChoiceType::class,array('choices'=>
            array(
                'A'=>'A',
                'B'=>'B',
                'C'=>'C,',
    'D'=>'D',
    'E'=>'E',
    'F'=>'F',
    'G'=>'G',
        'H'=>'H',
            )
            ))->add('Description',TextareaType::class)->add('Ajout Equipe',SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionEJBundle\Entity\Equipe'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestionejbundle_equipe';
    }


}
