<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Product;

class GetImage extends Command
{

    protected $signature = 'GetImage';

    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {

        $result = Product::where('get_flag', 0)->orderBy('id')->get();

        foreach ($result as $k => $v) {

            $url = "https://lohaco.jp/ksearch/?searchWord=" . $v->jan;
            $content = file_get_contents($url);
            $ex_content = explode("\n", $content);

            $url2 = "";

            $_url = "";
            foreach ($ex_content as $v2) {
                if (preg_match("/prodImgBox/", trim($v2))) {
                    $_url = trim($v2);
                    break;
                }
            }

            if (trim($_url) != "") {
                $ex_v2 = explode(" ", trim($_url));
                foreach ($ex_v2 as $v3) {
                    if (preg_match("/href=\"(.+)\"/", trim($v3), $m)) {
                        $url2 = "https://lohaco.jp" . trim($m[1]);
                        break;
                    }
                }
            }


            //urlが取れている場合のみ処理
            if (trim($url2) != "") {
                $content2 = file_get_contents($url2);
                $ex_content2 = explode("\n", $content2);

                $a = 0;
                $b = 0;
                $c = 0;
                $d = [];
                foreach ($ex_content2 as $k3 => $v3) {
                    if (preg_match("/class=\"blcProdImageList\"/", trim($v3))) {
                        if ($a == 0) {
                            $a = $k3;
                        }
                    }

                    if (preg_match("/<!--\/.blcProdImageList-->/", trim($v3))) {
                        if ($b == 0) {
                            $b = $k3;
                        }
                    }

                    if (preg_match("/商品仕様/", trim($v3))) {
                        $c = $k3;
                    }

                    if (preg_match("/<\/table>/", trim($v3))) {
                        $d[] = $k3;
                    }
                }

                //--------------------------------- spec
                $spec = "";

                $spec_start = 0;
                $spec_end = 0;

                rsort($d);
                foreach ($d as $v4) {
                    if ($v4 > $c) {
                        $spec_end = $v4;
                    } else {
                        break;
                    }
                }

                for ($i = $c; $i < $spec_end; $i++) {
                    if (preg_match("/<table/", trim($ex_content2[$i]))) {
                        $spec_start = $i;
                    }
                }

                for ($i = $spec_start; $i <= $spec_end; $i++) {
                    $spec .= trim($ex_content2[$i]);
                }

                //--------------------------------- img
                $image_url = "";

                $img = "";
                for ($i = $a; $i < $b; $i++) {
                    if (preg_match("/<img/", trim($ex_content2[$i]))) {
                        $img = trim($ex_content2[$i]);
                        break;
                    }
                }

                if (trim($img) != "") {
                    $ex_img = explode(" ", $img);
                    foreach ($ex_img as $v5) {
                        if (preg_match("/src=\"(.+)\"/", trim($v5), $m)) {
                            $image_url = trim($m[1]);
                        }
                    }
                }

                ///////////////////////
                /// 両方とれている場合のみ処理
                if (trim($spec) != "" && trim($image_url) != "") {

                    $update = [];
                    $update['image_url'] = $image_url;
                    $update['spec'] = $spec;
                    $update['get_flag'] = 1;

                    print_r($update);

                    Product::where('id', $v->id)->update($update);
                }
            }
        }
    }
}
