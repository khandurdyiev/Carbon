<?php

/**
 * This file is part of the Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\CarbonImmutable;

use Carbon\CarbonImmutable as Carbon;
use Tests\AbstractTestCase;

class SettingsTest extends AbstractTestCase
{
    public function testSettings()
    {
        $paris = Carbon::parse('2018-01-31 00:00:00')->settings([
            'timezone' => 'Europe/Paris',
            'locale' => 'fr_FR',
            'monthOverflow' => true,
            'yearOverflow' => true,
        ]);
        $saoPaulo = Carbon::parse('2018-01-31 00:00:00')->settings([
            'timezone' => 'America/Sao_Paulo',
            'locale' => 'pt',
            'monthOverflow' => false,
            'yearOverflow' => false,
        ]);

        $this->assertSame('2 jours une heure avant', $paris->addMonth()->from(Carbon::parse('2018-03-05', 'UTC'), null, false, 3));
        $this->assertSame('4 dias 21 horas antes', $saoPaulo->addMonth()->from(Carbon::parse('2018-03-05', 'UTC'), null, false, 3));
    }
}
