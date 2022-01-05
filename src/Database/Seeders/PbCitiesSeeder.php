<?php

namespace Anibalealvarezs\Projectbuilder\Database\Seeders;

use Anibalealvarezs\Projectbuilder\Models\PbCity as City;
use Anibalealvarezs\Projectbuilder\Models\PbCountry;
use Illuminate\Database\Seeder;

class PbCitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (City::count() == 0) {
            // Default Cities
            City::upsert([
                ['name' => 'Kabul', 'country_id' => PbCountry::findByCode('AF')->id],
                ['name' => 'Mariehamn', 'country_id' => PbCountry::findByCode('AX')->id],
                ['name' => 'Tirana', 'country_id' => PbCountry::findByCode('AL')->id],
                ['name' => 'Argel', 'country_id' => PbCountry::findByCode('DZ')->id],
                ['name' => 'Pago Pago', 'country_id' => PbCountry::findByCode('AS')->id],
                ['name' => 'Andorra la Vieja', 'country_id' => PbCountry::findByCode('AD')->id],
                ['name' => 'Luanda', 'country_id' => PbCountry::findByCode('AO')->id],
                ['name' => 'Saint John’s', 'country_id' => PbCountry::findByCode('AG')->id],
                ['name' => 'Buenos Aires', 'country_id' => PbCountry::findByCode('AR')->id],
                ['name' => 'Ereván', 'country_id' => PbCountry::findByCode('AM')->id],
                ['name' => 'Camberra', 'country_id' => PbCountry::findByCode('AU')->id],
                ['name' => 'Viena', 'country_id' => PbCountry::findByCode('AT')->id],
                ['name' => 'Bakú', 'country_id' => PbCountry::findByCode('AZ')->id],
                ['name' => 'Manama', 'country_id' => PbCountry::findByCode('BH')->id],
                ['name' => 'Daca', 'country_id' => PbCountry::findByCode('BD')->id],
                ['name' => 'Bridgetown', 'country_id' => PbCountry::findByCode('BB')->id],
                ['name' => 'Minsk', 'country_id' => PbCountry::findByCode('BY')->id],
                ['name' => 'Bruselas', 'country_id' => PbCountry::findByCode('BE')->id],
                ['name' => 'Belmopán', 'country_id' => PbCountry::findByCode('BZ')->id],
                ['name' => 'Porto Novo & Cotonú', 'country_id' => PbCountry::findByCode('BJ')->id],
                ['name' => 'Timbu', 'country_id' => PbCountry::findByCode('BT')->id],
                ['name' => 'La Paz', 'country_id' => PbCountry::findByCode('BO')->id],
                ['name' => 'Sarajevo', 'country_id' => PbCountry::findByCode('BA')->id],
                ['name' => 'Gaborone', 'country_id' => PbCountry::findByCode('BW')->id],
                ['name' => 'Brasilia', 'country_id' => PbCountry::findByCode('BR')->id],
                ['name' => 'Bandar Seri Begawan', 'country_id' => PbCountry::findByCode('BN')->id],
                ['name' => 'Sofía', 'country_id' => PbCountry::findByCode('BG')->id],
                ['name' => 'Uagadugú', 'country_id' => PbCountry::findByCode('BF')->id],
                ['name' => 'Buyumbura', 'country_id' => PbCountry::findByCode('BI')->id],
                ['name' => 'Nom Pen', 'country_id' => PbCountry::findByCode('KH')->id],
                ['name' => 'Yaundé', 'country_id' => PbCountry::findByCode('CM')->id],
                ['name' => 'Ottawa', 'country_id' => PbCountry::findByCode('CA')->id],
                ['name' => 'Praia', 'country_id' => PbCountry::findByCode('CV')->id],
                ['name' => 'Bangui', 'country_id' => PbCountry::findByCode('CF')->id],
                ['name' => 'Yamena', 'country_id' => PbCountry::findByCode('TD')->id],
                ['name' => 'Santiago de Chile', 'country_id' => PbCountry::findByCode('CL')->id],
                ['name' => 'Beijing', 'country_id' => PbCountry::findByCode('CN')->id],
                ['name' => 'Bogotá', 'country_id' => PbCountry::findByCode('CO')->id],
                ['name' => 'Moroni', 'country_id' => PbCountry::findByCode('KM')->id],
                ['name' => 'San José', 'country_id' => PbCountry::findByCode('CR')->id],
                ['name' => 'Yamusukro', 'country_id' => PbCountry::findByCode('CI')->id],
                ['name' => 'Zagreb', 'country_id' => PbCountry::findByCode('HR')->id],
                ['name' => 'Nicosia', 'country_id' => PbCountry::findByCode('CY')->id],
                ['name' => 'Praga', 'country_id' => PbCountry::findByCode('CZ')->id],
                ['name' => 'Kinsasa', 'country_id' => PbCountry::findByCode('CD')->id],
                ['name' => 'Copenhague', 'country_id' => PbCountry::findByCode('DK')->id],
                ['name' => 'Djibouti', 'country_id' => PbCountry::findByCode('DJ')->id],
                ['name' => 'Roseau', 'country_id' => PbCountry::findByCode('DM')->id],
                ['name' => 'Santo Domingo', 'country_id' => PbCountry::findByCode('DO')->id],
                ['name' => 'Quito', 'country_id' => PbCountry::findByCode('EC')->id],
                ['name' => 'Cairo', 'country_id' => PbCountry::findByCode('EG')->id],
                ['name' => 'San Salvador', 'country_id' => PbCountry::findByCode('SV')->id],
                ['name' => 'Malabo', 'country_id' => PbCountry::findByCode('GQ')->id],
                ['name' => 'Asmara', 'country_id' => PbCountry::findByCode('ER')->id],
                ['name' => 'Tallin', 'country_id' => PbCountry::findByCode('EE')->id],
                ['name' => 'Adís Abeba', 'country_id' => PbCountry::findByCode('ET')->id],
                ['name' => 'Suva', 'country_id' => PbCountry::findByCode('FJ')->id],
                ['name' => 'Helsinki', 'country_id' => PbCountry::findByCode('FI')->id],
                ['name' => 'Paris', 'country_id' => PbCountry::findByCode('FR')->id],
                ['name' => 'Libreville', 'country_id' => PbCountry::findByCode('GA')->id],
                ['name' => 'Tiflis', 'country_id' => PbCountry::findByCode('GE')->id],
                ['name' => 'Berlin', 'country_id' => PbCountry::findByCode('DE')->id],
                ['name' => 'Acra', 'country_id' => PbCountry::findByCode('GH')->id],
                ['name' => 'Atenas', 'country_id' => PbCountry::findByCode('GR')->id],
                ['name' => 'Saint George', 'country_id' => PbCountry::findByCode('GD')->id],
                ['name' => 'Ciudad de Guatemala', 'country_id' => PbCountry::findByCode('GT')->id],
                ['name' => 'Conakri', 'country_id' => PbCountry::findByCode('GN')->id],
                ['name' => 'Bissau', 'country_id' => PbCountry::findByCode('GW')->id],
                ['name' => 'Georgetown', 'country_id' => PbCountry::findByCode('GY')->id],
                ['name' => 'Port-au-Prince', 'country_id' => PbCountry::findByCode('HT')->id],
                ['name' => 'Tegucigalpa', 'country_id' => PbCountry::findByCode('HN')->id],
                ['name' => 'Budapest', 'country_id' => PbCountry::findByCode('HU')->id],
                ['name' => 'Reikiavik', 'country_id' => PbCountry::findByCode('IS')->id],
                ['name' => 'Nueva Delhi', 'country_id' => PbCountry::findByCode('IN')->id],
                ['name' => 'Yakarta', 'country_id' => PbCountry::findByCode('ID')->id],
                ['name' => 'Bagdad', 'country_id' => PbCountry::findByCode('IQ')->id],
                ['name' => 'Dublin', 'country_id' => PbCountry::findByCode('IE')->id],
                ['name' => 'Jerusalem', 'country_id' => PbCountry::findByCode('IL')->id],
                ['name' => 'Roma', 'country_id' => PbCountry::findByCode('IT')->id],
                ['name' => 'Kingston', 'country_id' => PbCountry::findByCode('JM')->id],
                ['name' => 'Tokyo', 'country_id' => PbCountry::findByCode('JP')->id],
                ['name' => 'Amman', 'country_id' => PbCountry::findByCode('JO')->id],
                ['name' => 'Astana', 'country_id' => PbCountry::findByCode('KZ')->id],
                ['name' => 'Nairobi', 'country_id' => PbCountry::findByCode('KE')->id],
                ['name' => 'Tarawa', 'country_id' => PbCountry::findByCode('KI')->id],
                ['name' => 'Pristina', 'country_id' => PbCountry::findByCode('XK')->id],
                ['name' => 'Kuwait', 'country_id' => PbCountry::findByCode('KW')->id],
                ['name' => 'Biskek', 'country_id' => PbCountry::findByCode('KG')->id],
                ['name' => 'Vientiane', 'country_id' => PbCountry::findByCode('LA')->id],
                ['name' => 'Riga', 'country_id' => PbCountry::findByCode('LV')->id],
                ['name' => 'Beirut', 'country_id' => PbCountry::findByCode('LB')->id],
                ['name' => 'Maseru', 'country_id' => PbCountry::findByCode('LS')->id],
                ['name' => 'Monrovia', 'country_id' => PbCountry::findByCode('LR')->id],
                ['name' => 'Tripoli', 'country_id' => PbCountry::findByCode('LY')->id],
                ['name' => 'Vaduz', 'country_id' => PbCountry::findByCode('LI')->id],
                ['name' => 'Vilna', 'country_id' => PbCountry::findByCode('LT')->id],
                ['name' => 'Luxembourg', 'country_id' => PbCountry::findByCode('LU')->id],
                ['name' => 'Skopje', 'country_id' => PbCountry::findByCode('MK')->id],
                ['name' => 'Antananarivo', 'country_id' => PbCountry::findByCode('MG')->id],
                ['name' => 'Lilongwe', 'country_id' => PbCountry::findByCode('MW')->id],
                ['name' => 'Kuala Lumpur', 'country_id' => PbCountry::findByCode('MY')->id],
                ['name' => 'Malé', 'country_id' => PbCountry::findByCode('MV')->id],
                ['name' => 'Bamako', 'country_id' => PbCountry::findByCode('ML')->id],
                ['name' => 'Valletta', 'country_id' => PbCountry::findByCode('MT')->id],
                ['name' => 'Majuro', 'country_id' => PbCountry::findByCode('MH')->id],
                ['name' => 'Fort-de-France', 'country_id' => PbCountry::findByCode('MQ')->id],
                ['name' => 'Nuakchot', 'country_id' => PbCountry::findByCode('MR')->id],
                ['name' => 'Port-Louis', 'country_id' => PbCountry::findByCode('MU')->id],
                ['name' => 'Ciudad de México', 'country_id' => PbCountry::findByCode('MX')->id],
                ['name' => 'Chișinău', 'country_id' => PbCountry::findByCode('MD')->id],
                ['name' => 'Monaco', 'country_id' => PbCountry::findByCode('MC')->id],
                ['name' => 'Ulaanbaatar', 'country_id' => PbCountry::findByCode('MN')->id],
                ['name' => 'Podgorica', 'country_id' => PbCountry::findByCode('ME')->id],
                ['name' => 'Rabat', 'country_id' => PbCountry::findByCode('MA')->id],
                ['name' => 'Maputo', 'country_id' => PbCountry::findByCode('MZ')->id],
                ['name' => 'Naypyidaw', 'country_id' => PbCountry::findByCode('MM')->id],
                ['name' => 'Windhoek', 'country_id' => PbCountry::findByCode('NA')->id],
                ['name' => 'Yaren', 'country_id' => PbCountry::findByCode('NR')->id],
                ['name' => 'Kathmandu', 'country_id' => PbCountry::findByCode('NP')->id],
                ['name' => 'Amsterdam', 'country_id' => PbCountry::findByCode('NL')->id],
                ['name' => 'Wellington', 'country_id' => PbCountry::findByCode('NZ')->id],
                ['name' => 'Managua', 'country_id' => PbCountry::findByCode('NI')->id],
                ['name' => 'Niamey', 'country_id' => PbCountry::findByCode('NE')->id],
                ['name' => 'Abuya', 'country_id' => PbCountry::findByCode('NG')->id],
                ['name' => 'Oslo', 'country_id' => PbCountry::findByCode('NO')->id],
                ['name' => 'Mascate', 'country_id' => PbCountry::findByCode('OM')->id],
                ['name' => 'Islamabad', 'country_id' => PbCountry::findByCode('PK')->id],
                ['name' => 'Melekeok', 'country_id' => PbCountry::findByCode('PW')->id],
                ['name' => 'Panama', 'country_id' => PbCountry::findByCode('PA')->id],
                ['name' => 'Port Moresby', 'country_id' => PbCountry::findByCode('PG')->id],
                ['name' => 'Asunción', 'country_id' => PbCountry::findByCode('PY')->id],
                ['name' => 'Lima', 'country_id' => PbCountry::findByCode('PE')->id],
                ['name' => 'Manila', 'country_id' => PbCountry::findByCode('PH')->id],
                ['name' => 'Warsaw', 'country_id' => PbCountry::findByCode('PL')->id],
                ['name' => 'Lisboa', 'country_id' => PbCountry::findByCode('PT')->id],
                ['name' => 'San Juan', 'country_id' => PbCountry::findByCode('PR')->id],
                ['name' => 'Doha', 'country_id' => PbCountry::findByCode('QA')->id],
                ['name' => 'Brazzaville', 'country_id' => PbCountry::findByCode('CG')->id],
                ['name' => 'Bucarest', 'country_id' => PbCountry::findByCode('RO')->id],
                ['name' => 'Moscow', 'country_id' => PbCountry::findByCode('RU')->id],
                ['name' => 'Kigali', 'country_id' => PbCountry::findByCode('RW')->id],
                ['name' => 'Kingstown', 'country_id' => PbCountry::findByCode('VC')->id],
                ['name' => 'Apia', 'country_id' => PbCountry::findByCode('WS')->id],
                ['name' => 'San Marino', 'country_id' => PbCountry::findByCode('SM')->id],
                ['name' => 'Sao Tome', 'country_id' => PbCountry::findByCode('ST')->id],
                ['name' => 'Riad', 'country_id' => PbCountry::findByCode('SA')->id],
                ['name' => 'Dakar', 'country_id' => PbCountry::findByCode('SN')->id],
                ['name' => 'Belgrado', 'country_id' => PbCountry::findByCode('RS')->id],
                ['name' => 'Victoria', 'country_id' => PbCountry::findByCode('SC')->id],
                ['name' => 'Freetown', 'country_id' => PbCountry::findByCode('SL')->id],
                ['name' => 'Singapore', 'country_id' => PbCountry::findByCode('SG')->id],
                ['name' => 'Bratislava', 'country_id' => PbCountry::findByCode('SK')->id],
                ['name' => 'Liubliana', 'country_id' => PbCountry::findByCode('SI')->id],
                ['name' => 'Honiara', 'country_id' => PbCountry::findByCode('SB')->id],
                ['name' => 'Mogadiscio', 'country_id' => PbCountry::findByCode('SO')->id],
                ['name' => 'Pretoria', 'country_id' => PbCountry::findByCode('ZA')->id],
                ['name' => 'Seul', 'country_id' => PbCountry::findByCode('KR')->id],
                ['name' => 'Yuba', 'country_id' => PbCountry::findByCode('SS')->id],
                ['name' => 'Madrid', 'country_id' => PbCountry::findByCode('ES')->id],
                ['name' => 'Sri Jayewardenepura', 'country_id' => PbCountry::findByCode('LK')->id],
                ['name' => 'Castries', 'country_id' => PbCountry::findByCode('LC')->id],
                ['name' => 'Paramaribo', 'country_id' => PbCountry::findByCode('SR')->id],
                ['name' => 'Mbabane', 'country_id' => PbCountry::findByCode('SZ')->id],
                ['name' => 'Stockholm', 'country_id' => PbCountry::findByCode('SE')->id],
                ['name' => 'Berna', 'country_id' => PbCountry::findByCode('CH')->id],
                ['name' => 'Taipei', 'country_id' => PbCountry::findByCode('TW')->id],
                ['name' => 'Dushanbe', 'country_id' => PbCountry::findByCode('TJ')->id],
                ['name' => 'Dodoma', 'country_id' => PbCountry::findByCode('TZ')->id],
                ['name' => 'Bangkok', 'country_id' => PbCountry::findByCode('TH')->id],
                ['name' => 'Nassau', 'country_id' => PbCountry::findByCode('BS')->id],
                ['name' => 'Banjul', 'country_id' => PbCountry::findByCode('GM')->id],
                ['name' => 'Dili', 'country_id' => PbCountry::findByCode('TL')->id],
                ['name' => 'Lomé', 'country_id' => PbCountry::findByCode('TG')->id],
                ['name' => 'Nukunonu', 'country_id' => PbCountry::findByCode('TK')->id],
                ['name' => 'Nukualofa', 'country_id' => PbCountry::findByCode('TO')->id],
                ['name' => 'Puerto España', 'country_id' => PbCountry::findByCode('TT')->id],
                ['name' => 'Tunisia', 'country_id' => PbCountry::findByCode('TN')->id],
                ['name' => 'Ankara', 'country_id' => PbCountry::findByCode('TR')->id],
                ['name' => 'Asjabad', 'country_id' => PbCountry::findByCode('TM')->id],
                ['name' => 'Fongafale', 'country_id' => PbCountry::findByCode('TV')->id],
                ['name' => 'Kampala', 'country_id' => PbCountry::findByCode('UG')->id],
                ['name' => 'Kiev', 'country_id' => PbCountry::findByCode('UA')->id],
                ['name' => 'Abu Dabi', 'country_id' => PbCountry::findByCode('AE')->id],
                ['name' => 'London', 'country_id' => PbCountry::findByCode('GB')->id],
                ['name' => 'Washington, D.C.', 'country_id' => PbCountry::findByCode('US')->id],
                ['name' => 'Montevideo', 'country_id' => PbCountry::findByCode('UY')->id],
                ['name' => 'Taskent', 'country_id' => PbCountry::findByCode('UZ')->id],
                ['name' => 'Port Vila', 'country_id' => PbCountry::findByCode('VU')->id],
                ['name' => 'Vatican City', 'country_id' => PbCountry::findByCode('VA')->id],
                ['name' => 'Caracas', 'country_id' => PbCountry::findByCode('VE')->id],
                ['name' => 'Hanoi', 'country_id' => PbCountry::findByCode('VN')->id],
                ['name' => 'Sana\'a', 'country_id' => PbCountry::findByCode('YE')->id],
                ['name' => 'Lusaka', 'country_id' => PbCountry::findByCode('ZM')->id],
                ['name' => 'Harare', 'country_id' => PbCountry::findByCode('ZW')->id],
                ['name' => 'Tehrān', 'country_id' => PbCountry::findByCode('IR')->id],
                ['name' => 'La Habana', 'country_id' => PbCountry::findByCode('CU')->id],
                ['name' => 'Pionyang', 'country_id' => PbCountry::findByCode('KP')->id],
                ['name' => 'Damasco', 'country_id' => PbCountry::findByCode('SY')->id],
                ['name' => 'Khartoum', 'country_id' => PbCountry::findByCode('SD')->id],
            ], ['country_id'], ['name']);
        }
    }
}
