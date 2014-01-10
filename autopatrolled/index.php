<?php
require('../includes.php');

$site = new site();

$site -> gen_opening();

/*$ts_pw = posix_getpwuid(posix_getuid());
$ts_mycnf = parse_ini_file($ts_pw['dir'] . "/.my.cnf");
$db = mysql_connect('enwiki-p.rrdb.toolserver.org', $ts_mycnf['user'], $ts_mycnf['password']);
unset($ts_mycnf, $ts_pw);
 
mysql_select_db('enwiki_p', $db);*/

$query = "select r1.rev_user_text, count(*)
  from page join revision as r1 on page_id=r1.rev_page
  where page_namespace=0 
    and page_is_redirect=0 
    and r1.rev_parent_id=0 
    and r1.rev_user <> 0
    and not exists (select * from user_groups 
                      where ug_user=r1.rev_user 
                        and ug_group in ('sysop', 'autoreviewer') )
group by r1.rev_user, r1.rev_user_text
having count(*) > 50 and exists( select * 
                                   from revision as r2 
                                     where r2.rev_user = r1.rev_user 
                                       and r2.rev_timestamp > '20091231235959')
order by count(*) limit 0, 30";

// $result = mysql_query($query);

echo $query;

$site -> gen_closing();

?>