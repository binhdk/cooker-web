<?php
function pagination($url, $page, $total){
    $adjacents = 1;
    $prevlabel = "&lsaquo; Trước";
    $nextlabel = "Tiếp &rsaquo;";
    $out = '<ul class="pagination">';
    
    //first
    if ($page == 1) {
        $out.= '<li class="disabled"><span>Đầu</span></li>';
    } else {
        $out.='<li><a href="'.$url.'">Đầu</a></li>';
    }
    
    // previous
    if ($page == 1) {
        $out.= '<li class="disabled"><span>&Lt;</span></li>';
    } elseif ($page == 2) {
        $out.='<li><a href="'.$url.'">&Lt;</a></li>';
    } else {
        $out.='<li><a href="'.$url.'&amp;page='.($page - 1).'">&Lt;</a></li>';
    }
    
    $pmin=($page>$adjacents)?($page - $adjacents):1;
    $pmax=($page<($total - $adjacents))?($page + $adjacents):$total;
    for ($i = $pmin; $i <= $pmax; $i++) {
        if ($i == $page) {
            $out.= '<li class="active"><span>'.$i.'</span></li>';
        } elseif ($i == 1) {
            $out.= '<li><a href="'.$url.'">'.$i.'</a></li>';
        } else {
            $out.= '<li><a href="'.$url. "&amp;page=".$i.'">'.$i. '</a></li>';
        }
    }
    
    // next
    if ($page < $total) {
        $out.= '<li><a href="'.$url.'&amp;page='.($page + 1).'">&Gt;</a></li>';
    } else {
        $out.= '<li class="disabled"><span>&Gt;</span></li>';
    }
    
    //last
    if ($page < $total) {
        $out.= '<li><a href="'.$url.'&amp;page='.$total.'">Cuối</a></li>';
    } else {
        $out.= '<li class="disabled"><span>Cuối</span></li>';
    }
    
    $out.= '</ul>';
    return $out;
}
?>