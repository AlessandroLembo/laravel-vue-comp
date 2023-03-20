<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\Videogame;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideogameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $videogames = [
            [
                'title' => 'Elden Ring',
                'description' => "Elden Ring è ambientato nell'Interregno, tempo dopo la distruzione dell'Anello ancestrale (in un evento noto come Disgregazione) e la dispersione dei suoi frammenti, le Rune maggiori. Un tempo benedetto dall'anello e dalla manifestazione del suo potere, l'Albero Madre, il regno è ora governato dai semidei, stirpe della Regina Marika l'Eterna, ognuno dei quali possiede una Runa maggiore, che li ha corrotti e spinti ad abbandonare la Volontà superiore. In qualità di Senzaluce, esiliato dall'Interregno poiché privo della grazia dell'anello e richiamato in seguito alla Disgregazione, il protagonista ha il compito di viaggiare per il regno recuperando i frammenti e divenendo il Lord ancestrale.",
                'price' => '€ 60,00',
                "sale_date" => "2018-10-02"
            ],
            [
                'title' => 'Mortal Kombat',
                'description' => "Mortal Kombat ha segnato il ritorno trionfale all'impostazione più matura del gioco con tanto di straordinarie Fatalities e mosse ai raggi X. Ritornando alla classica modalità di combattimento 2D, quest'ultima incarnazione del franchise include diverse nuove modalità come il Tag Team, la Challenge Tower e un profondo Story Mode. I giocatori possono scegliere tra un vasto ventaglio di iconici combattenti e sfidare i propri amici in partite uno contro uno o nell'innovativa modalità King of the Hill.",
                'price' => '€ 40,00',
                "sale_date" => "2017-10-02"
            ],
            [
                'title' => "Brothers In Arms Hell's Highway",
                'description' => "Brothers In Arms Hell's Highway porta l'acclamato sparatutto della seconda guerra mondiale basato sulla squadra nella prossima generazione di giochi con grafica e suono incredibili, nuove funzionalità di gioco all'avanguardia e un componente online completamente ridisegnato.",
                'price' => '€ 35,00',
                "sale_date" => "2010-10-02"
            ],
            [
                'title' => 'FIFA 23',
                'description' => "EA SPORTS™ FIFA 23 porta il gioco più bello del mondo sul campo, con i tornei della Coppa del Mondo FIFA™ maschile e femminile, l'aggiunta di squadre di club femminili e nuovi modi di giocare le tue modalità preferite.",
                'price' => '€ 70,00',
                "sale_date" => "2022-10-02"
            ]
        ];


        foreach ($videogames as $videogame) {
            $new_videogame = new Videogame();
            $new_videogame->fill($videogame);
            $new_videogame->slug = Str::slug($new_videogame->title, '-');
            $new_videogame->save();
        }
    }
}
