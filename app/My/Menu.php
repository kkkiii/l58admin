<?php
namespace App\My;
use Illuminate\Support\Facades\DB ;

class Menu{






    static public function gen_menu(){


        $sql = <<<EOD
SELECT
nw_menu.id,
nw_menu.parentid,
nw_menu.title,
nw_menu.action
FROM
nw_menu

EOD;
        $tree_nodes = DB::connection()
            ->select($sql);

        $arr = Helpers::objectToArray($tree_nodes) ;
        $resut =  Category::unlimitedForlayer($arr) ;

        foreach ($resut as $item)
        {

            $title =$item['title'];
            $action=$item['action'] ;
            $idstr = $item['id'] ;
            $html2 = '' ;

            if (!empty($item['child'] ))
            {
                $ch_str = static::gen_sub($item['child'])    ;


                $html2 = <<<EOD
            <div class="collapse" id="item-$idstr">
                <ul class="nav flex-column ml-3">
                    $ch_str
                </ul>
            </div>
EOD;

            }

            $html = <<<EOD
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#item-$idstr">

                $title
                
            </a>
            $html2
        </li>
EOD;


            echo ($html) ;

        }

    }



    public static function gen_sub($children): string
    {

        $des = '' ;

        foreach ($children as $child)
        {
            $title = $child['title']  ;$href = $child['action']  ;

            $html = <<<EOD
                    <li class="nav-item">
                        <a class="nav-link" href="$href">$title</a>
                    </li>
EOD;

            $des = $des .  $html ;


        }

        return $des ;


    }

}

?>