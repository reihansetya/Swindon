<?php

namespace Database\Seeders;

use App\Models\Albums;
use App\Models\Singles;
use App\Models\Lyrics;
use App\Models\Images;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SwindonDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('🎸 Seeding Swindon band data...');

        // Album 1: Debut Album
        $album1 = Albums::create([
            'id' => Str::uuid()->toString(),
            'title' => 'Morning Glory',
            'slug' => 'morning-glory',
            'category_id' => 1, // Album
            'release_date' => '2023-03-15',
            'spotify_url' => 'https://open.spotify.com/album/swindon-morning-glory',
            'description' => 'Album debut Swindon yang menghadirkan suara britpop modern dengan sentuhan nostalgia. Terinspirasi dari era keemasan Oasis dan Blur, album ini menampilkan 10 track yang penuh energi dan melodi catchy.',
            'produced_by' => 'Riyan & The Swindon Crew',
            'recorded_at' => 'Sunset Studio, Jakarta',
        ]);

        // Album 2: EP
        $album2 = Albums::create([
            'id' => Str::uuid()->toString(),
            'title' => 'Echoes of Yesterday',
            'slug' => 'echoes-of-yesterday',
            'category_id' => 1, // Album
            'release_date' => '2024-01-20',
            'spotify_url' => 'https://open.spotify.com/album/swindon-echoes',
            'description' => 'EP kedua yang lebih matang dan introspektif. Menggali tema nostalgia, kehilangan, dan harapan dengan aransemen yang lebih kompleks.',
            'produced_by' => 'Riyan',
            'recorded_at' => 'Moonlight Records, Bandung',
        ]);

        $this->command->info('✓ Created 2 albums');

        // Singles for Album 1: Morning Glory
        $singles1 = [
            [
                'title' => 'Wonderwall Dreams',
                'slug' => 'wonderwall-dreams',
                'album_id' => $album1->id,
                'category_id' => 2,
                'release_date' => '2023-02-01',
                'genre' => 'Britpop',
                'spotify_url' => 'https://open.spotify.com/track/wonderwall-dreams',
                'youtube_embed' => 'dQw4w9WgXcQ',
                'description' => 'Single pembuka yang energik dengan riff gitar yang memorable. Lirik tentang mimpi dan harapan generasi muda.',
                'produced_by' => 'Riyan',
                'recorded_at' => 'Sunset Studio, Jakarta',
                'lyrics' => "Verse 1:\nToday is gonna be the day\nThat they're gonna throw it back to you\nBy now you should've somehow\nRealized what you gotta do\n\nChorus:\nI said maybe\nYou're gonna be the one that saves me\nAnd after all\nYou're my wonderwall\n\nVerse 2:\nBackbeat the word was on the street\nThat the fire in your heart is out\nI'm sure you've heard it all before\nBut you never really had a doubt",
            ],
            [
                'title' => 'Cigarettes & Alcohol',
                'slug' => 'cigarettes-and-alcohol',
                'album_id' => $album1->id,
                'category_id' => 2,
                'release_date' => '2023-02-15',
                'genre' => 'Rock',
                'spotify_url' => 'https://open.spotify.com/track/cigarettes-alcohol',
                'youtube_embed' => 'dQw4w9WgXcQ',
                'description' => 'Track rock yang raw dan penuh attitude. Menggambarkan kehidupan malam dan kebebasan.',
                'produced_by' => 'Riyan',
                'recorded_at' => 'Sunset Studio, Jakarta',
                'lyrics' => "Verse 1:\nIs it my imagination\nOr have I finally found something worth living for?\nI was looking for some action\nBut all I found was cigarettes and alcohol\n\nChorus:\nYou could wait for a lifetime\nTo spend your days in the sunshine\nYou might as well do the white line\n'Cause when it comes on top\nYou gotta make it happen",
            ],
            [
                'title' => 'Live Forever',
                'slug' => 'live-forever',
                'album_id' => $album1->id,
                'category_id' => 2,
                'release_date' => '2023-03-01',
                'genre' => 'Britpop',
                'spotify_url' => 'https://open.spotify.com/track/live-forever',
                'youtube_embed' => 'dQw4w9WgXcQ',
                'description' => 'Anthem optimis tentang keinginan untuk hidup abadi melalui musik dan kenangan.',
                'produced_by' => 'Riyan',
                'recorded_at' => 'Sunset Studio, Jakarta',
                'lyrics' => "Verse 1:\nMaybe I don't really wanna know\nHow your garden grows\n'Cause I just wanna fly\nLately did you ever feel the pain\nIn the morning rain\nAs it soaks you to the bone\n\nChorus:\nMaybe I will never be\nAll the things that I wanna be\nBut now is not the time to cry\nNow's the time to find out why\nI think you're the same as me\nWe see things they'll never see\nYou and I are gonna live forever",
            ],
            [
                'title' => 'Champagne Supernova',
                'slug' => 'champagne-supernova',
                'album_id' => $album1->id,
                'category_id' => 2,
                'release_date' => '2023-03-10',
                'genre' => 'Psychedelic Rock',
                'spotify_url' => 'https://open.spotify.com/track/champagne-supernova',
                'youtube_embed' => 'dQw4w9WgXcQ',
                'description' => 'Epic track dengan durasi panjang dan solo gitar yang memukau. Lirik yang puitis dan filosofis.',
                'produced_by' => 'Riyan & The Swindon Crew',
                'recorded_at' => 'Sunset Studio, Jakarta',
                'lyrics' => "Verse 1:\nHow many special people change?\nHow many lives are living strange?\nWhere were you while we were getting high?\n\nChorus:\nSomeday you will find me\nCaught beneath the landslide\nIn a champagne supernova in the sky\nSomeday you will find me\nCaught beneath the landslide\nIn a champagne supernova\nA champagne supernova in the sky",
            ],
            [
                'title' => 'Don\'t Look Back in Anger',
                'slug' => 'dont-look-back-in-anger',
                'album_id' => $album1->id,
                'category_id' => 2,
                'release_date' => '2023-03-15',
                'genre' => 'Britpop',
                'spotify_url' => 'https://open.spotify.com/track/dont-look-back',
                'youtube_embed' => 'dQw4w9WgXcQ',
                'description' => 'Ballad yang emosional dengan piano intro yang ikonik. Pesan tentang melepaskan masa lalu.',
                'produced_by' => 'Riyan',
                'recorded_at' => 'Sunset Studio, Jakarta',
                'lyrics' => "Verse 1:\nSlip inside the eye of your mind\nDon't you know you might find\nA better place to play\nYou said that you'd never been\nBut all the things that you've seen\nSlowly fade away\n\nChorus:\nSo Sally can wait\nShe knows it's too late\nAs we're walking on by\nHer soul slides away\nBut don't look back in anger\nI heard you say",
            ],
        ];

        foreach ($singles1 as $singleData) {
            $lyrics = $singleData['lyrics'];
            unset($singleData['lyrics']);

            $singleData['id'] = Str::uuid()->toString();
            $single = Singles::create($singleData);

            // Create lyrics
            Lyrics::create([
                'id' => Str::uuid()->toString(),
                'single_id' => $single->id,
                'lyrics_text' => $lyrics,
                'slug' => $single->slug . '-lyrics',
            ]);
        }

        $this->command->info('✓ Created 5 singles for Morning Glory album');

        // Singles for Album 2: Echoes of Yesterday
        $singles2 = [
            [
                'title' => 'Bitter Sweet Symphony',
                'slug' => 'bitter-sweet-symphony',
                'album_id' => $album2->id,
                'category_id' => 2,
                'release_date' => '2023-12-01',
                'genre' => 'Alternative Rock',
                'spotify_url' => 'https://open.spotify.com/track/bitter-sweet',
                'youtube_embed' => 'dQw4w9WgXcQ',
                'description' => 'Single dengan string arrangement yang dramatis. Tentang perjuangan hidup dan pencarian makna.',
                'produced_by' => 'Riyan',
                'recorded_at' => 'Moonlight Records, Bandung',
                'lyrics' => "Verse 1:\n'Cause it's a bittersweet symphony, this life\nTrying to make ends meet\nYou're a slave to money then you die\nI'll take you down the only road I've ever been down\nYou know the one that takes you to the places\nWhere all the veins meet yeah\n\nChorus:\nNo change, I can change\nI can change, I can change\nBut I'm here in my mold\nI am here in my mold\nBut I'm a million different people\nFrom one day to the next\nI can't change my mold\nNo, no, no, no, no",
            ],
            [
                'title' => 'The Drugs Don\'t Work',
                'slug' => 'the-drugs-dont-work',
                'album_id' => $album2->id,
                'category_id' => 2,
                'release_date' => '2023-12-15',
                'genre' => 'Britpop',
                'spotify_url' => 'https://open.spotify.com/track/drugs-dont-work',
                'youtube_embed' => 'dQw4w9WgXcQ',
                'description' => 'Ballad yang menyentuh tentang kehilangan dan kesedihan. Salah satu track paling emosional.',
                'produced_by' => 'Riyan',
                'recorded_at' => 'Moonlight Records, Bandung',
                'lyrics' => "Verse 1:\nAll this talk of getting old\nIt's getting me down my love\nLike a cat in a bag\nWaiting to drown\nThis time I'm coming down\n\nChorus:\nAnd I hope you're thinking of me\nAs you lay down on your side\nNow the drugs don't work\nThey just make you worse\nBut I know I'll see your face again",
            ],
            [
                'title' => 'Lucky Man',
                'slug' => 'lucky-man',
                'album_id' => $album2->id,
                'category_id' => 2,
                'release_date' => '2024-01-05',
                'genre' => 'Britpop',
                'spotify_url' => 'https://open.spotify.com/track/lucky-man',
                'youtube_embed' => 'dQw4w9WgXcQ',
                'description' => 'Track uplifting tentang bersyukur dan menghargai hidup. Melodi yang catchy dan lirik yang positif.',
                'produced_by' => 'Riyan',
                'recorded_at' => 'Moonlight Records, Bandung',
                'lyrics' => "Verse 1:\nThere's no need for you to say you're sorry\nGoodbye I'm going home\nI don't care no more so don't you worry\nGoodbye I'm going home\n\nChorus:\nI hate the way that even though you know you're wrong\nYou say you're right\nI hate the books you read and all your friends\nYour music's shite it keeps me up all night\nUp all night",
            ],
        ];

        foreach ($singles2 as $singleData) {
            $lyrics = $singleData['lyrics'];
            unset($singleData['lyrics']);

            $singleData['id'] = Str::uuid()->toString();
            $single = Singles::create($singleData);

            // Create lyrics
            Lyrics::create([
                'id' => Str::uuid()->toString(),
                'single_id' => $single->id,
                'lyrics_text' => $lyrics,
                'slug' => $single->slug . '-lyrics',
            ]);
        }

        $this->command->info('✓ Created 3 singles for Echoes of Yesterday album');

        // Standalone Singles (not in album)
        $standaloneSingles = [
            [
                'title' => 'Song 2',
                'slug' => 'song-2',
                'album_id' => null,
                'category_id' => 2,
                'release_date' => '2024-02-14',
                'genre' => 'Alternative Rock',
                'spotify_url' => 'https://open.spotify.com/track/song-2',
                'youtube_embed' => 'dQw4w9WgXcQ',
                'description' => 'Single standalone yang energik dan rebellious. Perfect untuk live performance.',
                'produced_by' => 'Riyan',
                'recorded_at' => 'Home Studio',
                'lyrics' => "Verse 1:\nI got my head checked\nBy a jumbo jet\nIt wasn't easy\nBut nothing is\nNo\n\nChorus:\nWoo-hoo!\nWhen I feel heavy metal\nWoo-hoo!\nAnd I'm pins and I'm needles\nWoo-hoo!\nWell I lie and I'm easy\nAll of the time but I'm never sure why I need you\nPleased to meet you",
            ],
            [
                'title' => 'Common People',
                'slug' => 'common-people',
                'album_id' => null,
                'category_id' => 2,
                'release_date' => '2024-03-01',
                'genre' => 'Britpop',
                'spotify_url' => 'https://open.spotify.com/track/common-people',
                'youtube_embed' => 'dQw4w9WgXcQ',
                'description' => 'Single dengan social commentary yang tajam. Tentang kesenjangan sosial dan identitas.',
                'produced_by' => 'Riyan',
                'recorded_at' => 'Home Studio',
                'lyrics' => "Verse 1:\nShe came from Greece, she had a thirst for knowledge\nShe studied sculpture at Saint Martin's College\nThat's where I caught her eye\nShe told me that her dad was loaded\nI said \"In that case I'll have rum and coca-cola\"\nShe said \"Fine\"\nAnd then in thirty seconds time she said\n\nChorus:\nI wanna live like common people\nI wanna do whatever common people do\nWanna sleep with common people\nI wanna sleep with common people like you\nWell what else could I do?\nI said \"I'll see what I can do\"",
            ],
        ];

        foreach ($standaloneSingles as $singleData) {
            $lyrics = $singleData['lyrics'];
            unset($singleData['lyrics']);

            $singleData['id'] = Str::uuid()->toString();
            $single = Singles::create($singleData);

            // Create lyrics
            Lyrics::create([
                'id' => Str::uuid()->toString(),
                'single_id' => $single->id,
                'lyrics_text' => $lyrics,
                'slug' => $single->slug . '-lyrics',
            ]);
        }

        $this->command->info('✓ Created 2 standalone singles');

        // Create some general images (for footage page)
        $generalImages = [
            'images/footage-1.jpg',
            'images/footage-2.jpg',
            'images/footage-3.jpg',
            'images/band-live-1.jpg',
            'images/band-live-2.jpg',
            'images/band-studio-1.jpg',
            'images/band-studio-2.jpg',
            'images/band-rehearsal-1.jpg',
            'images/concert-crowd-1.jpg',
            'images/backstage-1.jpg',
        ];

        foreach ($generalImages as $imagePath) {
            Images::create([
                'id' => Str::uuid()->toString(),
                'album_id' => null,
                'single_id' => null,
                'image_path' => $imagePath,
                'type' => 'general',
            ]);
        }

        $this->command->info('✓ Created ' . count($generalImages) . ' general images');

        $this->command->info('');
        $this->command->info('🎉 Swindon data seeding completed!');
        $this->command->info('');
        $this->command->info('Summary:');
        $this->command->info('- 2 Albums');
        $this->command->info('- 10 Singles (5 + 3 + 2)');
        $this->command->info('- 10 Lyrics');
        $this->command->info('- 3 General Images');
    }
}
