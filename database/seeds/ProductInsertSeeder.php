<?php

use Illuminate\Database\Seeder;

use App\Models\Product;

class ProductInsertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $items = "
4901301259707 	ビオレ　スキンケア洗顔料　モイスチャー　ミニ
4901301259714 	ビオレ　スキンケア洗顔料　モイスチャー　小
4901301259660 	ビオレ　スキンケア洗顔料　モイスチャー　大
4901301259677 	ビオレ　スキンケア洗顔料　リッチモイスチャー
4901301259684 	ビオレ　スキンケア洗顔料　スクラブｉｎ
4901301265678 	ビオレ　スキンケア洗顔料　薬用アクネケア
4901301286468 	ビオレ　スキンケア洗顔料　オイルコントロール
4901301250162 	ビオレ　マシュマロホイップ　モイスチャー　本体
4901301250261 	ビオレ　マシュマロホイップ　モイスチャー　つめかえ用
4901301257765 	ビオレ　マシュマロホイップ　リッチモイスチャー　本体
4901301257772 	ビオレ　マシュマロホイップ　リッチモイスチャー　つめかえ用
4901301275080 	ビオレ　マシュマロホイップ　薬用アクネケア　本体
4901301276254 	ビオレ　マシュマロホイップ　薬用アクネケア　つめかえ用
";

        $ex_str = explode("\n", $items);
        foreach ($ex_str as $v) {
            if (trim($v) == "") {
                continue;
            }

            $ex_v = explode("\t", trim($v));

            $insert = [];
            $insert['jan'] = trim($ex_v[0]);
            $insert['name'] = trim($ex_v[1]);

            print_r($insert);

            Product::insert($insert);
        }

    }
}
