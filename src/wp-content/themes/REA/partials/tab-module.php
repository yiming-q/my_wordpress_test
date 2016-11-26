<?php
/*
/ Template uses data generated by the rea_sidebar_tabs function() in /library/functions/frontend.php
/
/ Available variables
/ ---------------------
/
*/
//The included variables
$popular; //Popular Posts
$recent; //Recent Posts
?>
<aside class="tabs">
  <ul class="buttons">
    <li>
      <a id="popular" class="selected rui-brand-heading" title="View most popular articles" href="#" onclick="_gaq.push(['_trackEvent', 'Popular - Recent Panel', 'Click', 'Popular Tab']);">
        Popular stories
      </a>
    </li>
    <li>
      <a id="recent" class="rui-brand-heading" href="#" title="View most recent articles" onclick="_gaq.push(['_trackEvent', 'Popular - Recent Panel', 'Click', 'Recent Tab']);">
        Most recent
      </a>
    </li>
  </ul>
  <ul class="side-list popular">
    <?php foreach($popular as $index=>$p)  {
      $img_tag = get_rea_img_tag($p['thumbnail_image'], $p['post_short_title'], '');
      echo '<li><a class="featured" title="Read about '.$p['post_short_title'].'"  data-views="'.$p['post_views'].'" href="'.$p['post_href'].'" onclick="_gaq.push([\'_trackEvent\', \'Popular - Recent Panel\', \'Click\', \'Popular Post ' . $index . '\']);">';
      echo '<figure>'. $img_tag .'</figure>';
      echo '<strong>'.$p['post_short_title'].'</strong> ';
      //echo '<small>Category</small>';
      echo '</a></li>';

    } ?>
  </ul>
  <ul class="side-list recent">
    <?php foreach($recent as $index=>$r) {
      $img_tag = get_rea_img_tag($r['thumbnail_image'], $r['post_short_title'], '');
      echo '<li><a class="featured" title="Read about '.$r['post_short_title'].'" href="'.$r['post_href'].'" onclick="_gaq.push([\'_trackEvent\', \'Popular - Recent Panel\', \'Click\', \'Recent Post ' . $index . '\']);">';
      echo '<figure>'. $img_tag .'</figure>';
      echo '<strong>'.$r['post_short_title'].'</strong> ';
      //echo '<small>30 mins ago</small>';
      echo '</a></li>';
    } ?>
  </ul>
</aside>
