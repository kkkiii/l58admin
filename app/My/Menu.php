<?php
namespace App\My;
use Illuminate\Support\Facades\DB ;

class Menu{






    static public function gen_menu(){
        /**
         * 模块过滤 sql
        SELECT
        menus.id,
        menus.parentid,
        menus.title,
        menus.action,
        m2.title AS father_title
        FROM
        menus
        LEFT JOIN menus AS m2 ON menus.parentid = m2.id
        WHERE
        menus.id in (1,2)
        OR
        menus.parentid in (1,2)
         *
         */

        $sql = <<<EOD
SELECT
menus.id,
menus.parentid,
menus.title,
menus.action
FROM
menus

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