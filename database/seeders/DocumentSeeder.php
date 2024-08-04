<?php

namespace Database\Seeders;

use App\Models\Document;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Document::create([
            'product_id' => '1',
            'name' => 'playstation-5-slim-digital-edition_instrukcia_214308_30012024',
            'description' => null,
            'file' => 'products_doc/doc_1/VWvi2Ou2PdYVqChUBbdzPsTWcZxwd03UuBWKIMBK.pdf',
            'approved' => 0
        ]);
        Document::create([
            'product_id' => '3',
            'name' => 'oth_D_dexp-eh-c2nsmab_instrukcia_145239_22082023',
            'description' => null,
            'file' => 'products_doc/doc_2/xZpu2xUO04tWK9izqJpYuCXhf6lLKElA6ywX28bP.pdf',
            'approved' => 1
        ]);
        Document::create([
            'product_id' => '3',
            'name' => 'elektriceskaa-varocnaa-poverhnost-dexp-eh-c2nsmab_instrukcia',
            'description' => null,
            'file' => 'products_doc/doc_3/B1iKXcAIdDQCKEZH6pfoAkxWmOZLXWm0CRfHMz3z.pdf',
            'approved' => 1
        ]);
        Document::create([
            'product_id' => '5',
            'name' => 'oth_T_televizor-led-bq-2406b_instrukcia_210527_03082023',
            'description' => null,
            'file' => 'products_doc/doc_4/XjSEvp8qf7mNTRSBdtGPfmu5ONYMbGW3s6jXgy9S.pdf',
            'approved' => 1
        ]);
        Document::create([
            'product_id' => '6',
            'name' => 'vstraivaemaa-posudomoecnaa-masina-dexp-m9c7pb_instrukcia',
            'description' => null,
            'file' => 'products_doc/doc_5/qlaTxTfDOZHDPG7IwmXzJetmfOT4aIl4YGCPiHIa.pdf',
            'approved' => 0
        ]);
        Document::create([
            'product_id' => '8',
            'name' => 'vstraivaemyj-holodilnik-bez-morozilnika-beko-bu1100hca_instrukcia',
            'description' => null,
            'file' => 'products_doc/doc_6/Ltq47ooWoWKYldS8GrcrPqf01SiLMmzJiFAqFZz2.pdf',
            'approved' => 0
        ]);
        Document::create([
            'product_id' => '9',
            'name' => 'oth_D_dexp-m12c7pb_instrukcia_133211_20072023',
            'description' => null,
            'file' => 'products_doc/doc_7/eQteyhLwWVJFaWDkuvEiS3S981TxdgTjNZUZqIjH.pdf',
            'approved' => 1
        ]);
        Document::create([
            'product_id' => '10',
            'name' => 'plitka-elektriceskaa-dexp-ins-2000-cernyj_instrukcia',
            'description' => null,
            'file' => 'products_doc/doc_8/BeGIOuJrxzGokBqy0PcyKB25Eh5AnbCpTwf2GGa9.pdf',
            'approved' => 0
        ]);
    }
}
