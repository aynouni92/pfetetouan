<?php

if (!defined('e107_INIT'))
{
    exit;
}

// require_once(e_PLUGIN . "fatwa/includes/fatwa_class.php");
if (!is_object($fatwa_obj))
{
    $fatwa_obj = new faq;
}
if (!is_object($fatwa_gen))
{
    $fatwa_gen = new convert;
}
global $e107;
// ##### e_rss.php ---------------------------------------------
// get all the categories
$feed['name'] = FATWALAN_RSS01;
$feed['url'] = "fatwa";
$feed['topic_id'] = '';
$feed['path'] = 'fatwa';
$feed['text'] = FATWALAN_RSS02 ;
$feed['class'] = '0';
$feed['limit'] = '9';
$eplug_rss_feed[] = $feed;
// ##### --------------------------------------------------------
// ##### create rss data, return as array $eplug_rss_data -------
$rss = array();
global $FATWA_PREF, $sql, $tp;
 // if ($fatwa_obj->articulate_reader)
{
    // get faqs which are approved and are visible to this class viz everybody
    $fatwa_args = "
    select s.*,c.fatwa_info_title from #fatwa as s
left join #fatwa_info as c on s.fatwa_parent=c.fatwa_info_id
where s.fatwa_approved>0 and find_in_set(fatwa_info_class,'" . USERCLASS_LIST . "')
order by s.fatwa_datestamp desc LIMIT 0," . $this->limit;

    if ($items = $sql->db_Select_gen($fatwa_args, false))
    {
        $i = 0;
        while ($rowrss = $sql->db_Fetch())
        {
            $rss[$i]['author'] = $tp->toRss(substr($rowrss['fatwa_author'], strpos($rowrss['fatwa_author'], ".") + 1), false);

            $rss[$i]['author_email'] = '';
            $rss[$i]['link'] = $e107->base_path . $PLUGINS_DIRECTORY . "fatwa/fatwa.php?0.cat." . $rowrss['fatwa_parent'] . "." . $rowrss['fatwa_id'] ;
            $rss[$i]['linkid'] = $tp->toRss($rowrss['fatwa_id'], false);
            $rss[$i]['title'] = $tp->toRss($rowrss['fatwa_question'], false);;
            $rss[$i]['description'] = $tp->toRss($rowrss['fatwa_answer'], false);

            $rss[$i]['category_name'] = $tp->toRss($rowrss['fatwa_info_title'], false);
            $rss[$i]['category_link'] = $e107->base_path . $PLUGINS_DIRECTORY . "fatwa/fatwa.php?0.cat." . $rowrss['fatwa_parent'] ;
            $rss[$i]['datestamp'] = $rowrss['fatwa_datestamp'];
            $rss[$i]['enc_url'] = "";
            $rss[$i]['enc_leng'] = "";
            $rss[$i]['enc_type'] = "";
            $i++;
        }
    }
    else
    {
        $rss[$i]['author'] = "" ;
        $rss[$i]['author_email'] = '';
        $rss[$i]['link'] = $e107->base_path . $PLUGINS_DIRECTORY . "fatwa/fatwa.php";
        $rss[$i]['linkid'] = '';
        $rss[$i]['title'] = "";
        $rss[$i]['description'] = "none";
        $rss[$i]['category_name'] = "";
        $rss[$i]['category_link'] = '';
        $rss[$i]['datestamp'] = "";
        $rss[$i]['enc_url'] = "";
        $rss[$i]['enc_leng'] = "";
        $rss[$i]['enc_type'] = "";
    }
}
$eplug_rss_data[] = $rss;

?>